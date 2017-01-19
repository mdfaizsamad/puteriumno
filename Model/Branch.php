<?php
App::uses('AppModel', 'Model');
/**
 * Branch Model
 *
 * @property DunVote $DunVote
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property Princess $Princess
 */
class Branch extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DunVote' => array(
			'className' => 'DunVote',
			'foreignKey' => 'dun_vote_id',
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
		'Princess' => array(
			'className' => 'Princess',
			'foreignKey' => 'branch_id',
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
