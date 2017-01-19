<?php
App::uses('AppModel', 'Model');
/**
 * Gender Model
 *
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property PrincessDetail $PrincessDetail
 */
class Gender extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PrincessDetail' => array(
			'className' => 'PrincessDetail',
			'foreignKey' => 'gender_id',
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
