<?php

class UnitarDropHelper extends BsFormHelper
{
    public $helpers = array('Js','Html');
    protected $_identifier = [];
    public function addList($lists, $identifier = 'default')
    {
        if (isset($this->_identifier[$identifier])) {
            throw new Exception("Drag identifier error");
        }
        $this->_identifier[$identifier]=$lists;
    }
    public function lists($identifier = 'default')
    {
    }
    public function create($identifier='default')
    {
    }

    public function container($identifier='default')
    {
    }
}
