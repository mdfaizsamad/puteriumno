<?php

App::uses('Bs.BsForm', 'Helper');

class UnitarFormHelper extends BsFormHelper
{
    public $helpers = array('Js','Html');
    public $settings = array(
    'datepicker'=>array(
      "format"=>"yyyy-mm-dd"
    )
  );

  

    private function _filterFormOptions($val, $options)
    {
        if (!isset($options['between'])) {
            $options['between']='<div class="col-md-12">';
        }
        $o = explode('.', $val);
        $name = 'data';
        $data = $this->request->data;
        foreach ($o as $i => $_o) {
            if ($i>0) {
                $o_o[$i]=Inflector::humanize($_o);
            }
            $oo[$i]=Inflector::camelize($_o);
            $name.="[$_o]";
            if (isset($data[$_o])) {
                $data = $data[$_o];
                // debug($data);
            } else {
                $data = null;
            }
        }

        $label = (!isset($options['label']))?implode(' ', $o_o):$options['label'];
        $for = (isset($options['for']))?$options['for']:implode('', $oo);
        if (isset($options['col'])&&count($options['col'])==1) {
            $val = intval($options['col'][0]);
            $options['col'][1] = 12 -$val;
        } else {
            $options['col'][1] = 4;
            $options['col'][0] = 8;
        }
        $hide = (isset($options['hide'])&&$options['hide'])?' hide':'';
        unset($options['hide']);
        unset($options['for']);
        $options['label'] = '';

        return compact('options', 'label', 'for', 'name', 'hide', 'data');
    }
    public function dropdown($key, $options=[])
    {
        $a = $this->_filterFormOptions($key, $options);

        if (@$options['disabled']) {
            if (isset($options['value'])) {
                $options['value']=$options['options'][$options['value']];
            } else {
                $options['value']=$options['options'][$a['data']];
            }
            return $this->col($key, $options);
        }
        $options = $a['options'];
        $parent_class = "form-group row".$a['hide'];
        if (isset($options['parent_class'])) {
            $parent_class.=$options['parent_class'];
        }
        $opt = "<div class='$parent_class'><label class='col-md-".$options['col'][1]." control-label' for='".$a['for']."'>".h($a['label'])."</label>";
        $options['label'] = '';
        $col = $options['col'][0];
        unset($options['col']);
        $class = "form-control form-control";
        if (isset($options['class'])) {
            $class .= " ".$options['class'];
        }
        $id = "";
        if (isset($options['id'])) {
            $id = " id='".$options['id']."'";
        }
        $top = '<select name="'.$a['name'].'" class="'.$class.'"'.$id.'>';

        if (!isset($options['options'])) {
            throw new CakeException("Empty options");
        }
        if ($a['data'] !== null) {
            $options['default'] = $a['data'];
        }
        $empty = isset($options['empty']);
        $default = isset($options['default']);
        if ($empty&&!$default) {
            $top .='<option selected=\'selected\'>'.h($options['empty']).'</option>';
        } elseif ($empty) {
            $top .='<option>'.h($options['empty']).'</option>';
        } elseif (!$default) {
            $options['default'] = false;
        }

        foreach ($options['options'] as $key => $value) {
            if (!$default) {
                if (!$empty) {
                    $checked = "selected='selected'";
                } else {
                    $checked = "";
                }
                $options['default'] =  $key;
                $default=true;
            } else {
                $checked = ($options['default']==$key)?"selected='selected'":"";
            }
            $value = h($value);
            $top.="<option value='".h($key)."' $checked> $value</option>";
        }
        $top.='</select>';
        $opt .= sprintf('<div class="col-md-%s">%s</div></div>', $col, $top);
        return $opt;
    }
    public function yesno($key, $options=[])
    {
        $a = $this->_filterFormOptions($key, $options);
        $options = $a['options'];
        $class = 'form-group row'.$a['hide'];
        if (isset($options['class'])) {
            $class .= " ".$options['class'];
        }
        $opt = "<div class='$class'><label class='col-md-".$options['col'][1]." control-label' for='".$a['for']."'>".h($a['label'])."</label>";

        if (!isset($options['options'])) {
            $options['default'] =  $options['options'][true]="Yes";
            $options['options'][false]="No";
        } elseif (!isset($options['default'])) {
            $options['default'] = true;
        }
        if ($a['data'] !== null) {
            $options['default'] = $a['data'];
        }
        if (!isset($options['default'])) {
            $options['default'] = $options['value'][0];
        }

        $top="<div class='radio'>";
        foreach ($options['options'] as $key => $value) {
            $checked = ($options['default']==$key)?"checked":"";
            $value = h($value);
            $top .= "<label><input type='radio' name='".$a['name']."' value='$key' $checked>".$value."&nbsp;&nbsp;</label>&nbsp;";//data[Master][is_malaysian]
        }
        $top.='</div>';
        $col = $options['col'][0];
        unset($options['col']);
        $opt .= sprintf('<div class="col-md-%s">%s</div></div>', $col, $top);
        return $opt;
    }

