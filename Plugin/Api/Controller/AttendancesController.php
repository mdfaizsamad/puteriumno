<?php

App::uses('ApiAppController', 'Api.Controller');

class AttendancesController extends ApiAppController {
  public $uses = ['CourseOffering.Section','ClassSchedule.ClassScheduleDetail'];



public function check_timeline($lecturer_id=null, $study_centre_id=null, $academic_group=null){


        $this->ClassScheduleDetail->Behaviors->load('Containable');

        $data[] = '-- Please choose one --';

        $options = ['conditions' => ['ScheduleDetail.lec_master_id'=>$lecturer_id]];
        $options['contain'] = [
            'ScheduleMaster',
            'ScheduleMaster.AcademicGroup',
            'ScheduleMaster.StudyCentre',
            'ScheduleMaster.Timeline',
            'ScheduleMaster.Semester'
        ];
        $schedules = $this->ClassScheduleDetail->find('all',$options);
        
        foreach($schedules as $schedule)
        {
            if($schedule['ScheduleMaster']['academic_group_id'] == $academic_group && $schedule['ScheduleMaster']['study_centre_id'] == $study_centre_id )
                $data[$schedule['ScheduleMaster']['Timeline']['id']] = $schedule['ScheduleMaster']['Timeline']['name'];

        }
        
        $this->_serialized(compact('data'));


}

public function check_semester($lecturer_id=null, $study_centre_id=null, $academic_group=null, $timeline_id=null){


        $this->ClassScheduleDetail->Behaviors->load('Containable');

        $data[] = '-- Please choose one --';

        $options = ['conditions' => ['ScheduleDetail.lec_master_id'=>$lecturer_id]];
        $options['contain'] = [
            'ScheduleMaster',
            'ScheduleMaster.AcademicGroup',
            'ScheduleMaster.StudyCentre',
            'ScheduleMaster.Timeline',
            'ScheduleMaster.Semester'
        ];
        $schedules = $this->ClassScheduleDetail->find('all',$options);
        
        foreach($schedules as $schedule)
        {
            if($schedule['ScheduleMaster']['academic_group_id'] == $academic_group && $schedule['ScheduleMaster']['study_centre_id'] == $study_centre_id &&  $schedule['ScheduleMaster']['timeline_id'] == $timeline_id)
                $data[$schedule['ScheduleMaster']['Semester']['id']] = $schedule['ScheduleMaster']['Semester']['name'].'-'.$schedule['ScheduleMaster']['Semester']['year'];

        }
        
        $this->_serialized(compact('data'));


}


public function check_course($lecturer_id=null, $study_centre_id=null,$academic_group=null, $timeline_id=null, $semester_id=null){


        $this->ClassScheduleDetail->Behaviors->load('Containable');

        $data[] = '-- Please choose one --';

        $options = ['conditions' => ['ScheduleDetail.lec_master_id'=>$lecturer_id]];
        $options['contain'] = [
            'Course',
            'ScheduleMaster',
            'ScheduleMaster.AcademicGroup',
            'ScheduleMaster.StudyCentre',
            'ScheduleMaster.Timeline',
            'ScheduleMaster.Semester'
        ];
        $schedules = $this->ClassScheduleDetail->find('all',$options);

        foreach($schedules as $schedule)
        {
            if($schedule['ScheduleMaster']['academic_group_id'] == $academic_group && $schedule['ScheduleMaster']['study_centre_id'] == $study_centre_id &&  $schedule['ScheduleMaster']['timeline_id'] == $timeline_id &&  $schedule['ScheduleMaster']['semester_id'] == $semester_id)
                $data[$schedule['ScheduleDetail']['aca_course_id']] = '['.$schedule['Course']['course_code'].'] '.$schedule['Course']['course_name'];

        }
        
        $this->_serialized(compact('data'));


}


public function check_section($lecturer_id=null, $study_centre_id=null,$academic_group=null, $timeline_id=null, $semester_id=null,$course_id=null){


        $this->ClassScheduleDetail->Behaviors->load('Containable');

        $data[] = '-- Please choose one --';

        $options = ['conditions' => ['ScheduleDetail.lec_master_id'=>$lecturer_id,'aca_course_id'=>$course_id]];
        $options['contain'] = [
            'ScheduleMaster',
            'ScheduleMaster.AcademicGroup',
            'ScheduleMaster.StudyCentre',
            'ScheduleMaster.Timeline',
            'ScheduleMaster.Semester'
        ];
        $schedules = $this->ClassScheduleDetail->find('all',$options);

        
        foreach($schedules as $schedule)
        {
            if($schedule['ScheduleMaster']['academic_group_id'] == $academic_group && $schedule['ScheduleMaster']['study_centre_id'] == $study_centre_id &&  $schedule['ScheduleMaster']['timeline_id'] == $timeline_id &&  $schedule['ScheduleMaster']['semester_id'] == $semester_id)
                $data[$schedule['ScheduleDetail']['cla_section_id']] = $schedule['ScheduleDetail']['section_no'];
        }
        
        $this->_serialized(compact('data'));


}

















}
?>
