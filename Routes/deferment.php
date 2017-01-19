<?php


//Deferment
// Request
$access_routes[] = array(
    'id' => '/deferment/request/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_request',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Status
$access_routes[] = array(
    'id' => '/deferment/status/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_status',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Listing RC
$access_routes[] = array(
    'id' => '/deferment/recommend/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'index',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Listing Admission Staff
$access_routes[] = array(
    'id' => '/deferment/verification/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'index2',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Listing Faculty Staff
$access_routes[] = array(
    'id' => '/deferment/approval/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'index3',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Listing Faculty Staff
$access_routes[] = array(
    'id' => '/deferment/verification_fin/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'index4',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


//Deferment
// Review
$access_routes[] = array(
    'id' => '/deferment/review/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_review',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Verify
$access_routes[] = array(
    'id' => '/deferment/verify/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_verify',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Approve
$access_routes[] = array(
    'id' => '/deferment/approve/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_approval',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Verify Financial
$access_routes[] = array(
    'id' => '/deferment/verifyfin/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_verifyFin',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Deferment
// Update Status (Admission)
$access_routes[] = array(
    'id' => '/deferment/status_update/*',
    'name' => 'Deferment',
    'plugin' => 'deferment',
    'controller' => 'deferments',
    'action' => 'deferment_updateStatus',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
