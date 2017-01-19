<?php
/**

 */

App::uses('AppShell', 'Console/Command');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
App::uses('Hash', 'Utility');
App::uses('CakeSchema', 'Model');

/**
 * Schema is a command-line database management utility for automating programmer chores.
 *
 * Schema is CakePHP's database management utility. This helps you maintain versions of
 * of your database.
 *
 * @package       Cake.Console.Command
 * @link          http://book.cakephp.org/2.0/en/console-and-shells/schema-management-and-migrations.html
 */
class SchemaShell extends AppShell
{
    /**
 * Schema class being used.
 *
 * @var CakeSchema
 */
    public $Schema;

/**
 * is this a dry run?
 *
 * @var bool
 */
    protected $_dry = null;

/**
 * Override startup
 *
 * @return void
 */
    public function startup()
    {
        $this->_welcome();
        $this->out('Unitar Schema Shell');
        $this->hr();

        Configure::write('Cache.disable', 1);

        $name = $path = $connection = $plugin = null;
        if (!empty($this->params['name'])) {
            $name = $this->params['name'];
        } elseif (!empty($this->args[0]) && $this->args[0] !== 'snapshot') {
            $name = $this->params['name'] = $this->args[0];
        }

        if (strpos($name, '.')) {
            list($this->params['plugin'], $splitName) = pluginSplit($name);
            $name = $this->params['name'] = $splitName;
        }
        if ($name && empty($this->params['file'])) {
            $this->params['file'] = Inflector::underscore($name);
        } elseif (empty($this->params['file'])) {
            $this->params['file'] = 'schema.php';
        }
        if (strpos($this->params['file'], '.php') === false) {
            $this->params['file'] .= '.php';
        }
        $file = $this->params['file'];

        if (!empty($this->params['path'])) {
            $path = $this->params['path'];
        }

        if (!empty($this->params['connection'])) {
            $connection = $this->params['connection'];
        }
        if (!empty($this->params['plugin'])) {
            $plugin = $this->params['plugin'];
            if (empty($name)) {
                $name = $plugin;
            }
        }
        $name = Inflector::camelize($name);
        $this->Schema = new CakeSchema(compact('name', 'path', 'file', 'connection', 'plugin'));
    }

/**
 * Read and output contents of schema object
 * path to read as second arg
 *
 * @return void
 */
    public function view()
    {
        $File = new File($this->Schema->path . DS . $this->params['file']);
        if ($File->exists()) {
            $this->out($File->read());
            return $this->_stop();
        }
        $file = $this->Schema->path . DS . $this->params['file'];
        $this->err(__d('cake_console', 'Schema file (%s) could not be found.', $file));
        return $this->_stop();
    }

/**
 * Read database and Write schema object
 * accepts a connection as first arg or path to save as second arg
 *
 * @return void
 */
    public function generate()
    {
        $this->stdout->styles('success', array('text' => 'green', 'blink' => false));
        $this->out(__d('cake_console', 'Generating Schema...'));
        $options = array();
        if ($this->params['force']) {
            $options['models'] = false;
        } elseif (!empty($this->params['models'])) {
            $options['models'] = CakeText::tokenize($this->params['models']);
        }

        // if (isset($this->args[0]) && $this->args[0] === 'snapshot') {
        //     $snapshot = true;
        // }
        $snapshot =true;
        // if (!$snapshot && file_exists($this->Schema->path . DS . $this->params['file'])) {
        //     $snapshot = true;
        //     $prompt = __d('cake_console', "Schema file exists.\n [O]verwrite\n [S]napshot\n [Q]uit\nWould you like to do?");
        //     $result = strtolower($this->in($prompt, array('o', 's', 'q'), 's'));
        //     if ($result === 'q') {
        //         return $this->_stop();
        //     }
        //     if ($result === 'o') {
        //         $snapshot = false;
        //     }
        // }


        $cacheDisable = Configure::read('Cache.disable');
        Configure::write('Cache.disable', true);
        $db = ConnectionManager::getDataSource("default");
        $currentTables = (array)$db->listSources();
        $content = $this->Schema->read($options);
        $tables =[];
        $this->out(__d('cake_console', "Updating schema files"));

        foreach ($currentTables as $table) {
            $this->out(__d('cake_console', "\n"));
            $this->out(__d('cake_console', "Generating $table"));

            $Object = new AppModel(array('name' => Inflector::classify($table), 'table' => $table, 'ds' => "default"));
            $fields = $this->_schemacolumns($Object);
            $fields['indexes'] = $db->index($Object);
            $fields['tableParameters'] = $db->readTableParameters($table);
            $out = $this->_schemagenerateTable($table, $fields);
            $path = APP.DS.'Lib'.DS.'SchemaSuite'.DS."Schema".DS.$table.".php";
            $file = new File($path, true);
            $content = "<?php \n{$out}";
            if ($file->write($content)) {
                $this->out(__d('cake_console', "Schema  [<success>DONE</success>]"));
            } else {
                $this->out(__d('cake_console', "Schema [<error>FAIL</error>]"));
            }
            $output = "return [\n";
            $datas = Hash::extract($Object->find('all', ['recursive'=>-1]), "{n}.{s}");
            $path = APP.DS.'Lib'.DS.'SchemaSuite'.DS."Default".DS.$table.".php";
            if (empty($datas)) {
                if (file_exists($path)) {
                    unlink($path);
                }
                $this->out(__d('cake_console', "Default [<warning>NONE</warning>]"));

                continue;
            }
            foreach ($datas as $data) {
                $output.="\t[";
                foreach ($data as $key => $value) {
                    $value = str_replace("'", "\'", $value);
                    $output.="'$key'=>'$value',";
                }
                $output = rtrim($output, ",");
                $output.="],\n";
            }
            $output .= "];";

            $file = new File($path, true);
            $content = "<?php \n{$output}";
            if ($file->write($content)) {
                $this->out(__d('cake_console', "Default [<success>DONE</success>]"));
            } else {
                $this->out(__d('cake_console', "Default [<error>FAIL</error>]"));
            }
        }

        $this->out(__d('cake_console', "\nSchema generated finished"));

        return $this->_stop();
    }

