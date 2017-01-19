<?php

App::uses('AppModel', 'Model');
App::uses('Role', 'Model');

/**
 * AccessMenu Model
 *
 * @property AccessRoute $AccessRoute
 * @property AccessMenu $ParentAccessMenu
 * @property User $Creator
 * @property User $Modifier
 * @property AccessMenu $ChildAccessMenu
 */
class AccessMenu extends AppModel
{
    // public $actsAs = array('Tree');
    public $cacheQueries = [];

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Route' => array(
            'className' => 'AccessRoute',
            'foreignKey' => 'access_route_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Parent' => array(
            'className' => 'AccessMenu',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Child' => array(
            'className' => 'AccessMenu',
            'foreignKey' => 'parent_id',
            'dependent' => false,
            'conditions' => array('Child.enabled' => true),
            'fields' => '',
            'order' => ['Child.position ASC'],
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public function afterDelete()
    {
        return $this->deleteAll(['parent_id'=>$this->id]);
    }

    public function beforeSave($options = array())
    {
        if (empty($this->data[$this->alias]['id'])) {
            $this->data[$this->alias]['position']=$this->find('count', ['conditions'=>[$this->alias.'.parent_id'=>$this->data[$this->alias]['parent_id']]]);
        }
        if (isset($this->data[$this->alias]['roles']) && is_array($this->data[$this->alias]['roles'])) {
            $roles = [];
            foreach ($this->data[$this->alias]['roles'] as $i => $role) {
                $roles[] = intval($role);
            }
            $this->data[$this->alias]['roles'] = json_encode($roles);
        }
        if (isset($this->data[$this->alias]['parent_id']) && $this->data[$this->alias]['parent_id'] == '0') {
            $this->data[$this->alias]['parent_id'] = null;
        }
        // debug(json_encode($this->data));
        // die;
        return true;
    }

    //$this->request->data['AccessMenu']['roles'][0] = value
    //$this->request->data['AccessMenu']['roles'][1] = value
    //$this->request->data['AccessMenu']['roles'][2] = value
    //AccessMenu.roles.0 = value
    //AccessMenu.roles.1 = value
    //AccessMenu.roles.2 = value

    public function afterFind($results, $primary = false)
    {
        $alias = $this->alias;
        foreach ($results as $key => $val) {
            if (isset($val[$alias]['roles'])) {
                $results[$key][$alias]['roles'] = json_decode($val[$alias]['roles'], true);
            }
        }
        return $results;
    }

    public function getSidebar($user_roles)
    {
        $conditions = array('AccessMenu.enabled' => true);
        $contain = [];
        $this->unbindModel([
            'belongsTo' => ['Parent']
        ]);
        // if (intval($user_role_id)!==Role::SuperAdmin) {
        $this->Behaviors->load('Containable');
        $i = count($conditions);

        if (is_array($user_roles)) {
            foreach ($user_roles as $user_role) {
                $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '%,$user_role,%'");
                $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '[$user_role,%'");
                $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '%,$user_role]'");
                $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '[$user_role]'");
            }
        } else {
            $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '%,$user_roles,%'");
            $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '[$user_roles,%'");
            $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '%,$user_roles]'");
            $conditions[$i]['OR'][] = array("AccessMenu.roles LIKE '[$user_roles]'");
        }

        // $conditions[$i]['OR'][] = array("AccessMenu.roles"=>'[]');
        $contain['Route'] = array(
            'fields' => array(
                'Route.id',
                'Route.name',
                'Route.plugin',
                'Route.controller',
                'Route.action',
                'Route.active'
            )
        );
        // }
        $conditions[] = array('AccessMenu.parent_id' => null);
        $order = array('AccessMenu.position');
        $recursive = 1;
        $this->unbindModel(array(
            'belongsTo' => array(
                'Parent',
            )
        ));
        $fields = array(
            'AccessMenu.id',
            'AccessMenu.access_route_id',
            'AccessMenu.parent_id',
            'AccessMenu.icon',
            'AccessMenu.name',
            'AccessMenu.enabled',
            'AccessMenu.roles'
        );
        $opt = $this->find('all', compact('conditions', 'order', 'recursive', 'fields' . 'contain'));
        return $opt;
    }

    public function moveUp($id, $steps)
    {
        //1,2,3,4,5 move 1,5,2,3,4
        $this->recursive = -1;
        $current = $this->findById($id);
        $brothers = $this->findAllByParentId($current[$this->alias]['parent_id']);
        $position = intval(Hash::extract($current, "AccessMenu.position")[0]); //5
        if ($steps >= $position) {
            $steps = $position - 1;
        }
        $newPosition = $position - $steps; //2
        $update = [];

        foreach ($brothers as $i => $brother) {
            $currentPosition = intval($brother['AccessMenu']['position']);
            if ($newPosition > $currentPosition || $position < $currentPosition) {
                //cur = 1 continue
                // debug($currentPosition." Skipp");
                continue;
            } elseif ($position == $currentPosition) { //5 == 5 set 5-->2
                // debug($newPosition.":->".$currentPosition);
                $brother['AccessMenu']['position'] = $newPosition;
                $brother['AccessMenu']['oldposition'] = $currentPosition;
            } elseif ($newPosition <= $currentPosition) {  //2 <= 2 --> 3, 2 <= 3 --> 4,2 <= 4 --> 5
                $brother['AccessMenu']['position'] = $currentPosition + 1;
                $brother['AccessMenu']['oldposition'] = $currentPosition;
            }
            $update[] = $brother['AccessMenu'];
        }

        return $this->saveMany($update, ['atomic' => true]);
    }

    public function moveDown($id, $steps)
    {
        //1,2,3,4,5 move 1,3,4,2,5
        $this->recursive = -1;
        $current = $this->findById($id);
        $this->order = ['position'];
        $brothers = $this->findAllByParentId($current[$this->alias]['parent_id']);
        $position = intval(Hash::extract($current, "AccessMenu.position")[0]); //2
        $newPosition = $position + $steps; //4
        $brotherCount = count($brothers);
        if (in_array($brotherCount, [intval($steps), $newPosition])) {
            $newPosition = $brotherCount;
        }
        $update = [];
        foreach ($brothers as $i => $brother) {
            $currentPosition = $brother['AccessMenu']['position'];
            if ($position > $currentPosition) {
                //cur = 1 continue
                continue;
            } elseif ($position == $currentPosition) { //2 == 2 set 2-->4
                $brother['AccessMenu']['position'] = $newPosition;
            } elseif ($newPosition >= $currentPosition) {  //4 >= 3 --> 2, 4 <= 4 --> 3
                $brother['AccessMenu']['position'] = $currentPosition - 1;
            }
            $update[] = $brother['AccessMenu'];
        }
        return $this->saveMany($update, ['atomic' => true]);
    }
}
