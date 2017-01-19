<?php
App::uses('ApiAppController', 'Api.Controller');

class CourseOfferingController extends ApiAppController {

    public $uses = ['AcademicTimeline.Timeline','AcademicTimeline.Semester',
                    'AcademicProgram.Course','CourseOffering.CourseOffMaster',
                    'CourseOffering.CourseOffCourse','CourseOffering.Section'];

    public function lists($id) {
	$data = $this->Course->find('list', ['conditions' => ['faculty_id' => $id], 'fields' => ['id', 'course_name']]);

	$this->_serialized(compact('data'));

    }

    public function timeline_list($academic_group){

    	$data_timeline = $this->Timeline->find('all',['conditions' => ['academic_group_id' => $academic_group],'recursive'=>'1']);

    	$data[] = '-- Please choose one --';
    	foreach($data_timeline as $timeline)
    	{
    		$data[$timeline['Timeline']['id']] = $timeline['Timeline']['name'];
    	}

   		$this->_serialized(compact('data'));
    }

    public function semester_list($timeline_id,$year){

        $data_timeline = $this->Timeline->find('first',['conditions'=>['Timeline.id'=>$timeline_id]]);
        
        $current_semester_id = $data_timeline['Timeline']['current_semester_id'];
       
    	$data_semester = $this->Semester->find('all',['conditions' => ['Semester.timeline_id' => $timeline_id,'Semester.year'=>$year],'recursive'=>'1']);
    	
    	$data[] = '-- Please choose one --';
    	foreach($data_semester as $semester)
    	{
    		$data[$semester['Semester']['id']] = $semester['Semester']['name'].' / '.$semester['Semester']['year'];
    	}

   		$this->_serialized(compact('data'));
    }

    public function department_list($faculty,$academic_group){

        $data_course = $this->Course->find('all',['conditions' => ['Course.faculty_id' => $faculty,'Course.academic_group_id'=>$academic_group],'recursive'=>'1']);
        
        $data[] = '-- Please choose one --';
        foreach($data_course as $data_faculty)
        {
            $data[$data_faculty['Department']['id']] = $data_faculty['Department']['name'];
        }

        $this->_serialized(compact('data'));
    }

    public function course_list($department,$faculty,$academic_group,$course_off_detail_id){

        $course_offering = $this->CourseOffCourse->find('all',['fields'=>'course_id','conditions'=>['course_off_detail_id'=>$course_off_detail_id]]);
        $course_already_selected = [];
        foreach($course_offering as $course_selected)
        {
            $course_already_selected[] = $course_selected['CourseOffCourse']['course_id'];
        }
       
        $data_course = $this->Course->find('all',['conditions' => [['NOT'=>['Course.id'=>$course_already_selected]],'Course.department_id' => $department,'Course.faculty_id' => $faculty,'Course.academic_group_id'=>$academic_group],'recursive'=>'1']);
        
        // $data[] = '-- Please choose one --';
        foreach($data_course as $key => $data_department)
        {
            $data[$key] = $data_department;
        }

        $this->_serialized(compact('data'));
    }

    public function delete_section($section_id){

        $this->Section->id = $section_id;
        $this->Section->delete();

    }

}
