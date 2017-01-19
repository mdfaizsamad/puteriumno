<?php

App::uses('ApiAppController', 'Api.Controller');

class SemestersController extends ApiAppController {
  public $uses = ['AcademicTimeline.Semester'];

  public function lists($timeline_id=null){
    $data = [];
    $data_semester = $this->Semester->find('all',array('conditions'=>array('Semester.timeline_id'=>$timeline_id)));
    // $data[] = '--choose one--';
    foreach ($data_semester as $key => $sem) {
    	$data[$sem['Semester']['id']]=$sem['Semester']['name'].'('.$sem['Semester']['year'].')';
    }

    $this->_serialized(compact('data'));
  }

  public function list_sems($timeline_id=null){

    $data1[] = '--choose one--';
    $data2 = $this->Semester->find('list',array('conditions'=>array('Semester.timeline_id'=>$timeline_id)));

    $data = $data1 + $data2;

    $this->_serialized(compact('data'));
  }

}
?>