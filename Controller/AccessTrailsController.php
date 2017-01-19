<?php

App::uses('AppController', 'Controller');
App::uses('RolesController', 'Controller');

class AccessTrailsController extends AppController {

    public $uses = array('AccessTrail', 'Role');
    public $components = array('Paginator', 'Flash', 'Session');

    public function index() {
        $conditions = array();
        if ($this->request->query) {
            $conditions = $this->search($this->request->query);
        }
        $this->AccessTrail->recursive = 0;
        $this->loadModel('Role');
        $this->set('roles', $this->Role->find('list'));
        $this->paginate = array(
            'conditions' => $conditions
        );
        $this->set('accessTrails', $this->Paginator->paginate());
    }

    public function search($arrays) {
        foreach ($arrays as $param_name => $value) {
            if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                if ($param_name === "table_search") {
                    $conditions['OR'] = array(
                        array('AccessTrail.user_role_id LIKE' => '%' . $value . '%'),
                        array('AccessTrail.user_id LIKE' => '%' . $value . '%'),
                        array('AccessTrail.ip LIKE' => '%' . $value . '%'),
                        array('AccessTrail.url LIKE' => '%' . $value . '%'),
                        array('AccessTrail.browser LIKE' => '%' . $value . '%'),
                        array('AccessTrail.os LIKE' => '%' . $value . '%'),
                        array('AccessTrail.referer LIKE' => '%' . $value . '%')
                    );
                } else {
                    $conditions['AccessTrail.' . $param_name] = $value;
                }
                $this->request->data['Filter'][$param_name] = $value;
            }
        }
        return $conditions;
    }

}
