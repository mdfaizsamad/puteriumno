<?php

App::uses('ApiAppController', 'Api.Controller');

class ProgramSelectedController extends ApiAppController
{
    public $uses = ['StudyCentre','StudyCentreProgram'];

    public function getStudyCentre($id = null, $academic_group_id = null)
    {
        $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array(
                                                                  'program_id'=>$id,
                                                                  'StudyCentre.academic_group_id'=>$academic_group_id,
                                                                  "NOT" => array(
                                                                      "AND" => array(
                                                                              "StudyCentreProgram.is_fulltime" => 0,
                                                                              "StudyCentreProgram.is_parttime" => 0
                                                                              )

                                                                  )

                                                                  ),

    ));

        $data[] = '--Choose Study Centre--';
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['study_centre_id']] = $list['StudyCentre']['name'];
        }

        $this->_serialized(compact('data'));
    }


    public function getStudyMode($study_centre_id = null, $program_id=null)
    {
        $lists = $this->StudyCentre->StudyCentreProgram->find('first',
        array(
            'conditions'=>array(
                                    'study_centre_id'=>$study_centre_id,
                                    'program_id' => $program_id
                                )
            ));
        $data = array(''=>'--Choose Study Mode--');
        if ($lists['StudyCentreProgram']['is_fulltime']==1) {
            $data["Full Time"] = "Full Time";
        }
        if ($lists['StudyCentreProgram']['is_parttime']==1) {
            $data["Part Time"] = "Part Time";
        }

        $this->_serialized(compact('data'));
    }


    public function getStudyCentreByMode($mode = null, $group=null)
    {
        if ($mode == 'Full Time') {
            $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('is_fulltime'=>1,
                                                                  'StudyCentre.academic_group_id'=>$group)));
        } elseif ($mode == 'Part Time') {
            $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('is_parttime'=>1,
                                                                  'StudyCentre.academic_group_id'=>$group)));
        }

        $data[] = '--Choose Study Centre--';
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['study_centre_id']] = $list['StudyCentre']['name'];
        }

        $this->_serialized(compact('data'));
    }

    public function getProgramByStudyCentre($centre_id = null, $prog_level=null, $group=null)
    {
        $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('study_centre_id'=>$centre_id, 'Program.program_level_id'=>$prog_level, 'Program.academic_group_id'=>$group), 'fields'=>'Program.name,StudyCentreProgram.program_id'));

        $data[] = '--Choose Preferred Program--';
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['program_id']] = $list['Program']['name'];
        }

        $this->_serialized(compact('data'));
    }

    public function getProgramByProgramLevelId($prog_level=null, $centre_id = null, $group=2)
    {
        $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('study_centre_id'=>$centre_id, 'Program.program_level_id'=>$prog_level, 'Program.academic_group_id'=>$group), 'fields'=>'Program.name,StudyCentreProgram.program_id'));

        $data[] = '--Choose Preferred Program--';
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['program_id']] = $list['Program']['name'];
        }

        $this->_serialized(compact('data'));
    }


    public function search_programs($program_name=null)
    {
        $program=[];
        if (isset($program_name) && !empty($program_name)) {
            $program[]="LOWER(Program.name) LIKE '%".strtolower($program_name)."%'";
        }
        $this->loadModel('Program');
        $data = $this->Program->find('list', ['conditions'=>$program]);
        $this->_serialized(compact('data'));
    }
    public function getStudyCentreByModeKforce($mode = null,$group=null)
    {
        if ($mode == 'Full Time') {
            $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('StudyCentreProgram.is_fulltime'=>1, 'StudyCentre.academic_group_id'=>$group)));
        } elseif ($mode == 'Part Time') {
            $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('StudyCentreProgram.is_parttime'=>1, 'StudyCentre.academic_group_id'=>$group)));
        }

        $data[] = '--Choose Study Centre--';
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['study_centre_id']] = $list['StudyCentre']['name'];
        }

        $this->_serialized(compact('data'));
    }

    public function get_studycentre_mode_contact($mode = null,$academic_group_id = null)
    {
        if ($mode == 'Full Time') {
        
        $lists = $this->StudyCentre->StudyCentreProgram->find('all',
            ['conditions'=>[
                'is_fulltime'=>1,
                'StudyCentre.academic_group_id' => $academic_group_id]
            ]);

        } elseif ($mode == 'Part Time') {
            $lists = $this->StudyCentre->StudyCentreProgram->find('all', 
            ['conditions'=>[
                            'is_parttime'=>1,
                            'StudyCentre.academic_group_id' => $academic_group_id]
            ]);
        }

        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['study_centre_id']] = $list['StudyCentre']['name'];
        }

        $this->_serialized(compact('data'));
    }

    public function get_program_studycentre_contact($centre_id = null, $prog_level=null,$academic_group_id=null)
    {
        $lists = $this->StudyCentre->StudyCentreProgram->find('all', array('conditions'=>array('study_centre_id'=>$centre_id, 'Program.program_level_id'=>$prog_level,'Program.academic_group_id'=>$academic_group_id), 'fields'=>'Program.name,StudyCentreProgram.program_id'));
    
        foreach ($lists as $list) {
            $data[$list['StudyCentreProgram']['program_id']] = $list['Program']['name'];
        }
        $this->_serialized(compact('data'));
    }
}
