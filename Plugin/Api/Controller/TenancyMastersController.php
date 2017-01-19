<?php
App::uses('ApiAppController', 'Api.Controller');

class TenancyMastersController extends ApiAppController {

    public $uses = ['Accommodation.TenancyMaster'];

    public function contractNumber(){

        $contract_number = 'ACCO'.$this->request->query['tenancy_id'];
        $this->_serialized(compact('contract_number'));
    }

}
