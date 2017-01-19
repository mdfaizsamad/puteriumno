<?php

App::uses('ApiAppController', 'Api.Controller');

class TimelinesController extends ApiAppController {
  public $uses = ['AcademicTimeline.Timeline'];

  public function lists($academic_group_id=null){


    $data = $this->Timeline->find('list',array('conditions'=>array('Timeline.academic_group_id'=>$academic_group_id)));

    $this->_serialized(compact('data'));
  }

  public function lists_semester($timeline_id=null){
    $this->loadModel('AcademicTimeline.Semester');
    if (!empty($timeline_id)) {
        $conditions = array('conditions' => array('timeline_id' => $timeline_id));
    } else {
        $conditions = array();
    }
    //$conditions['fields'] = array('id', 'name');
    $data_sems = $this->Semester->find('all', $conditions);
    // $data[] = '-- choose one --';
    foreach($data_sems as $data_sem)
    {
      $data[$data_sem['Semester']['id']] = $data_sem['Semester']['name']." ".$data_sem['Semester']['year'];
    }

    $this->_serialized(compact('data'));
  }

  public function semester_lists($academic_group_id=null){
  	$timeline = $data = [];
  	$data[] = 'All Semester';
    $timeline = $this->Timeline->find('all',array('recursive'=>-1,'fields'=>'id','conditions'=>array('Timeline.academic_group_id'=>$academic_group_id)));

    $this->loadModel('AcademicTimeline.Semester');
    if(isset($timeline) && !empty($timeline)){
    	foreach ($timeline as $key => $time) {

    		$semester = $this->Semester->find('all',['recursive'=>-1,'conditions'=>['Semester.timeline_id'=>$time['Timeline']['id']]]);
    	  foreach($semester as $sem)
        {
          $semester_lists[$sem['Semester']['id']] = $sem['Semester']['name'].'( '.$sem['Semester']['year'].' )';
        }
    	}
      $data = $data + $semester_lists;
    }

    $this->_serialized(compact('data'));
  }

  public function semester_list_2($timeline_id=null){
    $data = [];
    $this->loadModel('AcademicTimeline.Semester');

    $semester = $this->Semester->find('all',array('recursive'=>-1,'conditions'=>array('Semester.timeline_id'=>$timeline_id)));

    foreach($semester as $sem)
    {
      $data[$sem['Semester']['id']] = $sem['Semester']['name'].'( '.$sem['Semester']['year'].' )';
    } 
    
    $this->_serialized(compact('data'));
  }

}
?>
