<?php
App::uses('AppModel', 'Model');
/**
 * Province Model
 *
 * @property Creator $Creator
 * @property Modifier $Modifier
 * @property PrincessAddress $PrincessAddress
 */
class Province extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PrincessAddress' => array(
			'className' => 'PrincessAddress',
			'foreignKey' => 'province_id',
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
