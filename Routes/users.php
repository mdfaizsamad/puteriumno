<?php
$access_routes[] = array(
    'id' => '/users',
    'name' => 'Users List',
    'plugin' => 'Users',
    'controller' => 'users',
    'action' => 'index',
    'roles' => '[1]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


$access_routes[] = array(
    'id' => '/users/logout',
    'name' => 'Users Logout',
    'plugin' => 'Users',
    'controller' => 'users',
    'action' => 'logout',
    'roles' => '[]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/users/login',
    'name' => 'Users Login',
    'plugin' => 'Users',
    'controller' => 'users',
    'action' => 'login',
    'roles' => '[]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
