<?php
App::uses('PuteriAppModel', 'Puteri.Model');
/**
 * PrincessDetail Model
 *
 * @property Princess $Princess
 * @property Gender $Gender
 * @property Race $Race
 */
class PrincessDetail extends PuteriAppModel {


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
