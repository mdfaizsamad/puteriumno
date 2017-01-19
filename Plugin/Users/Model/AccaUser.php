<?php
App::uses('UsersAppModel', 'Users.Model');
App::uses('Role', 'Model');


class User extends UsersAppModel
{
    public $ldap_source = "staff";
    public $role = false;

    public function saveLDAP($out, $password)
    {
        $username = $out[0]['samaccountname'][0];
        $this->recursive = -1;
        $data =  $this->findByUsername($username);
        if (empty($data)) {
            $oo = explode(".", $username);
            $StudyCentre = ClassRegistry::init("StudyCentre");
            $StudyCentre->recursive = -1;
            $StudyCentre->fields = ["StudyCentre.id"];
            $ss = $StudyCentre->findByAcronym(strtoupper($oo[count($oo)-1]));
            $study_centre_id = (empty($ss))?1:$ss['StudyCentre']['id'];
            $email = isset($out[0]['mail'][0])?@$out[0]['mail'][0]:"$username@unitar.my";
            $data[$this->alias] = [
              'fullname' => $out[0]['displayname'][0],
              'user_role_id' => Role::AccaStaff,
              'username'=>$username,
              'email'=>$email,
              'study_centre_id'=>$study_centre_id,
            ];
            $this->create();
        }
        $data[$this->alias]['password']=$password;
        $data[$this->alias]['last_seen']=date("Y-m-d H:i:s");
        $o = $this->save($data);
        return (!empty($o))?$o[$this->alias]:[];
    }

    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'user_role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'StudyCentre' => array(
            'className' => 'StudyCentre',
            'foreignKey' => 'study_centre_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
