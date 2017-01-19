<?php
App::uses('ApiAppController', 'Api.Controller');

class CourseOffMastersController extends ApiAppController {

    public $uses = ['AcademicTimeline.Timeline','AcademicTimeline.Semester',
                    'AcademicProgram.Course','CourseOffering.CourseOffMaster',
                    'CourseOffering.CourseOffCourse','CourseOffering.Section'];

    public function rcs($ac=null,$tm=null,$sm=null) {

        $com = $cods = $coc = $courses = [];

        $this->CourseOffMaster->unbindModel([
                'belongsTo'=>[
                    'Timeline','Semester','AcademicGroup'
                    ],
                'hasMany'=>[
                    'CourseRegMaster'
                    ]
                ]);

        $com = $this->CourseOffMaster->find('first',[
                                        // 'recursive'=>-1,
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ac,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ]
                                        ]);

        $study_centres = [];
        foreach ($com['CourseOffDetail'] as $key => $cod) {
            $study_centres[] = $cod['study_centre_id'];
        }

        $this->loadModel('StudyCentre');
        $data = $this->StudyCentre->find('list',['conditions'=>['StudyCentre.id'=>$study_centres]]);
        
        $this->_serialized(compact('data'));
    }

    public function course($ac=null,$tm=null,$sm=null) {

        $com = $cods = $coc = $courses = [];

        $this->CourseOffMaster->unbindModel([
                'belongsTo'=>[
                    'Timeline','Semester','AcademicGroup'
                    ],
                'hasMany'=>[
                    'CourseRegMaster'
                    ]
                ]);

        $com = $this->CourseOffMaster->find('first',[
                                        // 'recursive'=>-1,
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ac,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ]
                                        ]);

        // foreach ($com['CourseOffDetail'] as $key => $cod) {
        //     $study_centres[] = $cod['study_centre_id'];
        // }
        $cods = Hash::extract($com['CourseOffDetail'], '{n}.id');

        $this->loadModel('CourseOffering.CourseOffCourse');
        $coc = $this->CourseOffCourse->find('all',[
                                        'recursive'=>-1,
                                        'group'=>['course_id'],
                                        'conditions'=>[
                                            'CourseOffCourse.course_off_detail_id'=>$cods
                                            ]
                                        ]);

        $courses = Hash::extract($coc, '{n}.CourseOffCourse.course_id');

        $this->loadModel('Assessment.Course');
        $coz_all = $this->Course->find('all',[
                                'recursive'=>-1,
                                'order'=>['id'],
                                'fields'=>['id','course_code','course_name'],
                                'conditions'=>['Course.id'=>$courses]
                            ]);

        $data=[];
        if(isset($coz_all) && !empty($coz_all)){
            foreach ($coz_all as $key => $coz) {
               $data[$coz['Course']['id']] = $coz['Course']['course_code'].'-'.$coz['Course']['course_name'];
            }
        }

        $this->_serialized(compact('data'));
    }

    public function course_off($ag=null,$tm=null,$sm=null,$rc=null){

        $com = $cods = $coc = $courses = [];

        $this->CourseOffMaster->Behaviors->load('Containable');
        if($rc == ''){

            $com = $this->CourseOffMaster->find('first',[
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ag,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ],
                                        'contain'=>[
                                            'CourseOffDetail'
                                            ]
                                        ]);

        }else{

            $com = $this->CourseOffMaster->find('first',[
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ag,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ],
                                        'contain'=>[
                                            'CourseOffDetail'=>[
                                                'conditions'=>[
                                                    'CourseOffDetail.study_centre_id'=>$rc
                                                    ]
                                                ]
                                            ]
                                        ]);
        }

        $cods = Hash::extract($com['CourseOffDetail'], '{n}.id');
        
        $this->loadModel('CourseOffering.CourseOffCourse');
        $coc = $this->CourseOffCourse->find('all',[
                                        'recursive'=>-1,
                                        'group'=>['course_id'],
                                        'conditions'=>[
                                            'CourseOffCourse.course_off_detail_id'=>$cods
                                            ]
                                        ]);

        $courses = Hash::extract($coc, '{n}.CourseOffCourse.course_id');

        $this->loadModel('Assessment.Course');
        $coz_all = $this->Course->find('all',[
                                'recursive'=>-1,
                                'order'=>['id'],
                                'fields'=>['id','course_code','course_name'],
                                'conditions'=>['Course.id'=>$courses]
                            ]);

        $data=[];
        if(isset($coz_all) && !empty($coz_all)){
            foreach ($coz_all as $key => $coz) {
               $data[$coz['Course']['id']] = $coz['Course']['course_code'].'-'.$coz['Course']['course_name'];
            }
        }

        $this->_serialized(compact('data'));
    }

    public function sections($ag=null,$tm=null,$sm=null,$rc=null,$cs=null){

        $com = $cods = $coc = $courses = $data = [];
        
        $this->CourseOffMaster->Behaviors->load('Containable');
        if($rc == 0){
            $com = $this->CourseOffMaster->find('first',[
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ag,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ],
                                        'contain'=>[
                                            'CourseOffDetail'=>[
                                                'CourseOffCourse'=>[
                                                    'conditions'=>[
                                                        'CourseOffCourse.course_id'=>$cs
                                                        ],
                                                    'ClaSection'
                                                    ]
                                                ]
                                            ]
                                        ]);
        }else{
            $com = $this->CourseOffMaster->find('first',[
                                        'conditions'=>[
                                            'CourseOffMaster.aca_group_id'=>$ag,
                                            'CourseOffMaster.aca_timeline_id'=>$tm,
                                            'CourseOffMaster.aca_semester_id'=>$sm
                                            ],
                                        'contain'=>[
                                            'CourseOffDetail'=>[
                                                'conditions'=>[
                                                    'CourseOffDetail.study_centre_id'=>$rc
                                                    ],
                                                'CourseOffCourse'=>[
                                                    'conditions'=>[
                                                        'CourseOffCourse.course_id'=>$cs
                                                        ],
                                                    'ClaSection'
                                                    ]
                                                ]
                                            ]
                                        ]);
        }

        $section_ids = Hash::extract($com,'CourseOffDetail.{n}.CourseOffCourse.{n}.ClaSection.{n}.id');

        $this->loadModel('CourseOffering.Section');
        $data = $this->Section->find('list',['fields'=>'section_no','conditions'=>['Section.id'=>$section_ids]]);
       
        $this->_serialized(compact('data'));
    }


}
