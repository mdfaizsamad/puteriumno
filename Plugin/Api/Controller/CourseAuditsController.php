<?php
App::uses('ApiAppController', 'Api.Controller');

class CourseAuditsController extends ApiAppController {

    public $uses = ['AcademicTimeline.Timeline','AcademicGroup', 'AcademicTimeline.Semester', 'AcademicTimeline.SemesterYear'];

    public function lists() {
    	$data = $this->Program->find('first');
    	$this->_serialized(compact('data'));

    }

    public function filter_timeline_by_academicgroup($academic_group_id = null) {
      $this->loadModel('AcademicTimeline.Timeline');
    	if (!empty($academic_group_id)) {
    	    $conditions = array('conditions' => array('academic_group_id' => $academic_group_id));
    	} else {
    	    $conditions = array();
    	}

    	$conditions['fields'] = array('id', 'name');
      $lists = $this->Timeline->find('all', $conditions);
      $data[] = '-- Please choose timeline --';
      foreach($lists as $list){
        $data[$list['Timeline']['id']] = $list['Timeline']['name'];
      }
    	$this->_serialized(compact('data'));

    }

    public function filter_semester_by_timelineid($timeline_id = null) {
      $this->loadModel('AcademicTimeline.Semester');
      if (!empty($timeline_id)) {
          $conditions = array('conditions' => array('timeline_id' => $timeline_id));
      } else {
          $conditions = array();
      }
      //$conditions['fields'] = array('id', 'name');
      $data_sems = $this->Semester->find('all', $conditions);
      $data[] = '-- Please choose semester --';
    	foreach($data_sems as $data_sem)
    	{
    		$data[$data_sem['Semester']['id']] = $data_sem['Semester']['name']." ".$data_sem['Semester']['year'];
    	}

      $this->_serialized(compact('data'));

    }

    public function filter_intake_by_semesterid($semester_id = null) {
      $this->loadModel('AcademicTimeline.IntakeSemester');
      if (!empty($semester_id)) {
          $conditions = array('conditions' => array('semester_id' => $semester_id));
      } else {
          $conditions = array();
      }
      //$conditions['fields'] = array('id', 'name');
      $data_sems = $this->IntakeSemester->find('all', $conditions);
      //debug($data_sems); die;
      $data[] = '-- Please choose intake --';
    	foreach($data_sems as $data_sem)
    	{
    		$data[$data_sem['Intake']['id']] = $data_sem['Intake']['name'];
    	}

      $this->_serialized(compact('data'));

    }

    public function filter_program_by_academicgroup($academic_group_id = null) {
      $this->loadModel('Program');
      if (!empty($academic_group_id)) {
          $conditions = array('conditions' => array('academic_group_id' => $academic_group_id));
      } else {
          $conditions = array();
      }
      $conditions['fields'] = array('id', 'name');
      $lists = $this->Program->find('all', $conditions);
      $data[]= '-- Please choose program --';
      foreach($lists as $list){
        $data[$list['Program']['id']] = $list['Program']['name'];
      }


      $this->_serialized(compact('data'));

    }

}
