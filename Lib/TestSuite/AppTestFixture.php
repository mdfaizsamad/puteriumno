<?php
App::uses("SchemaSuite","SchemaSuite");
App::uses('String','Utility');
class AppTestFixture extends CakeTestFixture{

  protected $scheme = false;
  protected $autoRecords = false;
  public function __construct(){
    if ($this->scheme){
      $scheme = $this->scheme;
      $this->fields = $fields = SchemaSuite::fields($scheme);
    }
    if($c = $this->autoRecords){
      for($i = 0;$i<$c;$i++){
          SchemaSuite::$fixtures[$this->scheme][] = $this->records[] = SchemaSuite::records($this->fields);
      }
    }

    parent::__construct();
  }
  public function generate($options = []){
    SchemaSuite::$fixtures[$this->scheme][] = $this->records[] = SchemaSuite::records($this->fields,$options);
  }

}
