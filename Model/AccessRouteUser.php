<?php
App::uses('AppModel', 'Model');
/**
 * AccessRouteUser Model
 *
 * @property User $User
 * @property AccessRoute $AccessRoute
 */
class AccessRouteUser extends AppModel
{
    /**
 * Display field
 *
 * @var string
 */
    public $displayField = 'id';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        // 'User' => array(
        // 	'className' => 'User',
        // 	'foreignKey' => 'user_id',
        // 	'conditions' => '',
        // 	'fields' => '',
        // 	'order' => ''
        // ),
        'AccessRoute' => array(
            'className' => 'AccessRoute',
            'foreignKey' => 'access_route_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