    public function col($val, $options=[])
    {
        $a = $this->_filterFormOptions($val, $options);
        $options = $a['options'];
        $opt = "<div class='form-group row".$a['hide']."'><label class='col-md-".$options['col'][1]." control-label' for='".$a['for']."'>".h($a['label'])."</label>";
        $options['label'] = '';
        $col = $options['col'][0];
        unset($options['col']);
        $opt .= sprintf('<div class="col-md-%s">%s</div></div>', $col, $this->input($val, $options));
        return $opt;
    }
    public function input($fieldname, $options = array())
    {
        $tooltip = false;
        if (isset($options['tooltip'])) {
            $options["data-toggle"]="tooltip";
            if (!isset($options['data-placement'])) {
                $options['data-placement']="left";
            }
            if (!isset($options['title'])) {
                $options['title']=$options['tooltip'];
                unset($options['tooltip']);
            }
        }

        $output = parent::input($fieldname, $options);
        if (isset($options['label']) && $options['label'] === '') {
            $output = preg_replace("/<\\/?label(\\s+.*?>|>)/", "", $output);
        }
        return  $output;
    }
    protected $_bufferScript = array();
    public function beforeLayout($filename)
    {
        foreach ($this->_bufferScript as $fn => $script) {
            $this->Js->buffer($script);
        }
    }

    public function datepicker($a, $e=array())
    {
        if (!isset($this->_bufferScript['datepicker'])) {
            $var ="(function(){var dtpopt = ".json_encode($this->settings['datepicker']).";";
            $var.="$('.datepicker').datepicker(dtpopt);";
            $var.="$('.datepicker').on('changeDate',function(ev){";
            $var.="$(this).datepicker('hide');});";
            $var .="})()";
            $this->_bufferScript['datepicker'] = $var;
            $this->Html->script('/plugins/bootstrap/datepicker/dist/js/bootstrap-datepicker.min', array('inline'=>false));
            $this->Html->css('/plugins/bootstrap/datepicker/dist/css/bootstrap-datepicker3.min', array('inline'=>false));
        }

        $i = '<div class="input-group date">%s<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></div>';
        if (!isset($e['class'])) {
            $e['class'] =' datepicker';
        } else {
            $e['class'].=' datepicker';
        }
        $e['type'] = 'text';
        $ua = [];
        if (isset($e['id'])) {
            $ua[]= "id='".$e['id']."'";
        }
        if (isset($e['value'])) {
            $ua[]= "value='".$e['value']."'";
        }
        if (isset($e['required'])&&$e['required']) {
            $ua[]= " required='required'";
        }

        $u = '<input name="'.$a.'" class="form-control datepicker" type="text" '.implode(" ", $ua).'>';
        $o = sprintf($i, $u);
        return $o;
    }
    public function end($options = null, $secureAttributes = array())
    {
        if (!isset($this->_bufferScript['end'])) {
            $this->_bufferScript['end'] = '$(function(){$(".form-submit-wait").hide();$("input[type=\'submit\']").click(function(e){$(".form-submit-wait").show();$(this).hide();});});';
        }
        return parent::end($options, $secureAttributes);
    }
}