    protected function _schemacolumns(&$Obj)
    {
        $db = $Obj->getDataSource();
        $fields = $Obj->schema(true);

        $columns = array();
        foreach ($fields as $name => $value) {
            if ($Obj->primaryKey === $name) {
                $value['key'] = 'primary';
            }
            if (!isset($db->columns[$value['type']])) {
                trigger_error(__d('cake_dev', 'Schema generation error: invalid column type %s for %s.%s does not exist in DBO', $value['type'], $Obj->name, $name), E_USER_NOTICE);
                continue;
            } else {
                $defaultCol = $db->columns[$value['type']];
                if (isset($defaultCol['limit']) && $defaultCol['limit'] == $value['length']) {
                    unset($value['length']);
                } elseif (isset($defaultCol['length']) && $defaultCol['length'] == $value['length']) {
                    unset($value['length']);
                }
                unset($value['limit']);
            }

            if (isset($value['default']) && ($value['default'] === '' || ($value['default'] === false && $value['type'] !== 'boolean'))) {
                unset($value['default']);
            }
            if (empty($value['length'])) {
                unset($value['length']);
            }
            if (empty($value['key'])) {
                unset($value['key']);
            }
            $columns[$name] = $value;
        }

        return $columns;
    }


    private function _schemabuild($data)
    {
        $file = null;
        foreach ($data as $key => $val) {
            if (!empty($val)) {
                if (!in_array($key, array('plugin', 'name', 'path', 'file', 'connection', 'tables', '_log'))) {
                    if ($key[0] === '_') {
                        continue;
                    }
                    $this->tables[$key] = $val;
                    unset($this->{$key});
                } elseif ($key !== 'tables') {
                    if ($key === 'name' && $val !== $this->name && !isset($data['file'])) {
                        $file = Inflector::underscore($val) . '.php';
                    }
                    $this->{$key} = $val;
                }
            }
        }
    }
    private function _schemagenerateTable($table, $fields)
    {
        $out = "return array(\n";
        if (is_array($fields)) {
            $cols = array();
            foreach ($fields as $field => $value) {
                if ($field !== 'indexes' && $field !== 'tableParameters') {
                    if (is_string($value)) {
                        $type = $value;
                        $value = array('type' => $type);
                    }
                    $col = "\t\t'{$field}' => array('type' => '" . $value['type'] . "', ";
                    unset($value['type']);
                    $col .= implode(', ', $this->_values($value));
                } elseif ($field === 'indexes') {
                    $col = "\t\t'indexes' => array(\n\t\t\t";
                    $props = array();
                    foreach ((array)$value as $key => $index) {
                        $props[] = "'{$key}' => array(" . implode(', ', $this->_values($index)) . ")";
                    }
                    $col .= implode(",\n\t\t\t", $props) . "\n\t\t";
                } elseif ($field === 'tableParameters') {
                    $col = "\t\t'tableParameters' => array(";
                    $props = $this->_values($value);
                    $col .= implode(', ', $props);
                }
                $col .= ")";
                $cols[] = $col;
            }
            $out .= implode(",\n", $cols);
        }
        $out .= "\n\t);\n\n";
        return $out;
    }
    private function _schemawrite($object, $options = array())
    {
        if (is_object($object)) {
            $object = get_object_vars($object);
            // $this->build($object);
        }

        if (is_array($object)) {
            $options = $object;
            unset($object);
        }



        $out .= "}\n";
        $path = APP.DS.'Config'.DS.'Schema';


        return false;
    }
    protected function _values($values)
    {
        $vals = array();
        if (is_array($values)) {
            foreach ($values as $key => $val) {
                if (is_array($val)) {
                    $vals[] = "'{$key}' => array(" . implode(", ", $this->_values($val)) . ")";
                } else {
                    $val = var_export($val, true);
                    if ($val === 'NULL') {
                        $val = 'null';
                    }
                    if (!is_numeric($key)) {
                        $vals[] = "'{$key}' => {$val}";
                    } else {
                        $vals[] = "{$val}";
                    }
                }
            }
        }
        return $vals;
    }
/**
 * Dump Schema object to sql file
 * Use the `write` param to enable and control SQL file output location.
 * Simply using -write will write the sql file to the same dir as the schema file.
 * If -write contains a full path name the file will be saved there. If -write only
 * contains no DS, that will be used as the file name, in the same dir as the schema file.
 *
 * @return string
 */
    public function dump()
    {
        $write = false;
        $Schema = $this->Schema->load();
        if (!$Schema) {
            $this->err(__d('cake_console', 'Schema could not be loaded'));
            return $this->_stop();
        }
        if (!empty($this->params['write'])) {
            if ($this->params['write'] == 1) {
                $write = Inflector::underscore($this->Schema->name);
            } else {
                $write = $this->params['write'];
            }
        }
        $db = ConnectionManager::getDataSource($this->Schema->connection);
        $contents = "\n\n" . $db->dropSchema($Schema) . "\n\n" . $db->createSchema($Schema);

        if ($write) {
            if (strpos($write, '.sql') === false) {
                $write .= '.sql';
            }
            if (strpos($write, DS) !== false) {
                $File = new File($write, true);
            } else {
                $File = new File($this->Schema->path . DS . $write, true);
            }

            if ($File->write($contents)) {
                $this->out(__d('cake_console', 'SQL dump file created in %s', $File->pwd()));
                return $this->_stop();
            }
            $this->err(__d('cake_console', 'SQL dump could not be created'));
            return $this->_stop();
        }
        $this->out($contents);
        return $contents;
    }

/**
 * Run database create commands. Alias for run create.
 *
 * @return void
 */
    public function create()
    {
        list($Schema, $table) = $this->_loadSchema();
        $this->_create($Schema, $table);
    }

/**
 * Run database create commands. Alias for run create.
 *
 * @return void
 */
    public function update()
    {
        $db = ConnectionManager::getDataSource("default");

        $drop = $create = array();
        $currentTables = (array)$db->listSources();
        $Schema = $this->Schema->load();
        foreach ($currentTables as $table => $fields) {
            $db->dropSchema($Schema, $table);
        }

        list($Schema, $table) = $this->_loadSchema();
        $this->_update($Schema, $table);
    }

/**
 * Prepares the Schema objects for database operations.
 *
 * @return void
 */
    protected function _loadSchema()
    {
        $name = $plugin = null;
        if (!empty($this->params['name'])) {
            $name = $this->params['name'];
        }
        if (!empty($this->params['plugin'])) {
            $plugin = $this->params['plugin'];
        }

        if (!empty($this->params['dry'])) {
            $this->_dry = true;
            $this->out(__d('cake_console', 'Performing a dry run.'));
        }

        $options = array(
            'name' => $name,
            'plugin' => $plugin,
            'connection' => $this->params['connection'],
        );
        if (!empty($this->params['snapshot'])) {
            $fileName = basename($this->Schema->file, '.php');
            $options['file'] = $fileName . '_' . $this->params['snapshot'] . '.php';
        }

        $Schema = $this->Schema->load($options);

        if (!$Schema) {
            $this->err(__d('cake_console', '<error>Error</error>: The chosen schema could not be loaded. Attempted to load:'));
            $this->err(__d('cake_console', '- file: %s', $this->Schema->path . DS . $this->Schema->file));
            $this->err(__d('cake_console', '- name: %s', $this->Schema->name));
            return $this->_stop(2);
        }
        $table = null;
        if (isset($this->args[1])) {
            $table = $this->args[1];
        }
        return array(&$Schema, $table);
    }

/**
 * Create database from Schema object
 * Should be called via the run method
 *
 * @param CakeSchema $Schema The schema instance to create.
 * @param string $table The table name.
 * @return void
 */
    protected function _create(CakeSchema $Schema, $table = null)
    {
        $db = ConnectionManager::getDataSource($this->Schema->connection);

        $drop = $create = array();

        if (!$table) {
            foreach ($Schema->tables as $table => $fields) {
                $drop[$table] = $db->dropSchema($Schema, $table);
                $create[$table] = $db->createSchema($Schema, $table);
            }
        } elseif (isset($Schema->tables[$table])) {
            $drop[$table] = $db->dropSchema($Schema, $table);
            $create[$table] = $db->createSchema($Schema, $table);
        }
        if (empty($drop) || empty($create)) {
            $this->out(__d('cake_console', 'Schema is up to date.'));
            return $this->_stop();
        }

        $this->out("\n" . __d('cake_console', 'The following table(s) will be dropped.'));
        $this->out(array_keys($drop));

        if (!empty($this->params['yes']) ||
            $this->in(__d('cake_console', 'Are you sure you want to drop the table(s)?'), array('y', 'n'), 'n') === 'y'
        ) {
            $this->out(__d('cake_console', 'Dropping table(s).'));
            $this->_run($drop, 'drop', $Schema);
        }

        $this->out("\n" . __d('cake_console', 'The following table(s) will be created.'));
        $this->out(array_keys($create));

        if (!empty($this->params['yes']) ||
            $this->in(__d('cake_console', 'Are you sure you want to create the table(s)?'), array('y', 'n'), 'y') === 'y'
        ) {
            $this->out(__d('cake_console', 'Creating table(s).'));
            $this->_run($create, 'create', $Schema);
        }
        $this->out(__d('cake_console', 'End create.'));
    }

/**
 * Update database with Schema object
 * Should be called via the run method
 *
 * @param CakeSchema &$Schema The schema instance
 * @param string $table The table name.
 * @return void
 */
    protected function _update(&$Schema, $table = null)
    {
        $db = ConnectionManager::getDataSource($this->Schema->connection);

        $this->out(__d('cake_console', 'Comparing Database to Schema...'));
        $options = array();
        if (isset($this->params['force'])) {
            $options['models'] = false;
        }
        $Old = $this->Schema->read($options);
        $compare = $this->Schema->compare($Old, $Schema);

        $contents = array();

        if (empty($table)) {
            foreach ($compare as $table => $changes) {
                if (isset($compare[$table]['create'])) {
                    $contents[$table] = $db->createSchema($Schema, $table);
                } else {
                    $contents[$table] = $db->alterSchema(array($table => $compare[$table]), $table);
                }
            }
        } elseif (isset($compare[$table])) {
            if (isset($compare[$table]['create'])) {
                $contents[$table] = $db->createSchema($Schema, $table);
            } else {
                $contents[$table] = $db->alterSchema(array($table => $compare[$table]), $table);
            }
        }

        if (empty($contents)) {
            $this->out(__d('cake_console', 'Schema is up to date.'));
            return $this->_stop();
        }

        $this->out("\n" . __d('cake_console', 'The following statements will run.'));
        $this->out(array_map('trim', $contents));
        if (!empty($this->params['yes']) ||
            $this->in(__d('cake_console', 'Are you sure you want to alter the tables?'), array('y', 'n'), 'n') === 'y'
        ) {
            $this->out();
            $this->out(__d('cake_console', 'Updating Database...'));
            $this->_run($contents, 'update', $Schema);
        }

        $this->out(__d('cake_console', 'End update.'));
    }

/**
 * Runs sql from _create() or _update()
 *
 * @param array $contents The contents to execute.
 * @param string $event The event to fire
 * @param CakeSchema $Schema The schema instance.
 * @return void
 */
    protected function _run($contents, $event, CakeSchema $Schema)
    {
        if (empty($contents)) {
            $this->err(__d('cake_console', 'Sql could not be run'));
            return;
        }
        Configure::write('debug', 2);
        $db = ConnectionManager::getDataSource($this->Schema->connection);

        foreach ($contents as $table => $sql) {
            if (empty($sql)) {
                $this->out(__d('cake_console', '%s is up to date.', $table));
            } else {
                if ($this->_dry === true) {
                    $this->out(__d('cake_console', 'Dry run for %s :', $table));
                    $this->out($sql);
                } else {
                    if (!$Schema->before(array($event => $table))) {
                        return false;
                    }
                    $error = null;
                    try {
                        $db->execute($sql);
                    } catch (PDOException $e) {
                        $error = $table . ': ' . $e->getMessage();
                    }

                    $Schema->after(array($event => $table, 'errors' => $error));

                    if (!empty($error)) {
                        $this->err($error);
                    } else {
                        $this->out(__d('cake_console', '%s updated.', $table));
                    }
                }
            }
        }
    }

/**
 * Gets the option parser instance and configures it.
 *
 * @return ConsoleOptionParser
 */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $plugin = array(
            'short' => 'p',
            'help' => __d('cake_console', 'The plugin to use.'),
        );
        $connection = array(
            'short' => 'c',
            'help' => __d('cake_console', 'Set the db config to use.'),
            'default' => 'default'
        );
        $path = array(
            'help' => __d('cake_console', 'Path to read and write schema.php'),
            'default' => APP . 'Config' . DS . 'Schema'
        );
        $file = array(
            'help' => __d('cake_console', 'File name to read and write.'),
        );
        $name = array(
            'help' => __d('cake_console',
                'Classname to use. If its Plugin.class, both name and plugin options will be set.'
            )
        );
        $snapshot = array(
            'short' => 's',
            'help' => __d('cake_console', 'Snapshot number to use/make.')
        );
        $models = array(
            'short' => 'm',
            'help' => __d('cake_console', 'Specify models as comma separated list.'),
        );
        $dry = array(
            'help' => __d('cake_console',
                'Perform a dry run on create and update commands. Queries will be output instead of run.'
            ),
            'boolean' => true
        );
        $force = array(
            'short' => 'f',
            'help' => __d('cake_console', 'Force "generate" to create a new schema'),
            'boolean' => true
        );
        $write = array(
            'help' => __d('cake_console', 'Write the dumped SQL to a file.')
        );
        $exclude = array(
            'help' => __d('cake_console', 'Tables to exclude as comma separated list.')
        );
        $yes = array(
            'short' => 'y',
            'help' => __d('cake_console', 'Do not prompt for confirmation. Be careful!'),
            'boolean' => true
        );

