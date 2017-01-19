<?php

App::uses('ClassRegistry', 'Utility');

class SchemaSuite
{
    const uuid = array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const id = array('type' => 'integer', 'length' => 10, 'key' => 'primary');
//    const id11 = array('type' => 'integer', 'length' => 11, 'key' => 'primary');
//    const id20 = array('type' => 'integer', 'length' => 20,  'key' => 'primary');
    const int2null = array('type' => 'integer',  'null' => true, 'default'=>null,'length'=>2);

    const int2 = array('type' => 'integer', 'length' => 2);
    const int5 = array('type' => 'integer', 'length' => 5);
    const int10 = array('type' => 'integer', 'length' => 10);
    const int10null = array('type' => 'integer',  'null' => true, 'default'=>null,'length' => 10);
    const int11 = array('type' => 'integer', 'length' => 11);
    const int10d1 = array('type' => 'integer', 'length' => 10, 'default' => 1);
    const varchar = array('type' => 'string', 'null' => false, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varcharnull = array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar2 = array('type' => 'string', 'null' => false, 'length' => 2, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar2null = array('type' => 'string', 'null' => true, 'length' => 2, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar5 = array('type' => 'string', 'null' => false, 'length' => 5, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar10 = array('type' => 'string', 'null' => false, 'length' => 10, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar12 = array('type' => 'string', 'null' => false, 'length' => 12, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar5null = array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar10null = array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar15 = array('type' => 'string', 'null' => false, 'length' => 15, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar20 = array('type' => 'string', 'null' => false, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar25 = array('type' => 'string', 'null' => false, 'length' => 25, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar20null = array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar36 = array('type' => 'string', 'null' => false, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar36null = array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar50 = array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const varchar100 = array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const text = array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8');
    const datetime = array('type' => 'datetime', 'null' => true, 'default' => null);
    const date = array('type' => 'time', 'null' => true, 'default' => null);
    const ibool = array('type' => 'boolean', 'default' => null);
    const ibool1 = array('type' => 'boolean', 'length' => 1, 'default' => 1);
    const ibool0 = array('type' => 'boolean', 'length' => 1, 'default' => 0);
    const float = array('type' => 'float', 'default' => 0);
    const indexes = array('PRIMARY' => array('column' => 'id', 'unique' => 1));
    const tableParameters = array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB');

    public static $fixtures = [];

    public static function existDefault($schema)
    {
        $file = __DIR__ . DS . 'Default' . DS . $schema . ".php";
        return (file_exists($file));
    }

    public static function getSchemas()
    {
        return glob(__DIR__ . DS . 'Schema' . DS . "*.php");
    }

    public static function getDefault($default)
    {
        $file = __DIR__ . DS . 'Default' . DS . $default . ".php";
        return (file_exists($file)) ? include $file : array();
    }

    public static function getDefaults()
    {
        return glob(__DIR__ . DS . 'Default' . DS . "*.php");
    }

    public static function createDefault($schema)
    {
        $file = __DIR__ . DS . 'Default' . DS . $schema . ".php";
        if (!file_exists($file)) {
            return false;
        }
        $model = ClassRegistry::init(Inflector::classify($schema));
        $model->cacheQueries=false;
        unset($model->actsAs);
        $model->create();
        $opt = include($file);
        return $model->saveAll($opt);
    }

    public static function getFixtures($fix, $filter = [])
    {
        $results = self::$fixtures[$fix];
        $opt = [];
        $ftr = (empty($filter));
        foreach ($results as $i => $result) {
            if ($ftr || Hash::contains($result, $filter)) {
                $opt[] = $result;
            }
        }
        return $opt;
    }

    public static function setFixture($schema, $options = [])
    {
        $model = ClassRegistry::init(Inflector::classify($schema));
        $model->create();
        return $model->save(array($model->alias => self::generate($schema, $options)));
    }

    public static function getFixture($fix, $filter = [])
    {
        $results = self::$fixtures[$fix];
        $ftr = (empty($filter));
        foreach ($results as $i => $result) {
            if ($ftr || Hash::contains($result, $filter)) {
                return $result;
            }
        }
        return [];
    }

    private static $_cache = [];

    public static function fields($schema)
    {
        $file = __DIR__ . DS . 'Schema' . DS . $schema . ".php";
        $opt = [];
        if (file_exists($file)) {
            $opt = include($file);
            self::$_cache[$schema] = $opt;
        }
        return $opt;
    }

    public static function generate($schema, $options = [])
    {
        $fields = self::fields($schema);
        return self::records($fields, $options);
    }

    public static function records($fields, $options = [])
    {
        $records = [];
        foreach ($fields as $field => $scheme) {
            if (isset($options[$field])) {
                $records[$field] = $options[$field];
            } else {
                switch ($scheme) {
                    case self::varcharnull:
                    case self::varchar5null:
                    case self::varchar20null:
                    case self::varchar36null:
                        $records[$field] = null;
                        break;
                    case self::varchar:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), rand(10, 100));
                        break;
                    case self::varchar2:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), rand(1, 2));
                        break;
                    case self::varchar15:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), rand(1, 15));
                        break;
                    case self::varchar20:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), 20);
                        break;
                    case self::varchar36:
                        $records[$field] = String::uuid();
                        break;
                    case self::varchar50:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), 50);
                        break;
                    case self::varchar100:
                        $records[$field] = substr(md5(microtime()), rand(0, 26), 100);
                        break;
                    case self::uuid:
                        $records[$field] = String::uuid();
                        break;
                    case self::int10:
                    case self::int10d1:
                        $records[$field] = rand(0, 9);
                        break;
                    case self::datetime:
                        $records[$field] = date('Y-m-d H:i:s');
                        break;
                    case self::ibool:
                    case self::ibool1:
                    case self::ibool0:
                        $records[$field] = rand(0, 1);
                        break;
                    case self::id:
                    default:
                        break;
                }
            }
        }
        return $records;
    }
}
