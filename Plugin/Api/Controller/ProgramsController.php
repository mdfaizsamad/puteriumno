<?php
App::uses('ApiAppController', 'Api.Controller');

class ProgramsController extends ApiAppController {

    public $uses = ['Program','AcademicProgram.ProgramStructure'];

    public function lists() {
	$data = $this->Program->find('first');
	$this->_serialized(compact('data'));

    }

    public function filter_program($program_level_id = null) {
	if (!empty($program_level_id)) {
	    $conditions = array('conditions' => array('Program.program_level_id' => $program_level_id));
	} else {
	    $conditions = array();
	}
	$conditions['fields'] = array('Program.id', 'Program.name');
	$data = $this->Program->find('list', $conditions);
	$this->_serialized(compact('data'));

    }

    public function filter_program_by_faculty($faculty_id = null) {
	if (!empty($faculty_id)) {
	    $conditions = array('conditions' => array('Program.faculty_id' => $faculty_id));
	} else {
	    $conditions = array();
	}
	$conditions['fields'] = array('Program.id', 'Program.name');
	$data = $this->Program->find('list', $conditions);
	$this->_serialized(compact('data'));

    }

    public function filter_program_by_academy_group_program_level($program_level=null, $academic_group_id = null) {
	if (!empty($academic_group_id)) {
	    $conditions = array('conditions' => array('Program.academic_group_id' => $academic_group_id,'Program.program_level_id' => $program_level));
	} else {
	    $conditions = array();
	}

	$conditions['fields'] = array('Program.id', 'Program.name');
	$data1[] = '-- Please Choose One --';
	$data = $this->Program->find('list', $conditions);
	$data = $data1+$data;
	$this->_serialized(compact('data'));

    } 

    public function filter_program_structure_by_program($program_id = null) {
	if (!empty($program_id)) {
	    $conditions = array('conditions' => array('Program.program_id' => $program_id));
	} else {
	    $conditions = array();
	}

	$program_structure = $this->ProgramStructure->find('all',['conditions'=>['ProgramStructure.program_id'=>$program_id]]);
	$data[] = '-- Please Choose One --';
	foreach($program_structure as $prog_struc)
	{
		$data[$prog_struc['ProgramStructure']['id']] = $prog_struc['ProgramStructure']['name'];
	}
	
	$this->_serialized(compact('data'));

    }

}
