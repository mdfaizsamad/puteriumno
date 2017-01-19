<?php

App::uses('ApiAppController', 'Api.Controller');
class ProgramLevelsApiController extends ApiAppController
{
    public function education_level($program_level_id=null, $education_level_id=null)
    {
        if (empty($program_level_id)||empty($education_level_id)) {
            return $this->exception('Invalid parameters');
        }
        $this->loadModel('ProgramLevelEducationLevel');
        $ProgramLevelEducationLevel = $this->ProgramLevelEducationLevel->findByEducationLevelIdAndProgramLevelId($education_level_id, $program_level_id);
        if (empty($ProgramLevelEducationLevel)) {
            $this->ProgramLevelEducationLevel->create();
            if ($this->ProgramLevelEducationLevel->save(['ProgramLevelEducationLevel'=>compact('education_level_id', 'program_level_id')])) {
                $status = 'success';
                $msg = "Program Level Education Level bind";
            } else {
                return $this->exception('Unable to bind with current parameters');
            }
        } else {
            if ($this->ProgramLevelEducationLevel->delete($ProgramLevelEducationLevel['ProgramLevelEducationLevel']['id'])) {
                $status = 'success';
                $msg = "Program Level Education Level unbind";
            } else {
                return $this->exception('Unable to unbind with current parameters');
            }
        }

        $this->_serialized(compact('status', 'msg'));
    }

    public function education_level_pro($program_level_id=null, $education_level_id=null)
    {
        if (empty($program_level_id)||empty($education_level_id)) {
            return $this->exception('Invalid parameters');
        }
        $this->loadModel('ProfesionalAcademySetup.ProgramLevelEducationLevel');
        $ProgramLevelEducationLevel = $this->ProgramLevelEducationLevel->findByProEducationLevelIdAndProProgramLevelId($education_level_id, $program_level_id);
        if (empty($ProgramLevelEducationLevel)) {
            $this->ProgramLevelEducationLevel->create();
            if ($this->ProgramLevelEducationLevel->save(['ProgramLevelEducationLevel'=>compact('pro_education_level_id', 'pro_program_level_id')])) {
                $status = 'success';
                $msg = "Program Level Education Level bind";
            } else {
                return $this->exception('Unable to bind with current parameters');
            }
        } else {
            if ($this->ProgramLevelEducationLevel->delete($ProgramLevelEducationLevel['ProgramLevelEducationLevel']['id'])) {
                $status = 'success';
                $msg = "Program Level Education Level unbind";
            } else {
                return $this->exception('Unable to unbind with current parameters');
            }
        }

        $this->_serialized(compact('status', 'msg'));
    }
}
