<?php
App::uses('AppModel', 'Model');
/**
 * UserRole Model
 *
 * @property User $User
 * @property Role $Role
 * @property Creator $Creator
 * @property AccessTrail $AccessTrail
 * @property Token $Token
 * @property User $User
 */
class UserRole extends AppModel
{
    /**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        // 'user_id' => array(
        // 	'uuid' => array(
        // 		'rule' => array('uuid'),
        // 		//'message' => 'Your custom message here',
        // 		//'allowEmpty' => false,
        // 		//'required' => false,
        // 		//'last' => false, // Stop validation after this rule
        // 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
        // 	),
        // ),
        'role_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
     
}
