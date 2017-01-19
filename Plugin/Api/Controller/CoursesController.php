<?php
App::uses('ApiAppController', 'Api.Controller');

class CoursesController extends ApiAppController {

    public $uses = ['AcademicProgram.Course','Faculty','AcademicProgram.ProgramStructure','AcademicProgram.ProgramStructureCourse'];

    public function lists($id=null,$program_structure_id) {

    $programStructureDatas = $this->ProgramStructure->findById($program_structure_id);

    $course_yang_dah_select = [];
    foreach($programStructureDatas['Course'] as $course_already_selected)
    {
        $course_yang_dah_select[] = $course_already_selected['id']; 
    }
    $data = ['-- Please choose one --'];
    if($id == 0)
    {
        $courses = $this->Course->find('all', [

            'fields' => [
                'id','course_code', 'course_name']]);

    }
    else{
    	$courses = $this->Course->find('all', [
            'conditions' => [
                'faculty_id' => $id,
            ],
            'fields' => [
                'id','course_code', 'course_name']]);
    }

    foreach($courses as $course)
    {
        $data[$course['Course']['id']] = '('.$course['Course']['course_code'].') '.$course['Course']['course_name'];
    }
	$this->_serialized(compact('data'));

    }

    public function faculty_list($academic_group){

        $this->Course->Behaviors->load('Containable');
    	$data_course = $this->Course->find('all',[
            'fields'=>['id','faculty_id'],
            'contain'=>[
                'Faculty'=>[
                    'fields'=>['id','name']
                ]
            ]
        ]);

    	$data[] = '-- Please choose one --';
    	foreach($data_course as $data_faculty)
    	{
    		$data[$data_faculty['Faculty']['id']] = $data_faculty['Faculty']['name'];
    	}

   		$this->_serialized(compact('data'));
    }

    public function department_list($faculty,$academic_group){

    	$data_course = $this->Course->find('all',['conditions' => ['Course.faculty_id' => $faculty],'recursive'=>'1']);
    	
    	$data[] = '-- Please choose one --';
    	foreach($data_course as $data_faculty)
    	{
    		$data[$data_faculty['Department']['id']] = $data_faculty['Department']['name'];
    	}

   		$this->_serialized(compact('data'));
    }

    public function course_list($department,$faculty,$academic_group=null){

    	$data_course = $this->Course->find('all',['conditions' => ['Course.department_id' => $department,'Course.faculty_id' => $faculty,'Course.academic_group_id'=>$academic_group],'recursive'=>'-1','order'=>['Course.course_name ASC']]);

    	foreach($data_course as $data_department)
    	{
    		$data[$data_department['Course']['id']] = $data_department['Course']['course_code'].' - '.$data_department['Course']['course_name'];
    	}

   		$this->_serialized(compact('data'));
    }

    public function course_name(){

        $course_id = $this->request->query('course_id');

        $data_course = $this->Course->find('first',['recursive'=>-1,'conditions'=>['Course.id'=>$course_id],'fields'=>'course_name']);
        $course_name = $data_course['Course']['course_name'];
        
        $this->_serialized(compact('course_name'));
    }

}
