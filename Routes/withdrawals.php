<?php


//Deferment
// Request
$access_routes[] = array(
    'id' => '/withdrawal/request/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_request',
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
    'id' => '/withdrawal/status/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_status',
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
    'id' => '/withdrawal/recommend/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
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
    'id' => '/withdrawal/verification/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
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
    'id' => '/withdrawal/approval/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
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
    'id' => '/withdrawal/verification_fin/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
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
    'id' => '/withdrawal/review/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_review',
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
    'id' => '/withdrawal/verify/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_verify',
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
    'id' => '/withdrawal/approve/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_approval',
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
    'id' => '/withdrawal/verifyfin/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_verifyFin',
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
    'id' => '/withdrawal/status_update/*',
    'name' => 'Withdrawal',
    'plugin' => 'withdrawal',
    'controller' => 'withdrawals',
    'action' => 'withdraw_updateStatus',
    'roles' => '[1,5,6,7,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
