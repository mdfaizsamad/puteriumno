<?php

App::uses("SchemaSuite", "SchemaSuite");

class AppSchema extends CakeSchema
{
    public $only = array();
    public function __construct(array $options = array())
    {
        foreach (SchemaSuite::getSchemas() as $schema) {
            $sch = str_replace('.php', '', basename($schema));
            if (empty($this->only)||in_array($sch, $this->only)) {
                $o = basename($schema, ".php");
                $this->$o = SchemaSuite::fields($o);
            }
        }
        parent::__construct($options);
    }
    public function before($event = array())
    {
        return true;
    }
    protected $_toCreate = [];
    public function after($event = array())
    {
        if (isset($event['create'])) {
            if (SchemaSuite::existDefault($event['create'])) {
                $this->_toCreate[] = $event['create'];
            }
        }
    }

    public function __destruct()
    {
        echo PHP_EOL . 'Dumping default data(s).' . PHP_EOL;
        foreach ($this->_toCreate as $create) {
            echo $create . "." . PHP_EOL;
            SchemaSuite::createDefault($create);
        }
        echo PHP_EOL . 'Dumping default trigger(s).' . PHP_EOL;
        $triggers = require(__DIR__.DS.'trigger.php');
        $model = ClassRegistry::init("DataFunction");
        foreach ($triggers as $trigger) {
            $model->query($trigger);
            $s = strpos($trigger, '`');
            $rtrig = substr($trigger, $s+1, strlen($trigger));
            $s = strpos($rtrig, '`');
            $rtrig = substr($rtrig, 0, $s);
            echo $rtrig.PHP_EOL;
        }
    }
}
