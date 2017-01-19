<?php

$access_routes[] = array(
    'id' => '/policies/view/*',
    'name' => 'View Admission Policy',
    'plugin' => null,
    'controller' => 'admission_policies',
    'action' => 'view',
    'roles' => '[1,2,3,4]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/policies/add/*',
    'name' => 'Add Admission Policy',
    'plugin' => null,
    'controller' => 'admission_policies',
    'action' => 'add',
    'roles' => '[1,2,3,4]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/policies/add_criteria/*',
    'name' => 'Add Criteria in to Policy',
    'plugin' => null,
    'controller' => 'admission_policies',
    'action' => 'add_criteria',
    'roles' => '[1,2,3,4]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/policies/delete_policy/*',
    'name' => 'Delete Admission Policy',
    'plugin' => null,
    'controller' => 'admission_policies',
    'action' => 'delete_policy',
    'roles' => '[1,2,3,4]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/policies/delete_criteria/*',
    'name' => 'Delete Admission Criteria',
    'plugin' => null,
    'controller' => 'admission_policies',
    'action' => 'delete_criteria',
    'roles' => '[1,2,3,4]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
