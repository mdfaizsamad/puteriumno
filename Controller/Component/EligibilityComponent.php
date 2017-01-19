<?php
App::uses('Component', 'Controller');

class EligibilityComponent extends Component
{
    public function check($master_id)
    {
      $this->Master->Behaviors->load('Containable');
      $options['conditions'] = array('Master.id'=>$master_id,'Master.is_malaysian'=>true);
      $options['contains'] = array(
        'Education',
        'Education.EducationDetail',
        // 'Education.EducationLevel',
        'Detail'
      );
      $master = $this->Master->find('first',$options);
      $Educations = $master['Education'];
      foreach($master['Detail'] as $Detail){
        $program_level_id  = $Detail['program_level_id'];
        $Programs = $this->Program->findByProgramLevelId($program_level_id);
        foreach($Programs['AdmissionPolicy'] as $AdmissionPolicy){
          $Policies = $this->PolicyArray->findAllByAdmissionPolicyId($AdmissionPolicy['id']);
          foreach($Policies as $Policy){
            foreach($Policy['AdmissionCriteria'] as $AdmissionCriteria){
              $EducationLevels = $this->EducationLevel->findAllByAdmissionCriteriaId($AdmissionCriteria['id']);

            }
          }
        }
      }
      // foreach($this->)
        foreach ($this->findProgram as $pgm) {
            $admission_policy = $this->AdmissionPolicy->findAllByProgramId($pgm['id']);

            foreach ($admission_policy as $policy) {
                $criterias = $policy['CriteriaArray'];
                $policy_met = true;

                foreach ($criterias as $id) {
                    $criteria = $this->AdmissionCriteria->findById($id);

                    if (in_array($criteria['education_level_id'], $this->findEducationLevel())) {
                        $el = $this->EducationLevel_>findById($criteria['education_level_id']);
                        $education = $this->Education->findByApplicatIdAndProgramLevelId($this->Applicant->id, $el['id']);
                        // $edu_details = $this->Education->EducationDetail->findAllByEducationId($edu['id']);

  /**------------------------------------------- SPM/OLevel-------------------------------------------------------- **/

                        switch ($el['name']) {

                            case "SPM/SPMV":
                            case "UEC":
                            case "O-­‐level":

                                $min_cdt_number = 0;
                                $credits_in_array = [];
                                $passes_in_array = [];
                                $excluding_array = $criteria['ExcludingArrays'];
                                foreach ($edu_details as $ed) {
                                    $school_subject = $this->SchoolSubject->findById($ed['school_subject_id']);
                                    /** Check Credits Subject **/
                                        if (in_array($ed['result'], $school_subject['CreditArrays'])//Check if Subject is credits
                                            && in_array($ed['school_subject_id'], $criteria['CreditsArray']) //check if subjects is include in credits list
                                            &&  !in_array($ed['school_subject_id'], $excluding_array)//check if subjects is exclude from credits list
                                            ) {
                                            $min_cdt_number = 0;
                                            $credits_in_array = $school_subject['id'];
                                        }
                                        /** Check Pass Subject **/
                                        if (in_array($ed['result'], $school_subject['PassesArray'])//check if subject is credits
                                            && in_array($ed['result'], $school_subject['CreditsArray']) //check if subjects is include in credits list
                                            && in_array($ed['school_subject_id'], $excluding_array)//check if subjects is exclude from credits list
                                            ) {
                                            $min_cdt_number = 0;
                                            $passes_in_array = $school_subject['id'];
                                        }

                                    if (!empty($criteria['CreditArrays'])) {
                                        if ($min_cdt_number < $criteria['min_credit']) {
                                            $policy_met=false;
                                        }
                                    }
                                    if ($criteria['PassesArray'] != null) {
                                        foreach ($criteria['PassesArray'] as $ca) {
                                            if (in_array($ca, $passes_in_array)) {
                                                $policy_met=false;
                                            }
                                        }
                                    }
                                    if ($policy_met === false) {
                                        break;
                                    }
                                }
                                break;
  /**------------------------------------------- STPM / A-Level-------------------------------------------------------- **/

                            case "STPM (Prior 2013)":
                            case "A-Level":
                                    foreach($educations as $education){
                                      $education['Detail'][]['id'];
                                      $policy_met = checkStpm2013Prior($criteria,);
                                      if(!$policy_met){
                                        break;
                                      }
                                    }
                                    break;
                            case "STPM (2013 Onwards)":
                                $policy_met = $this->checkStpm2013Onwards($criteria, $education);
                                break;

                            case "Foundation/Matriculation/Diploma":
                            case "Bachelor Degree":
                            case "Master Degree":
                                $policy_met = $this->checkHigherEducation($criteria, $education);
                                break;
                            case "MUET":
                                $policy_met = $this->checkMuet($criteria, $education);
                                break;
                        }//End of switch
                    } else {
                        $policy_met = false;
                        break;
                    }//End of if criteria
                }//End of criteria loop
                if ($policy_met == true) {
                    $this->list[] = $pgm;
                }
            }//End of foreach policy
        }//End of foreach program
        return $this->list;
    }
    protected function checkStpm2013Prior($criteria,$education){
        if (!empty($this->SchoolSubject)){
          $this->SchoolSubject = CakeRegistry::init('SchoolSubject');
        }
					$min_cdt_number = 0;
					$credits_in_array = [];
					$passes_in_array = [];
					$excluding_array = $criteria['ExcludingArrays'];
					foreach($edu_details as $ed){
						$school_subject = $this->SchoolSubject->findById($ed['school_subject_id']);
						/** Check Credits Subject **/
						if(in_array($ed['result'], $school_subject['CreditArrays'])//Check if Subject is credits
							&& in_array($ed['school_subject_id'], $criteria['CreditsArray']) //check if subjects is include in credits list
							&&  !in_array($ed['school_subject_id'], $excluding_array)//check if subjects is exclude from credits list
							){
							$min_cdt_number = 0;
							$credits_in_array = $school_subject['id'];
						}
						/** Check Pass Subject **/
						if(in_array($ed['result'], $school_subject['PassesArray'])//check if subject is credits
							&& in_array($ed['result'], $school_subject['CreditsArray']) //check if subjects is include in credits list
							&& in_array($ed['school_subject_id'], $excluding_array)//check if subjects is exclude from credits list
							){
							$min_cdt_number = 0;
							$passes_in_array = $school_subject['id'];
						}

						if(!empty($criteria['CreditArrays'])){
							if($min_cdt_number < $criteria['min_credit']){
								$policy_met=false;
							}
						}
						if($criteria['PassesArray'] != null){
							foreach($criteria['PassesArray'] as $ca){
								if(in_array($ca, $passes_in_array)){
									$policy_met=false;
								}
							}
						}
						if($policy_met === false){
							break;
						}
					}
    }
    protected function checkStpm2013Onwards($criteria, $education)
    {

        return (intval($criteria['year'])<2013 || intval($education['year']) < '2013' || empty($criteria['minimum_grades'])||$education['result'] >= $criteria['minimum_grades']);
      }
    protected function checkHigherEducation($criteria, $education)
    {
        $specialization_array = $education['Detail']['program_specialization_array'];
        if (!empty($criteria['minimum_grades']) && $education['result']< $criteria['minimum_grades'] && !empty($criteria['SpecializationArrays'])) {
          foreach ($criteria['program_specialization_array'] as $ps) {
            if(in_array($ps,$specialization_array){
              return false;
            }
          }
        }
        return true;
    }
    protected function checkMuet($education, $criteria)
    {
        return ($criteria['minimum_grades'] == null || $education['result'] >= $criteria['minimum_grades']);
    }
}
