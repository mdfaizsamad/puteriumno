<?php

$access_routes[] = array(
    'id' => '/contact_management/statistic',
    'name' => 'Marketing Application Statistics',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'statistic',
    'roles' => '[1,2,8]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/search_list',
    'name' => 'List of Search Applications',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'search_list',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


$access_routes[] = array(
    'id' => '/contact_management/index',
    'name' => 'List of Applications',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'index',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/processed',
    'name' => 'List of Processes Applications',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'processed',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/attended',
    'name' => 'List of Attended Applications',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'attended',
    'roles' => '[1,2,8]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/completed',
    'name' => 'List of Completed Applications',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'completed',
    'roles' => '[1,2,8]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/assign/*',
    'name' => 'Assign Applicants to Marketing Staff',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'assign',
    'roles' => '[1,2,8]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/assign_multiple/*',
    'name' => 'Assign Multiple to Marketing Staff',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'assign_multiple',
    'roles' => '[1,2,8]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/search',
    'name' => 'Search Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'search',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/searchprocess',
    'name' => 'Search Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'searchprocess',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/searchcomplete',
    'name' => 'Search Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'searchcomplete',
    'roles' => '[1,2,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/searchfollow',
    'name' => 'Search Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'searchfollow',
    'roles' => '[1,2,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/search_applicant',
    'name' => 'Search Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'search_applicant',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/view/*',
    'name' => 'View Detail Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'view',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/view_master/*',
    'name' => 'View Detail Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'view_master',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/view_search/*',
    'name' => 'View Detail Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'view_search',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/logs/*',
    'name' => 'Communication Log',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'logs',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/qualified/*',
    'name' => 'Edit Status Qualification Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'qualified',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/reject/*',
    'name' => 'Reject Application',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'reject',
    'roles' => '[1,2,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/offered/*',
    'name' => 'Offered Application',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'offered',
    'roles' => '[1,2,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/revert/*',
    'name' => 'Revert Back Application',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'revert',
    'roles' => '[1,2,8,9,10]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/edit_program/*',
    'name' => 'Edit Program Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'edit_program',
    'roles' => '[1,2,8,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/contact_management/print_letter/*',
    'name' => 'Print Conditional Offer Letter Applicants',
    'plugin' => 'contact_manager',
    'controller' => 'masters',
    'action' => 'print_letter',
    'roles' => '[1,2,9,10,22]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
