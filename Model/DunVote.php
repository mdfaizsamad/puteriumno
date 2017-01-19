<?php
App::uses('AppModel', 'Model');
/**
 * DunVote Model
 *
 * @property Dun $Dun
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property Branch $Branch
 * @property Princess $Princess
 */
class DunVote extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Dun' => array(
			'className' => 'Dun',
			'foreignKey' => 'dun_id',
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
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'dun_vote_id',
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
			'foreignKey' => 'dun_vote_id',
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
