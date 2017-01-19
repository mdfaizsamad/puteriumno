<?php
App::uses('UsersAppModel', 'Users.Model');
App::uses('Role', 'Model');


class Student extends UsersAppModel
{
    public $useTable= 'stu_masters';
    public $role = Role::Student;
    public $ldap_source = "staff";
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
        if (isset($results[$this->alias]['ic_ppt_no'])) {
            $results[$this->alias]['username'] = $results[$this->alias]['ic_ppt_no'];
        } else {
            foreach ($results as $key => $val) {
                if (isset($results[$key][$this->alias]['ic_ppt_no'])) {
                    $results[$key][$this->alias]['username'] = $results[$key][$this->alias]['ic_ppt_no'];
                }
            }
        }
        return parent::afterFind($results, $primary);
    }

    public function login($username, $password)
    {
        $this->recursive = -1;
        $data = $this->find('first', array(
          'conditions'=>array(
            $this->alias.'.matric_no'=>$username,
            $this->alias.'.password'=>$password,
            $this->alias.'.is_active'=>true
          )
        ));
        if ($this->ldap_source === false) {
            return (!empty($data))?$data[$this->alias]:[];
        }

        return (empty($data)) ? $this->checkLDAP($username, $password):$data[$this->alias];
    }
}
