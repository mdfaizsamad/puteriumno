<?php
App::uses('AppControllerTestCase', 'TestSuite');
App::uses("Role","Model");

class ViewTestCase extends AppControllerTestCase{
  public $content='';
  public function assertHasFormField($field){
    $os = explode('.',$field);
    $data = '';
    foreach($os as $o){
      $data.=sprintf('\[%s\]',$o);
    }
    try{
      $this->assertRegExp("/\<(input|select)[^>]?(name=\"data$data\").[^>].*?>/",$this->content);
    }catch(Exception $e){
      throw new Exception("Form Field $field not found");
    }

  }
  public function assertHasFormFieldType($field,$type='text'){
    $os = explode('.',$field);
    $data = '';
    foreach($os as $o){
      $data.=sprintf('\[%s\]',$o);
    }
    try{
      $this->assertRegExp("/\<(input|select)[^>]?\b(type=\"$type\")\b(name=\"data$data\").[^>].*?>/",$this->content);
    }catch(Exception $e){
      throw new Exception("Form Field $field not found for type $type");
    }

  }

}
