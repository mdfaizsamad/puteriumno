<?php

App::uses('ApiAppController', 'Api.Controller');

class CourseFeesSetupController extends ApiAppController {

  public $uses = ['Program'];

  public function lists($studymode_id =null,$program_id=null,$intake_id=null){

  	// debug($this->request->query['studymode_id']);
  	// debug($this->request->query['program_id']);
    $intake_id = $this->request->query['intake_id'];
  	$studymode = $this->request->query['studymode_id'];
  	if($studymode === '0'){
      $studymode_value = 'Full Time';
  		$studymodevalue = 'Program.semester_fulltime';
  	}else if ($studymode === '1'){
      $studymode_value = 'Part Time';
  		$studymodevalue = 'Program.semester_parttime';
  	}
    $this->loadModel('Program');
    $this->Program->Behaviors->load('Containable');
    $this->Program->recursive= 0;
    $data = $this->Program->find('first',[
                              'fields'=>['id',$studymodevalue.' as duration_sem'],
                              'conditions'=>['Program.id'=>$this->request->query['program_id']],
                                    'contain'=>['ProgramFee'=>['fields'=>['price','study_mode','per_sem_amount','international_amount','per_international_amount'],
                                      'conditions'=>['ProgramFee.study_mode'=>$studymode_value,'ProgramFee.intake_id'=>$intake_id]
                                                            ]
                                              ]
                                         ]
                              );
    $this->_serialized(compact('data'));
  }
  public function listAdd2($program_id=null){
    
    $this->loadModel('Program');
    $this->Program->Behaviors->load('Containable');
    $this->Program->recursive= 0;
    $data = $this->Program->find('first',[
                              'fields'=>['id','Program.semester_fulltime as fulltime_duration_sem','Program.semester_parttime as parttime_duration_sem'],
                              'conditions'=>['Program.id'=>$this->request->query['program_id']],
                                    // 'contain'=>['ProgramFee'=>['fields'=>['price','study_mode','per_sem_amount'],
                                    //   'conditions'=>['ProgramFee.study_mode'=>$studymode,'ProgramFee.intake_id'=>$intake_id]
                                    //                         ]
                                    //           ]
                                         ]
                             ); 
    $this->_serialized(compact('data'));
    

  }
  public function listAdd($studymode_id =null,$program_id=null){
    
    $studymode = $this->request->query['studymode_id'];
      if($studymode === '0'){
        $studymodevalue = 'Program.semester_fulltime';
      }else if ($studymode === '1'){
        $studymodevalue = 'Program.semester_parttime';
      }
    $this->loadModel('Program');
    $this->Program->Behaviors->load('Containable');
    $this->Program->recursive= 0;
    $data = $this->Program->find('first',[
                              'fields'=>['id',$studymodevalue.' as duration_sem'],
                              'conditions'=>['Program.id'=>$this->request->query['program_id']],
                                    // 'contain'=>['ProgramFee'=>['fields'=>['price','study_mode','per_sem_amount'],
                                    //   'conditions'=>['ProgramFee.study_mode'=>$studymode,'ProgramFee.intake_id'=>$intake_id]
                                    //                         ]
                                    //           ]
                                         ]
                              );
    $this->_serialized(compact('data'));
    // debug($data);
    // die;

  }

  public function filter_program($program_level_id = null){     //UniecFee

      $faculty_id = $this->request->query['faculty_id'];
      $program_level_id = $this->request->query['program_level_id'];
      if (!empty($program_level_id)) {
          $conditions = array('conditions' => array('Program.faculty_id' => $faculty_id,'Program.program_level_id' => $program_level_id));
      } 
          $conditions['fields'] = array('Program.id', 'Program.name');
          $data = $this->Program->find('list', $conditions);
          $this->_serialized(compact('data'));
  }

  public function listProgram(){

      $faculty_id = $this->request->query['faculty_id'];
      $academic_group_id = $this->request->query['academic_group_id'];
      $program_level_id = $this->request->query['program_level_id'];

      $conditions = array('conditions' => array('Program.faculty_id' => $faculty_id,'Program.program_level_id' => $program_level_id,'Program.academic_group_id' => $academic_group_id));

      $conditions['fields'] = array('Program.id', 'Program.name');
      $data = $this->Program->find('list', $conditions);
      $this->_serialized(compact('data'));

  }

  public function getSemesterFeeAmount(){

    $intake_id = $this->request->query['intake_id'];
    $studymode = $this->request->query['studymode_id'];
    $academic_group_id = $this->request->query['academic_group_id'];

    if($studymode === '1'){
        $studymode_value = 'Full Time';
        $fields = 'SemesterFee.price,SemesterFee.price_international';

    }else if ($studymode === '2'){
        $studymode_value = 'Part Time';
        $fields = 'SemesterFee.price';
    }

    $conditions = array('conditions' => array('SemesterFee.academic_group_id' => $academic_group_id,'SemesterFee.study_mode' => $studymode_value,'intake_id' => $intake_id));

    $this->loadModel('SemesterFee');
    $data = $this->SemesterFee->find('first', array(
                                      'recursive' => -1,
                                      'fields' => array($fields),
                                      'conditions' => array('SemesterFee.academic_group_id' => $academic_group_id,'SemesterFee.study_mode' => $studymode_value,'intake_id' => $intake_id)
    ));

    $this->_serialized(compact('data'));

  }

  public function getSponsorList(){

    $id = $this->request->query['id'];
    $this->loadModel('Sponsorship.Sponsorship');
    $data = $this->Sponsorship->SponsorShipIndex($id);

    $this->_serialized(compact('data'));

  }
}
?>