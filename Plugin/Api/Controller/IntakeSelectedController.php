<?php

App::uses('ApiAppController', 'Api.Controller');

class IntakeSelectedController extends ApiAppController
{
    public $uses = [
        'ProfesionalAcademySetup.IntakeStudyCentre',
        'ProfesionalAcademySetup.IntakeProgramLevel',
        'ProfesionalAcademySetup.Intake',
        'ProfessionalAcademy.CourseOffering'];

    public function getIntake($study_centre_id = null,$program_id = null)
    {

        $this->Intake->Behaviors->load('Containable');

        $lists = $this->Intake->find('all',[
            'contain' => [

                'IntakeStudyCentre' => [
                    'fields' => [
                        'IntakeStudyCentre.intake_id',
                        'IntakeStudyCentre.id',
                        'IntakeStudyCentre.study_centre_id'
                        ],
                    'conditions'=>['IntakeStudyCentre.study_centre_id'=>$study_centre_id]
                    ],
                'IntakeProgramLevel' => [
                    'fields' => [
                        'IntakeProgramLevel.intake_id',
                        'IntakeProgramLevel.id',
                        'IntakeProgramLevel.program_id'
                        ],
                    'conditions'=>['IntakeProgramLevel.program_id'=>$program_id]
                    ],
            ]]);

        $data[] = '--Please Choose One--';
        foreach ($lists as $list) {
            if(!empty($list['IntakeProgramLevel']) && !empty($list['IntakeStudyCentre']))
                $data[$list['Intake']['id']] = $list['Intake']['name'];
        }
        
        $this->_serialized(compact('data'));
    }

    public function getCourse($intake_id = null,$program_id=null,$study_centre_id=null)
    {


        $data  =  $this->CourseOffering->find('all',['conditions'=>['CourseOffering.program_id'=>$program_id,'study_centre_id'=>$study_centre_id]]);
        

        
        $this->_serialized(compact('data'));
    }

}
