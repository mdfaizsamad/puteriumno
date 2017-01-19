<?php
App::uses('UsersAppModel', 'Users.Model');
App::uses('Role', 'Model');
class Applicant extends UsersAppModel
{
    public $useTable = 'app_masters';
    public $role = Role::RegisteredApplicant;

    public function afterFind($results, $primary = false)
    {
        if (isset($results[$this->alias]['first_name'])&&isset($results[$this->alias]['last_name'])) {
            $results[$this->alias]['fullname'] = $results[$this->alias]['first_name'].' '.$results[$this->alias]['last_name'];
        } else {
            foreach ($results as $key => $val) {
                if (isset($val[$this->alias]['first_name'])&&isset($val[$this->alias]['last_name'])) {
                    $results[$key][$this->alias]['fullname'] = $results[$key][$this->alias]['first_name'].' '.$results[$key][$this->alias]['last_name'];
                }
            }
        }
        return parent::afterFind($results, $primary);
    }

    public function login($username, $password)
    {
        $this->recursive = -1;
        $alias = $this->alias;
        $this->fields = array(
          "$alias.id",
          "$alias.first_name",
          "$alias.last_name",
          "$alias.email",
          "$alias.password",
          "$alias.is_active",
          "$alias.ic_ppt_no",
          "$alias.last_seen",
        );
        $conditions = array(
          "$alias.ic_ppt_no" => $username,
          "$alias.password" => $password,
          "$alias.is_active"=>true
        );
        if ($data = $this->find('first', compact('conditions'))) {
            $data[$alias]['username'] = $username;
            $data[$alias]['user_role_id']= $this->role;
        }
        // debug($data);
        // die;
        return (!empty($data))?$data[$alias]:false;
    }
}
