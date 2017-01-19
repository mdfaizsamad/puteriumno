<?php

App::uses('ApiAppController', 'Api.Controller');

class SectionsController extends ApiAppController {
  public $uses = ['CourseOffering.Section','CourseOffering.CourseOffMaster'];
  public function lists($course_id=null){

    $data = [];
    $data[] = '--choose one--';

    $sections = $this->Section->find('all',['recursive'=>-1,'conditions'=>['Section.course_off_course_id'=>$course_id]]);	  	

    foreach ($sections as $key => $section) {
        $data[$section['Section']['id']] = $section['Section']['section_no'];
    }

    $this->_serialized(compact('data'));
  }


  public function section_list_by_study_centre($study_centre=null,$com_id=null,$course_id=null){
        
        $this->CourseOffMaster->Behaviors->load('Containable');
        $study_centre = $this->CourseOffMaster->find('all', [
            'fields' => [
                'aca_group_id',
                'aca_timeline_id',
                'aca_semester_id'
            ],
            'conditions' => ['id' => $com_id],
            'contain' => [
                'CourseOffDetail' => [
                    'fields' => [
                        'study_centre_id', 'is_confirm'
                    ],
                    'conditions'=>['study_centre_id'=>$study_centre],
                    'CourseOffCourse'=>[
                      'conditions'=>['course_id'=>$course_id],
                      'ClaSection'=>[
                        'fields'=>['id','section_no'],

                      ]
                    ],
                    'StudyCentre'=>[
                        'fields'=>['id','name']
                    ]
                ]
            ],
        ]);
        // debug($study_centre);die;
        foreach($study_centre as $sc)
        {
           foreach($sc['CourseOffDetail'] as $co_detail)
           {
             foreach($co_detail['CourseOffCourse'] as $co_course)
             {
                foreach($co_course['ClaSection'] as $section)
                {
                    $data[$section['id']] = $section['section_no'];
                }
             }
           }
        }
        $this->_serialized(compact('data'));
  }


  public function section_list($academy_group,$timeline,$semester,$study_centre,$course){

    $this->CourseOffMaster->Behaviors->load('Containable');
    $com = $this->CourseOffMaster->find('first',[
      'conditions'=>[
        'aca_group_id'=>$academy_group,
        'aca_timeline_id'=>$timeline,
        'aca_semester_id'=>$semester
        ],
      'contain'=>[
        'CourseOffDetail'=>[
          'conditions'=>[
            'study_centre_id'=>$study_centre
          ],
          'CourseOffCourse'=>[
            'conditions'=>[
              'course_id'=>$course
            ],
            'ClaSection'
          ]
        ]
      ]
    ]);
    $data = [];
    foreach($com['CourseOffDetail'] as $detail)
    {
       foreach($detail['CourseOffCourse'] as $course )
       {
          if(!empty($course['ClaSection']))
          {
            foreach($course['ClaSection'] as $section)
            {
              $data[$section['id']] = $section['section_no'];
            }
          }
       }
    }
     
    $this->_serialized(compact('data'));
  }

}





?>
