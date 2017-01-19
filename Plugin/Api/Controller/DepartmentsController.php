<?php
App::uses('ApiAppController', 'Api.Controller');
App::uses('Role', 'Model');

class DepartmentsController extends ApiAppController {

    public $uses = ['Department'];

    public function filter_department($faculty_id = null) {
	if (!empty($faculty_id)) {
	    $conditions = array('conditions' => array('Department.faculty_id' => $faculty_id));
	} else {
	    $conditions = array();
	}
	$data1 = [];
	$conditions['fields'] = array('Department.id', 'Department.name');
	$data1 = $this->Department->find('list', $conditions);
	$data2[] = '--choose one--';

	$data = $data2 + $data1;

	$this->_serialized(compact('data'));

    }

}
