<?php 
return array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'owned_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'race_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'nationality_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'religion_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'ic_ppt_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'is_malaysian' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'dob' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'gender' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'registration_step' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'channel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'is_open_entry' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'tnc' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'privacy_policies' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'marital_status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'need_fin_assistance' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'self_sponsored_detail' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'ext_id_no' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'is_alumni' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'is_confirm' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'is_active' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'disability_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'disability_details' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'assigned_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'creator_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifier_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'tnc_pre' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'privacy_policies_pre' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'last_seen' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'is_oku' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'oku_no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 12, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'accommodation' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

