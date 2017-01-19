<?php
App::uses('PuteriAppModel', 'Puteri.Model');
/**
 * Princess Model
 *
 * @property Parliament $Parliament
 * @property Dun $Dun
 * @property DunVote $DunVote
 * @property Branch $Branch
 * @property Age $Age
 * @property PrincessAddress $PrincessAddress
 * @property PrincessDetail $PrincessDetail
 */
class Princess extends PuteriAppModel {

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
		'Parliament' => array(
			'className' => 'Parliament',
			'foreignKey' => 'parliament_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dun' => array(
			'className' => 'Dun',
			'foreignKey' => 'dun_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DunVote' => array(
			'className' => 'DunVote',
			'foreignKey' => 'dun_vote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Age' => array(
			'className' => 'Age',
			'foreignKey' => 'age_id',
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
		'PrincessAddress' => array(
			'className' => 'PrincessAddress',
			'foreignKey' => 'princess_id',
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
		'PrincessDetail' => array(
			'className' => 'PrincessDetail',
			'foreignKey' => 'princess_id',
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
