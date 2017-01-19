<?php

App::uses('ApiAppController', 'Api.Controller');

class SemesterCategoryController extends ApiAppController {
  public $uses = ['SemesterCategory'];
  public function lists($id){
    $data = $this->SemesterCategory->find('list',['conditions'=>['id'=>$id],'fields'=>['semester_per_year']]);

    $this->_serialized(compact('data'));

    
  }

}
?>
