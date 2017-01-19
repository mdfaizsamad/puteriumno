<?php
App::uses('AppModel', 'Model');
/**
 * PrincessDetail Model
 *
 * @property Princess $Princess
 * @property Gender $Gender
 * @property Race $Race
 * @property Creator $Creator
 * @property Modifier $Modifier
 */
class PrincessDetail extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'princess_id' => array(
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
		'Princess' => array(
			'className' => 'Princess',
			'foreignKey' => 'princess_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Race' => array(
			'className' => 'Race',
			'foreignKey' => 'race_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
