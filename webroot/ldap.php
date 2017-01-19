<?php
function debug($o)
{
    echo "<pre>";
    print_r($o);
    echo "</pre>";
}
class ldap
{
    public $host = 'ldap.example.com';
    public $port = 389;
    public $baseDn = 'dc=example,dc=com';
    public $user = 'cn=admin,dc=example,dc=com';
    public $pass = 'password';
    public $uid = 'samaccountname';
    public $canAnonymous = false;
    public $ds;
    private $binded = false;

    private function _connect_plain()
    {
        $this->_connect();
        if ($this->canAnonymous) {
            return true;
        }
        $this->binded = ldap_bind($this->ds, $this->user, $this->pass);
        return $this->binded;
    }
    private function _connect_sasl()
    {
        $this->_connect();
        if ($this->canAnonymous) {
            return true;
        }
        $this->binded = ldap_sasl_bind($this->ds, $this->user, $this->pass);
        return $this->binded;
    }
    private function _connect()
    {
        $this->ds = ldap_connect($this->host, $this->port);
        ldap_set_option($this->ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    }

    public function connect($sasl = false)
    {
        return ($sasl)?$this->_connect_sasl():$this->_connect_plain();
    }

    public function error()
    {
        return [
            // 'str'=>ldap_err2str($this->ds),
            'no'=>ldap_errno($this->ds),
            'err'=>ldap_error($this->ds)
        ];
    }
    public function close()
    {
        if (!ldap_error($this->ds)) {
            ldap_close($this->ds);
        }
    }
    public function __destruct()
    {
        $this->close();
    }

    public function find($attribute = 'cn', $value = '*', $baseDn = null)
    {
        $baseDn = (empty($baseDn))?$this->baseDn:$baseDn;
        $r = ldap_search($this->ds, $baseDn, $attribute . '=' . $value);
        if ($r) {
            //if the result contains entries with surnames,
            //sort by surname:
            ldap_sort($this->ds, $r, "sn");
            return ldap_get_entries($this->ds, $r);
        }
        return false;
    }

    public function auth($uid, $password)
    {
        if ($result = $this->find($this->uid, $uid)) {
            if ($result['count'] > 0) {
                if (ldap_bind($this->ds, $result[0]['dn'], $password)) {
                    return $result[0];
                }
            }
        }
        return "No User ".$this->host;
    }
}

    #$binddc = ;
// $ldap = new Ldap();
// $ldap->port = 389;
// $ldap->user = "studenttest@student.unitar.my";
// $ldap->pass = 'Unitar2014';
// $ldap->uid = 'samaccountname';
// $ldap->host = "172.20.16.25";
// $ldap->baseDn = "dc=wstunitar,dc=edu,dc=my";
//
// if ($ldap->connect()) {
//     echo "<pre>";
//     print_r($ldap->auth("kb1211bd2080", "Unitar2015"));
//     echo "</pre>";
//
//     echo "<pre>";
//     print_r($ldap->auth("cmsstudent", "Unitar2015"));
//     echo "</pre>";
// } else {
//     echo $ldap->host." is not connected";
//     echo "<pre>";
//     print_r($ldap->error());
//     echo "</pre>";
// }
// $ldap->close();
//
// echo "<hr />";
$ldap = new Ldap();
$ldap->port = 389;

// $ldap->user = "grt@unitar.my";
// $ldap->pass = 'Unitar2020';
$ldap->user = "grt";
$ldap->pass = "Unitar2020";
$ldap->uid = 'samaccountname';
$ldap->host = "172.17.17.212";
$ldap->baseDn = "dc=unitarklj1,dc=edu,dc=my";
if ($ldap->connect()) {
    echo "<pre>";
    print_r($ldap->auth("stafftest1", "Unitar2015"));
    echo "</pre>";
} else {
    echo $ldap->host." is not connected";
    echo "<pre>";
    print_r($ldap->error());
    echo "</pre>";
}
$ldap->close();
/* 172.17.17.152 */
