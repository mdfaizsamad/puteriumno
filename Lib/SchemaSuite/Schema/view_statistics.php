<?php 
return array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'semester_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sem_year' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'value' => array('type' => 'float', 'null' => false, 'default' => '0', 'unsigned' => false),
		'program_level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'program_level_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'status_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

