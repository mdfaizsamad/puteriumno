<?php


$access_routes[] = array(
    'id' => '/workingexps/add/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'working_experiences',
    'action' => 'add',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/workingexps/edit/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'working_experiences',
    'action' => 'edit',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/workingexps/delete/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'working_experiences',
    'action' => 'delete',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


