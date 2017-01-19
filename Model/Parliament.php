<?php
App::uses('AppModel', 'Model');
/**
 * Parliament Model
 *
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property Dun $Dun
 * @property Princess $Princess
 */
class Parliament extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'parliament';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Dun' => array(
			'className' => 'Dun',
			'foreignKey' => 'parliament_id',
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
			'foreignKey' => 'parliament_id',
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
