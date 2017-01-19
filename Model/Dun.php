<?php
App::uses('AppModel', 'Model');
/**
 * Dun Model
 *
 * @property Parliament $Parliament
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property DunVote $DunVote
 * @property Princess $Princess
 */
class Dun extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Parliament' => array(
			'className' => 'Parliament',
			'foreignKey' => 'parliament_id',
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
		'DunVote' => array(
			'className' => 'DunVote',
			'foreignKey' => 'dun_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Princess' => array(
			'className' => 'Princess',
			'foreignKey' => 'dun_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