        $parser->description(
            __d('cake_console', 'The Schema Shell generates a schema object from the database and updates the database from the schema.')
        )->addSubcommand('view', array(
            'help' => __d('cake_console', 'Read and output the contents of a schema file'),
            'parser' => array(
                'options' => compact('plugin', 'path', 'file', 'name', 'connection'),
                'arguments' => compact('name')
            )
        ))->addSubcommand('generate', array(
            'help' => __d('cake_console', 'Reads from --connection and writes to --path. Generate snapshots with -s'),
            'parser' => array(
                'options' => compact('plugin', 'path', 'file', 'name', 'connection', 'snapshot', 'force', 'models', 'exclude'),
                'arguments' => array(
                    'snapshot' => array('help' => __d('cake_console', 'Generate a snapshot.'))
                )
            )
        ))->addSubcommand('dump', array(
            'help' => __d('cake_console', 'Dump database SQL based on a schema file to stdout.'),
            'parser' => array(
                'options' => compact('plugin', 'path', 'file', 'name', 'connection', 'write'),
                'arguments' => compact('name')
            )
        ))->addSubcommand('create', array(
            'help' => __d('cake_console', 'Drop and create tables based on the schema file.'),
            'parser' => array(
                'options' => compact('plugin', 'path', 'file', 'name', 'connection', 'dry', 'snapshot', 'yes'),
                'args' => array(
                    'name' => array(
                        'help' => __d('cake_console', 'Name of schema to use.')
                    ),
                    'table' => array(
                        'help' => __d('cake_console', 'Only create the specified table.')
                    )
                )
            )
        ))->addSubcommand('update', array(
            'help' => __d('cake_console', 'Alter the tables based on the schema file.'),
            'parser' => array(
                'options' => compact('plugin', 'path', 'file', 'name', 'connection', 'dry', 'snapshot', 'force', 'yes'),
                'args' => array(
                    'name' => array(
                        'help' => __d('cake_console', 'Name of schema to use.')
                    ),
                    'table' => array(
                        'help' => __d('cake_console', 'Only create the specified table.')
                    )
                )
            )
        ));

        return $parser;
    }
}
