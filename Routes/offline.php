<?php

//offline applicant
//sign up
$access_routes[] = array(
    'id' => '/offline/sign_up/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'sign_up',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::MarketingStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/offline/kforce/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'kforce',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
$access_routes[] = array(
    'id' => '/offline/btec/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'btec',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//education
$access_routes[] = array(
    'id' => '/offline/education/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'educations',
    'action' => 'index',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/educations/add/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'educations',
    'action' => 'add',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/educations/edit/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'educations',
    'action' => 'edit',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/educations/delete/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'educations',
    'action' => 'delete',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//workingexps
$access_routes[] = array(
    'id' => '/offline/workingexps/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'working_experiences',
    'action' => 'index',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/workingexps/add/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'working_experiences',
    'action' => 'add',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
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
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
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
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//programoffs
$access_routes[] = array(
    'id' => '/offline/programoffs/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'details',
    'action' => 'index',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//confirmation
$access_routes[] = array(
    'id' => '/offline/confirmation/*',
    'name' => 'Sign Up Off Line Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'confirm',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff, Role::MarketingStaff, Role::MarketingBtec]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//kforce list
$access_routes[] = array(
    'id' => '/offline/kforceapplication/application_list',
    'name' => 'List of Kforce Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'application_list',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//kforce view
$access_routes[] = array(
    'id' => '/offline/kforceapplication/view/*',
    'name' => 'View of Kforce Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'view',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//kforce search
$access_routes[] = array(
    'id' => '/offline/kforceapplication/search',
    'name' => 'Search of Kforce Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'search',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//kforce print_letter
$access_routes[] = array(
    'id' => '/offline/kforceapplication/print_letter/*',
    'name' => 'Print of Kforce Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'print_letter',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//offline applicant
//kforce edit_program
$access_routes[] = array(
    'id' => '/offline/kforceapplication/edit_program/*',
    'name' => 'Edit Program of Kforce Application',
    'plugin' => 'offline_applicant',
    'controller' => 'masters',
    'action' => 'edit_program',
    'roles' => json_encode([Role::SuperAdmin, Role::Admin, Role::AdmissionStaff]),
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
