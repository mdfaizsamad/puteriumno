<?php

App::uses('ApiAppController', 'Api.Controller');

class LecturersController extends ApiAppController {
  public $uses = ['LecMaster'];
  public function lists($section_id=null){

	$this->loadModel('ClassSchedule.ClassSection');
	$lecMas = $this->ClassSection->find('first',['conditions'=>['Section.id'=>$section_id],'fields'=>'course_lecturer_id','recursive'=>-1]);

	$lec_id = $lecMas['Section']['course_lecturer_id'];

	$this->loadModel('ClassSchedule.ClassLecturerMaster');
	$data = $this->ClassLecturerMaster->find('list',['conditions'=>['LecturerMaster.id'=>$lec_id]]);

    $this->_serialized(compact('data'));
  }

}
?>
