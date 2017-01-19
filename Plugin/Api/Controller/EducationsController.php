<?php
App::uses('ApiAppController', 'Api.Controller');
App::uses('Role', 'Model');

class EducationsController extends ApiAppController {

    public $uses = ['Applicant.Education'];

    public function remove_course($id = null) {

   
    $this->Education->EducationDetail->id = $id;

    $this->Education->EducationDetail->delete($id);

    $data = [];

	$this->_serialized(compact('data'));

    }

}
