<?php
$access_routes[] = array(
    'id' => '/applicants/print_letter',
    'name' => 'Print Offer Letter',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'print_letter',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/welcome',
    'name' => 'Welcome',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'welcome',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
    'public'=>true,
);

$access_routes[] = array(
    'id' => '/applicants/check_applicant',
    'name' => 'Sign Up Application',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'check_applicant',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/sign_up/*',
    'name' => 'Sign Up Application',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'sign_up',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
    'public'=>true,
);

$access_routes[] = array(
    'id' => '/applicants/educations/index/*',
    'name' => 'Add Education Background',
    'plugin' => 'applicant',
    'controller' => 'educations',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/educations/edit/*',
    'name' => 'Edit Education Background',
    'plugin' => 'applicant',
    'controller' => 'educations',
    'action' => 'edit',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/educations/delete/*',
    'name' => 'Delete Education Background',
    'plugin' => 'applicant',
    'controller' => 'educations',
    'action' => 'delete',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/educations/add/*',
    'name' => 'Add Education Background',
    'plugin' => 'applicant',
    'controller' => 'educations',
    'action' => 'add',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/workings/add/*',
    'name' => 'Add Working Experience Background',
    'plugin' => 'applicant',
    'controller' => 'working_experiences',
    'action' => 'add',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/workings/index/*',
    'name' => 'Add Working Experience',
    'plugin' => 'applicant',
    'controller' => 'working_experiences',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


$access_routes[] = array(
    'id' => '/applicants/workings/edit/*',
    'name' => 'Edit Working Experience',
    'plugin' => 'applicant',
    'controller' => 'working_experiences',
    'action' => 'edit',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/workings/delete/*',
    'name' => 'Delete Working Experience',
    'plugin' => 'applicant',
    'controller' => 'working_experiences',
    'action' => 'delete',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/program_selection/index/*',
    'name' => 'Add Program',
    'plugin' => 'applicant',
    'controller' => 'details',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


$access_routes[] = array(
    'id' => '/applicants/confirmation/*',
    'name' => 'Confirmation',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'confirm',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

$access_routes[] = array(
    'id' => '/applicants/final_confirmation/*',
    'name' => 'Final Confirmation',
    'plugin' => 'applicant',
    'controller' => 'applicants',
    'action' => 'finalConfirm',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
