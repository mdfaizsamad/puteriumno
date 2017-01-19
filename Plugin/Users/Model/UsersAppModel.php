<?php
App::uses('AppModel', 'Model');
App::uses('AccessLdap', 'Routed');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
include ROOT.DS.'vendor'.DS."strebl".DS."adldap".DS."lib".DS."adLDAP".DS."adLDAP.php";
// namespace adLDAP\adLDAP;

class UsersAppModel extends AppModel
{
    public $ldap_source = false;
    public $role = false;
    public function beforeFind($query=[])
    {
        $key = $this->alias.'.password';
        if (isset($query['conditions'][$key])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $query['conditions'][$key]= $passwordHasher->hash($query['conditions'][$key]);
        }
        return $query;
    }
    public function beforeSave($options = array())
    {
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function checkLDAP($username, $password)
    {
        App::Import('ConnectionManager');
        try {
            $ds = ConnectionManager::getDataSource($this->ldap_source);
            if (empty($ds)) {
                return false;
            }
            $dsc = $ds->config;

            $adldap = new adLDAP\adLDAP([
              'account_suffix'=>'',
              'ad_port'=>$dsc['port'],
              'admin_username'=>$dsc['login'],
              'admin_password'=>$dsc['password'],
              'base_dn'=>$dsc['basedn'],
              'domain_controllers'=>[$dsc['host']]
            ]);

            $ldapuser = $adldap->user();
            $result = $ldapuser->info($username, array("samaccountname", "mail", "displayname"));

            if ($result['count'] > 0 &&  $ldapuser->authenticate($result[0]['dn'], $password)) {
                $adldap->close();
                return $this->saveLDAP($result, $password);
            }
        } catch (Exception $e) {
            $this->ldapError = $e;
        }
        return [];
    }

    public function afterFind($results, $primary = false)
    {
        if ($this->role == false) {
            return $results;
        }

        if (isset($results[$this->alias])) {
            $results[$this->alias]['user_role_id'] = $this->role;
        } else {
            foreach ($results as $key => $val) {
                if (!isset($val[$this->alias]['user_role_id'])) {
                    $results[$key][$this->alias]['user_role_id'] =$this->role;
                }
            }
        }
        return $results;
    }
    public function saveLDAP($out, $password)
    {
        return $out;
    }
    public function login($username, $password)
    {
        $this->recursive = -1;
        $data = $this->find('first', array(
          'conditions'=>array(
            $this->alias.'.username'=>$username,
            $this->alias.'.password'=>$password,
          )
        ));
        $output = [];

        if ($this->ldap_source === false) {
            $output =  (!empty($data))?$data[$this->alias]:[];
        } else {
            $output =  (empty($data)) ? $this->checkLDAP($username, $password):$data[$this->alias];
        }
        if (!empty($output)&&isset($output[$this->alias])) {
            $output[$this->alias]['last_seen'] = date();
        }
        return $output;
    }
}
