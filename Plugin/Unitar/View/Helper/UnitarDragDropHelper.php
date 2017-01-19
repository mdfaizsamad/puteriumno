<?php

class UnitarDragDropHelper extends Helper
{
    public $helpers = array('Js','Html');
    protected $_init = false;
    public function drop($id, $options = '{}')
    {
        if (!$this->_init) {
            $js = [ '/components/jquery-ui/jquery-ui.min.js', '/components/jquery-ui/ui/minified/droppable.min.js'];
            $this->Html->script($js, ['block'=>'script']);
            $this->_init = true;
        }
        $this->Js->buffer('$(function() {$("'.$id.'").droppable('.$options.');});');
    }
    public function drag($id, $options = '{}')
    {
        if (!$this->_init) {
            $js = [ '/components/jquery-ui/jquery-ui.min.js', '/components/jquery-ui/ui/minified/draggable.min.js'];
            $this->Html->script($js, ['block'=>'script']);
            $this->_init = true;
        }
        $this->Js->buffer('$(function() {$("'.$id.'").draggable('.$options.');});');
    }
}
