<?php
App::uses('Component', 'Controller');

class AccessComponent extends Component
{
    public $failRedirect = '/';
    public $allow = array(
        "/users/login",
        "/users/logout"
    );
    public $components = array('Auth', 'Session', 'Flash');
    public $params = array(
        'plugin' => null,
        'controller' => null,
        'action' => 'index',
        'named' => array(),
        'pass' => array(),
        'query' => array(),
    );

    protected $model = null;
    protected $Controller = null;

    public function initialize(controller $controller)
    {
        $this->Auth->loginAction = array(
          'plugin' => false,
          'controller' => 'users',
          'action' => 'login'
      );
        $this->Auth->logoutRedirect = array(
          'plugin' => false,
          'controller' => 'users',
          'action' => 'login'
      );
        $this->Controller = $controller;
        $this->Route = ClassRegistry::init('AccessRoute');
        $this->params = array_merge($this->params, $controller->request->params);
        $this->params['query'] = $controller->request->query;
        $routed = Routed::init();
        $routed->controller = $this->params['controller'];
        $routed->plugin = $this->params['plugin'];
        if ($controller->request->url == 'webroot/test.php'
        || $controller->request->url == false) {
            return;
        } elseif (!$this->Auth->loggedIn()&&$this->Route->allowPublic($this->params)) {
            return  $this->Auth->allow($this->params['action']);
        }
    }

    public function beforeFilter(controller $controller)
    {
        if ($roles = Role::forUser()) {
            // debug($this->params);
            //logged in check with model for acc
            foreach ($roles as $role_id) {
                if ($p = $this->Route->checkRoleByParams($role_id, $this->params)) {
                    $this->_setRouted();
                    break;
                  //not allowed
                } else {
                    $this->hasRedirect = true;
                    $this->_failed($role_id);
                }
            }
        } else {
            $this->_allowed();
        }
    }

    protected function _allowed()
    {
        $allowedActions = $this->Auth->allowedActions;
        if (!in_array('*', $allowedActions) && !in_array($this->Controller->request->action, $allowedActions)) {
            if ($auth = CakeSession::read('Message.auth.message')) {
                $this->Flash->error($auth);
            }
        }
    }

    protected function _failed($role_id = 0)
    {
        $url = null;
        if (intval($role_id) > 0) {
            $RoleModel = ClassRegistry::init('Role');
            $RoleModel->id = $role_id;
            $url = $RoleModel->field("home");
        }
        if (empty($url)) {
            $url = $this->failRedirect;
        }
        $this->Flash->error("Non Authorize Personal.");
        return $this->Controller->redirect($url);
    }

    protected $hasRedirect = false;

    public function isPost()
    {
        if (!$this->hasRedirect) {
            return $this->Controller->request->is('post');
        }

        $role_id = $this->Auth->user('user_role_id');
        $url = null;
        if ($role_id > 0) {
            $RoleModel = ClassRegistry::init('Role');
            $RoleModel->id = $role_id;
            $url = $RoleModel->field("home");
        } else {
            $url = $this->failRedirect;
        }
        $this->Flash->error("Non Authorize Personal.");
        return $this->Controller->redirect($url);
    }

    protected $Route = null;

    protected function _setRouted()
    {
        if ($data = $this->Route->getInfo($this->params)) {
            $this->Controller->set('title_for_layout', h($data[$this->Route->alias]['name']));
        }
    }
}
