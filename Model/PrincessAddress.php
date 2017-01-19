<?php
App::uses('AppModel', 'Model');
/**
 * PrincessAddress Model
 *
 * @property Princess $Princess
 * @property City $City
 * @property Province $Province
 * @property State $State
 * @property Creator $Creator
 * @property Modifier $Modifier
 */
class PrincessAddress extends AppModel {


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
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Province' => array(
			'className' => 'Province',
			'foreignKey' => 'province_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
