<?php
App::uses('AppModel', 'Model');
/**
 * Race Model
 *
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property PrincessDetail $PrincessDetail
 */
class Race extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PrincessDetail' => array(
			'className' => 'PrincessDetail',
			'foreignKey' => 'race_id',
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
