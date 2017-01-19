<?php

App::uses('Role', 'Model');
App::uses('AppModel', 'Model');

/**
 * AccessRoute Model
 *
 * @property AccessRoute $ParentAccessRoute
 * @property AccessRoute $ChildAccessRoute
 */
class AccessRoute extends AppModel
{
    /**
     * Validation rules
     *
     * @var array
     */
    // public $validate = array(
    // 	'plugin' => array(
    // 		'notBlank' => array(
    // 			'rule' => array('notBlank'),
    // 			//'message' => 'Your custom message here',
    // 			//'allowEmpty' => false,
    // 			//'required' => false,
    // 			//'last' => false, // Stop validation after this rule
    // 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
    // 		),
    // 	),
    // 	'controller' => array(
    // 		'notBlank' => array(
    // 			'rule' => array('notBlank'),
    // 			//'message' => 'Your custom message here',
    // 			//'allowEmpty' => false,
    // 			//'required' => false,
    // 			//'last' => false, // Stop validation after this rule
    // 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
    // 		),
    // 	),
    // 	'action' => array(
    // 		'notBlank' => array(
    // 			'rule' => array('notBlank'),
    // 			//'message' => 'Your custom message here',
    // 			//'allowEmpty' => false,
    // 			//'required' => false,
    // 			//'last' => false, // Stop validation after this rule
    // 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
    // 		),
    // 	),
    // 	'menu_level' => array(
    // 		'numeric' => array(
    // 			'rule' => array('numeric'),
    // 			//'message' => 'Your custom message here',
    // 			//'allowEmpty' => false,
    // 			//'required' => false,
    // 			//'last' => false, // Stop validation after this rule
    // 			//'on' => 'create', // Limit validation to 'create' or 'update' operations
    // 		),
    // 	),
    // );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */

    public function ard()
    {
        $ards = $this->find('all', array(
          'fields'=>array(
            'AccessRoute.id',
            'AccessRoute.controller',
            'AccessRoute.plugin',
            'AccessRoute.action'
          ),
          'recursive'=>-1
        )
      );
        return $ards;
    }
    /**
     * hasMany associations
     *
     * @var array
     */
    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]['roles']) && is_array($this->data[$this->alias]['roles'])) {
            $roles = [];
            foreach ($this->data[$this->alias]['roles'] as $i => $role) {
                $roles[]=intval($role);
            }
            $this->data[$this->alias]['roles'] = json_encode($roles);
        }
        return true;
    }
    public function allowPublic($params)
    {
        $alias = $this->alias;
        if (empty($this->_accessData)) {
            $conditions = [
                "$alias.controller" => $params['controller'],
                "$alias.action" => $params['action'],
                "$alias.plugin" => $params['plugin'],
            ];
            $recursive = -1;
            $this->_accessData = $data = $this->find('first', compact('conditions', 'recursive'));
        }
        return (empty($this->_accessData)||$this->_accessData[$alias]['public']==true);
    }
    public function afterFind($results, $primary = false)
    {
        $alias = $this->alias;
        foreach ($results as $key => $val) {
            if (isset($val[$alias]['roles'])) {
                $results[$key][$alias]['roles'] = json_decode($val[$alias]['roles'], true);
            }
            if (isset($val[$alias]['users'])) {
                $results[$key][$alias]['users'] = json_decode($val[$alias]['users'], true);
            }
        }
        return $results;
    }

    protected $_accessData = array();

    public function getInfo($params)
    {
        if (!empty($this->_accessData)) {
            return $this->_accessData;
        }
        $alias = $this->alias;
        $conditions = array(
            "$alias.controller" => $params['controller'],
            "$alias.action" => $params['action'],
            "$alias.plugin" => $params['plugin'],
        );
        // $conditions['OR'][] = $this->alias.'.roles LIKE \'['.$role_id.',%\'';
        // $conditions['OR'][] = $this->alias.'.roles LIKE \'%'.$role_id.']\'';
        // $conditions['OR'][] = $this->alias.'.roles LIKE \'%,'.$role_id.',%\'';
        // $conditions['OR'][]=array($this->alias.'.roles'=>'[]');
        $recursive = -1;
        $this->_accessData = $data = $this->find('first', compact('conditions', 'recursive'));
        return $data;
    }

    public function getAllRelatedToRoleAndUserId($role_id, $user_id)
    {
        $user_route = $this->AccessRouteUser->find('all', array(
        'conditions'=>array('AccessRouteUser.user_id'=>$user_id),
        'recursive'=>-1,
        'fields'=>array('AccessRouteUser.access_route_id', 'AccessRouteUser.user_id')
      ));
        $routes_by_user = Hash::extract($user_route, "{n}.AccessRouteUser.access_route_id");

        $conditions['OR'][] = array($this->alias.'.id'=>$routes_by_user);
        if(!is_array($role_id)){
            $conditions['OR'][] = $this->alias.'.roles LIKE \'['.$role_id.',%\'';
            $conditions['OR'][] = $this->alias.'.roles LIKE \'%'.$role_id.']\'';
            $conditions['OR'][] = $this->alias.'.roles LIKE \'%,'.$role_id.',%\'';
        } else {
            foreach($role_id as $role){
                $conditions['OR'][] = $this->alias.'.roles LIKE \'['.$role.',%\'';
                $conditions['OR'][] = $this->alias.'.roles LIKE \'%'.$role.']\'';
                $conditions['OR'][] = $this->alias.'.roles LIKE \'%,'.$role.',%\'';
            }
        }
        $conditions['OR'][]=array($this->alias.'.roles'=>'[]');
        $conditions[]=array($this->alias.'.active'=>true);

        $recursive = -1;
        $fields = array("AccessRoute.id","AccessRoute.plugin","AccessRoute.controller","AccessRoute.action");
        if ($return = $this->find('all', compact('conditions', 'recursive', 'fields'))) {
            $return = Hash::extract($return, "{n}.AccessRoute");
        }
        return $return;
    }
    public function checkRoleByParams($role_id, $params)
    {
        if ($role_id == Role::SuperAdmin) {
            return true;
        }
        $alias = $this->alias;
        $conditions = array(
            "$alias.controller" => $params['controller'],
            "$alias.action" => $params['action'],
            "$alias.plugin" => $params['plugin'],
        );
        $recursive = -1;
        $this->_accessData = $data = $this->find('first', compact('conditions', 'recursive'));
        // die;
        if (!empty($data[$alias]['roles']) && !in_array($role_id, Role::forUser())) {
            return false;
        }

        return $data;
    }
}
