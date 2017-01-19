<?php
$access_routes[] = array(
    'id' => '/registrations',
    'name' => 'Student Registration List',
    'plugin' => 'registration',
    'controller' => 'masters',
    'action' => 'index',
    'roles' => '[1,2,5,6,7,16,17,18]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/registrations/fee/*',
    'name' => 'Student Registration List',
    'plugin' => 'registration',
    'controller' => 'masters',
    'action' => 'fee',
    'roles' => '[1,16,17,18]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/registrations/special_case/*',
    'name' => 'Special Case',
    'plugin' => 'registration',
    'controller' => 'masters',
    'action' => 'special_case',
    'roles' => '[1,16,17,18]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/registrations/payment/*',
    'name' => 'Payment Registration',
    'plugin' => 'registration',
    'controller' => 'masters',
    'action' => 'payment',
    'roles' => '[1,16,17,18]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);