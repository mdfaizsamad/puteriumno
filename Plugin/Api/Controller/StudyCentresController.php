<?php

App::uses('ApiAppController', 'Api.Controller');

class StudyCentresController extends ApiAppController {
  public $uses = ['StudyCentre','StudyCentreProgram'];
  public function lists($academygrp_id=null){

  	// $data1[] = 'All Study Centre';
    $data = $this->StudyCentre->find('list',array('conditions'=>array('StudyCentre.academic_group_id'=>$academygrp_id)));
    // $data = $data1 + $data2;
    
    $this->_serialized(compact('data'));
  }

  public function list_by_programs($program_id=null){

  	// $data1[] = 'All Study Centre';
    $list_study_centre = $this->StudyCentreProgram->find('all',array('conditions'=>array('StudyCentreProgram.program_id'=>$program_id)));
    // $data = $data1 + $data2;
    foreach($list_study_centre as $sc){

    	$data[$sc['StudyCentre']['id']] = $sc['StudyCentre']['name'];
    }

    $this->_serialized(compact('data'));
  }

  public function list_by_program_and_academic_group($program_id=null,$academic_group=null){

    $this->StudyCentreProgram->Behaviors->load('Containable');

    $list_study_centre = $this->StudyCentreProgram->find('all',[
      'conditions'=>[
        'StudyCentreProgram.program_id'=>$program_id
      ],
      'contain'=>[
        'StudyCentre'=>[
          'conditions'=>[
            'academic_group_id'=>$academic_group
          ]
        ]
      ]

    ]);
 
    foreach($list_study_centre as $sc){

      $data[$sc['StudyCentre']['id']] = $sc['StudyCentre']['name'];
    }

    $this->_serialized(compact('data'));
  }

}
?>