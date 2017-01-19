<?php

App::uses('ApiAppController', 'Api.Controller');

class SemesterYearsController extends ApiAppController {
  public $uses = ['AcademicTimeline.SemesterYear'];

  public function lists($timeline_id=null){
  
  	// $data1[] = '--choose one--';
    $data = $this->SemesterYear->find('list',array('fields'=>['year'],'conditions'=>array('SemesterYear.timeline_id'=>$timeline_id)));
    
    // $data = $data1 + $data;

    $this->_serialized(compact('data'));
  }

}
?>