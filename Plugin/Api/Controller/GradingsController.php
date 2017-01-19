<?php

App::uses('ApiAppController', 'Api.Controller');

class GradingsController extends ApiAppController {
  
  public $uses = ['Assessment.GeneralSchemeMaster','Assessment.MpuSchemeMaster',
  'Assessment.MqaSchemeMaster','Assessment.EnglishSchemeMaster','Assessment.HonourSchemeMaster',
  'Assessment.CocuSchemeMaster'
  ];

  public function general_lists($program_levels=null,$academic_group_id=null){

  	$data1[] = 'GRADING SCHEME';

    $data2 = $this->GeneralSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {

      $data4[$data3['GeneralSchemeMaster']['id']] = $data3['GeneralSchemeMaster']['description'];
    }
    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

  public function mpu_lists($program_levels=null,$academic_group_id=null){

    $data1[] = 'GRADING SCHEME';

    $data2 = $this->MpuSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {
      $data4[$data3['MpuSchemeMaster']['id']] = $data3['MpuSchemeMaster']['description'];
    }
    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

  public function mqa_lists($program_levels=null,$academic_group_id=null){

    $data1[] = 'GRADING SCHEME';

    $data2 = $this->MqaSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {
      $data4[$data3['MqaSchemeMaster']['id']] = $data3['MqaSchemeMaster']['description'];
    }
    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

  public function english_lists($program_levels=null,$academic_group_id=null){

    $data1[] = 'GRADING SCHEME';

    $data2 = $this->EnglishSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {
      $data4[$data3['EnglishSchemeMaster']['id']] = $data3['EnglishSchemeMaster']['description'];
    }

    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

  public function honour_lists($program_levels=null,$academic_group_id=null){

    $data1[] = 'GRADING SCHEME';

    $data2 = $this->HonourSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {
      $data4[$data3['HonourSchemeMaster']['id']] = $data3['HonourSchemeMaster']['description'];
    }
    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

  public function cocu_lists($program_levels=null,$academic_group_id=null){

    $data1[] = 'GRADING SCHEME';

    $data2 = $this->CocuSchemeMaster->find('all',array('conditions'=>array('academic_group_id'=>$academic_group_id,'program_levels'=>$program_levels)));
    foreach($data2 as $data3)
    {
      $data4[$data3['CocuSchemeMaster']['id']] = $data3['CocuSchemeMaster']['description'];
    }
    if(!empty($data4))
      $data = $data1 + $data4;
    else
      $data = $data1;
    $this->_serialized(compact('data'));
  }

}
?>