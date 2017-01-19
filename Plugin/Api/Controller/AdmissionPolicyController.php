<?php

App::uses('ApiAppController', 'Api.Controller');

class AdmissionPolicyController extends ApiAppController
{
    public $uses = ['AdmissionPolicy','AdmissionCriteria'];

    public function criteriaoptions($id = null)
    {
        $conditions = (!empty($id)) ? array(
            "AdmissionCriteria.education_level_id"=>$id
        ):[];
        $criteriaList = $this->AdmissionCriteria->find('all', array(
        'conditions'=>$conditions,
        'recursive'=> 2
    ));
        $data = $this->AdmissionPolicy->criteriaoptions($criteriaList);
        $this->_serialized(compact('data'));
    }
}
