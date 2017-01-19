<?php

App::uses('ApiAppController', 'Api.Controller');

class CourseMarkBreakdownsController extends ApiAppController {
  	
  	public $uses = ['Assessment.CourseMarkBreakdown'];

	public function delete_br($id = null) {
		$this->loadModel('Assessment.CourseMarkBreakdown');

		$this->CourseMarkBreakdown->id = $this->request->query['id'];
		
		$data = true;

		if($this->CourseMarkBreakdown->delete()){
			$this->_serialized(compact('data'));
		}
	}

}
?>
