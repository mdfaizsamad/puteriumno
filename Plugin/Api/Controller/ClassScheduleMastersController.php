<?php

App::uses('ApiAppController', 'Api.Controller');

class ClassScheduleMastersController extends ApiAppController
{
    public $uses = ['ClassSchedule.ClassScheduleMaster'];

    public $components = array('Paginator', 'Flash', 'Session');

    public function available(){
        $aca_group = $this->request->query['aca'];
        $study_cn = $this->request->query['rc'];
        $t_line =  $this->request->query['t_line'];
        $semester = $this->request->query['sem'];

        $class_schedule = $this->ClassScheduleMaster->find('all',['recursive'=>-1]);
        $message = [];

        foreach ($class_schedule as $key => $schedule) {
            if($schedule['ScheduleMaster']['academic_group_id']==$aca_group 
                && $schedule['ScheduleMaster']['study_centre_id']==$study_cn 
                && $schedule['ScheduleMaster']['timeline_id']==$t_line 
                && $schedule['ScheduleMaster']['semester_id']==$semester){

                    $message = ['msg'=>0];                    
                    $this->_serialized(compact('message'));
            }
        }

        if(empty($message)){          
            $message = ['msg'=>1];
            $this->_serialized(compact('message')); 
        }
        // debug($class_schedule); 
        // die;
    }

    // public function edit($id){

    //     if($this->request->is('post')){
    //         $this->add($id);
    //     }
    // }
    public function index() {
        $this->loadModel('ClassSchedule.ClassScheduleMaster');
        $this->ClassScheduleMaster->recursive = 0;
        $this->set('scheduleMasters', $this->Paginator->paginate());

        $study_centres = $this->ClassScheduleMaster->StudyCentre->find('list',['recursive'=>-1]);
        $academic_groups = $this->ClassScheduleMaster->AcademicGroup->find('list',['recursive'=>-1]);
        $timeline = $this->ClassScheduleMaster->Timeline->find('list',['recursive'=>-1]);
        
        $this->set(compact('study_centres','academic_groups','timeline')); 
        // debug($academic_groups); die;
    }

    public function add(){
        $code = '200';
        $status = 1;
        $message ="Unable to save";
        if ($this->request->is('post')) {
         // debug($this->request->data); die;
         $data = $this->request->data;
         if(isset($data['id'])){
            $sm['ScheduleMaster']['id'] = $data['id'];
         }
         $sm['ScheduleMaster']['academic_group_id'] = $data['aca'];
         $sm['ScheduleMaster']['study_centre_id'] = $data['rc'];
         $sm['ScheduleMaster']['timeline_id'] = $data['t_line'];
         $sm['ScheduleMaster']['semester_id'] = $data['sem'];

            $this->loadModel('ClassSchedule.ClassScheduleMaster');
            $this->ClassScheduleMaster->create();

            if ($this->ClassScheduleMaster->save($sm)) {
                $this->Flash->success(__('New schedule is successfully created.'));
                $status = 0;
                 $message = 'New schedule is successfully created.';
            } else {
                $message = 'The schedule master could not be saved. Please, try again.';
            }
        }
            $this->_serialized(compact('message','code','status')); 
    }


    public function clash(){

        $master = $this->request->query['mtr'];
        $course = $this->request->query['cos'];
        $section =  $this->request->query['sec'];
        $lecturer = $this->request->query['lec'];
        $class =  $this->request->query['cla'];
        $days = $this->request->query['day'];
        $start =  $this->request->query['str'];
        $end = $this->request->query['end'];

        $this->loadModel('ClassSchedule.ClassScheduleDetail');

        // =====================================start checking========================================================
            $message=[];
            $check_class = [];
            $clashed = [];
            $check_class = $this->ClassScheduleDetail->find('all',[
                                'conditions'=>[
                                    'ScheduleDetail.cla_schedule_master_id'=>$master,
                                    'ScheduleDetail.day'=>$days,
                                    'ScheduleDetail.classroom_id'=>$class
                                        ],
                                'recursive'=>-1
                                ]);

            $mer_s = explode(" ", $start);
            $mer_e = explode(" ", $end);

            if($mer_s[1] == 'AM'){
                $start_time = date('H:i:m',strtotime('+1 minutes', strtotime($start)));
            }else{
                $start_time = date('H:i:m',strtotime('+12 hours +1 minutes', strtotime($start)));
            }

            if($mer_e[1] == 'AM'){
                $end_time = date('H:i:m',strtotime('-1 minutes', strtotime($end)));
            }else{
                $end_time = date('H:i:m',strtotime('+12 hours -1 minutes', strtotime($end)));
            }

            if(isset($check_class) && !empty($check_class)){
                foreach ($check_class as $key => $claz) {
                    
                    if(($start_time >= $claz['ScheduleDetail']['start'] && $start_time <= $claz['ScheduleDetail']['end'])
                        || ($end_time >= $claz['ScheduleDetail']['start'] && $end_time <= $claz['ScheduleDetail']['end'])
                        || ($start_time <= $claz['ScheduleDetail']['start'] && $end_time >= $claz['ScheduleDetail']['start'])){

                        $message = ['msg'=>1];                    
                        $this->_serialized(compact('message'));

                    }
                }

            }else{

                $message = ['msg'=>0];                    
                $this->_serialized(compact('message'));
            }


            if(empty($message)){          
                $message = ['msg'=>0];
                $this->_serialized(compact('message')); 
        }

        // ======================================end checking=========================================================

    }

}
