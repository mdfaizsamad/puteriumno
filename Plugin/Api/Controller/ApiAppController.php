<?php

App::uses('AppController', 'Controller');

class ApiAppController extends Controller
{
    public $components = ['RequestHandler','Auth'];
    public function beforeFilter()
    {
        // $this->Auth->allow();
    }
    protected function _serialized($data)
    {
        $this->viewClass = "Json";
        $keys = [];
        foreach ($data as $key => $object) {
            $this->set($key, $object);
            $keys[] = $key;
            if ($key == "code") {
                $this->response->statusCode($object);
            }
        }
        $this->set('_serialize', $keys);
    }

    protected function exception($msg, $code = 403)
    {
        $this->set('code', $code);
        $this->set('message', $msg);
        $this->response->statusCode($code);
        return false;
    }
    protected function requireToken()
    {
        if (!isset($this->User)) {
            $this->loadModel("User");
        }
        $isset = isset($this->request->query['token']);
        $empty = empty(CakeSession::read('Auth.User.token'));
        if ($empty&&$isset) {
            $token = $this->request->query['token'];
            if ($User = $this->User->findByToken($token)) {
                CakeSession::write('Auth.User', $User['User']);
            } else {
                return $this->exception("Invalid token");
            }
        } elseif ($empty&&!$isset) {
            return $this->exception("Invalid token");
        }
        return true;
    }
}
