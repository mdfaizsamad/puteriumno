<?php
App::uses('ApiAppController', 'Api.Controller');

class ProfessionalAcademyController extends ApiAppController {

    public $uses = [
        'ProfesionalAcademySetup.Program',
        'ProfesionalAcademySetup.StudyCentreProgram',
        'ProfessionalAcademy.Course',
        'ProfessionalAcademy.EnrollType',
        'ProfessionalAcademy.CourseOffering',

    ];


    public function program_list($program_level=null){

    	$list_program = $this->Program->find('all',['conditions' => ['Program.program_level_id' => $program_level],'recursive'=>'1']);
    	
    	$data[] = '-- Please Choose One --';
    	foreach($list_program as $data_program)
    	{
    		$data[$data_program['Program']['id']] = $data_program['Program']['name'];
    	}
        
   		$this->_serialized(compact('data'));
    }

    public function study_centre_program_list($study_centre_id=null){

        $list_program = $this->StudyCentreProgram->find('all',['conditions' => ['StudyCentreProgram.study_centre_id' => $study_centre_id],'recursive'=>'1']);
        
        $data[] = '-- Please Choose One --';
        foreach($list_program as $data_program)
        {
            $data[$data_program['Program']['id']] = $data_program['Program']['name'];
        }
        
        $this->_serialized(compact('data'));
    }

    public function get_course_by_program($program_id=null){

        $list_course = $this->Course->find('all',['conditions' => ['Course.program_id' => $program_id,'Course.is_active'=>'1'],'recursive'=>'1']);
        
        $data[] = '-- Please Choose One --';
        foreach($list_course as $data_course)
        {
            $data[$data_course['Course']['id']] = $data_course['Course']['name'];
        }
        
        $this->_serialized(compact('data'));
    }

}
