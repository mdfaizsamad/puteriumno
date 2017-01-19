<?php

App::uses('ApiAppController', 'Api.Controller');
App::uses('Role', 'Model');
App::uses('Status', 'Model');

class UsersController extends ApiAppController
{
    public $uses = ['Users.User'];

    public function lists()
    {
        $users = $this->User->find('list');
        $this->_serialized(compact('users'));
    }

    public function filterstudycentre($study_centre_id=null, $status_id=null)
    {
        if (!empty($study_centre_id)) {
            if ((!empty($status_id)) && ($status_id == Status::Unqualified)) {
                $conditions = array('conditions'=>array('User.study_centre_id'=>$study_centre_id,'User.user_role_id' => Role::MarketingBtec));
            } else {
                $conditions = array('conditions'=>array('User.study_centre_id'=>$study_centre_id,'OR'=>array(array('User.user_role_id' => Role::MarketingStaff),array('User.user_role_id' => Role::MarketingBtec), array('User.user_role_id' => Role::MarketingRC))));
            }
        } else {
            $conditions = array();
        }
        $conditions['fields'] = array('User.id','User.fullname');
        $data = $this->User->find('list', $conditions);
        $this->_serialized(compact('data'));
    }

    public function login()
    {
        $data = $this->User->findByUsernameAndPassword(@$this->request->query['username'], @$this->request->query['password']);
        $this->_serialized(compact('data'));
    }
}
