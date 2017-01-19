<?php

App::uses('ApiAppController', 'Api.Controller');

class ProvincesController extends ApiAppController {
  public $uses = ['Province'];
  public function lists($country_id=null){
    $data = $this->Province->find('list',array('conditions'=>array('Province.country_id'=>$country_id)));
    $this->_serialized(compact('data'));
  }

}
?>
