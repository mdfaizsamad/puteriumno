<?php


//Pre-admission
// Logon to the Registered Applications
$access_routes[] = array(
    'id' => '/preadmission/log_reg/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'log_reg',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// Personal Information
$access_routes[] = array(
    'id' => '/preadmission/personal_information/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'personal_information',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// Index
$access_routes[] = array(
    'id' => '/preadmission/index',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Pre-admission
// Personal Information
$access_routes[] = array(
    'id' => '/preadmission/personal_information',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'personal_information',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);


//Pre-admission
// Guardian Details
$access_routes[] = array(
    'id' => '/preadmission/contacts/index/*',
    'name' => 'Parents/Guardians Details',
    'plugin' => 'preadmission',
    'controller' => 'guardian_contacts',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Pre-admission
// sponsor
$access_routes[] = array(
    'id' => '/preadmission/sponsor/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'sponsored_bies',
    'action' => 'sponsorship',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Pre-admission
// education
$access_routes[] = array(
    'id' => '/preadmission/education/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'educations',
    'action' => 'index',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// education add
$access_routes[] = array(
    'id' => '/preadmission/education/add/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'educations',
    'action' => 'add',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// education edit
$access_routes[] = array(
    'id' => '/preadmission/education/edit/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'educations',
    'action' => 'edit',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// education delete
$access_routes[] = array(
    'id' => '/preadmission/education/delete/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'educations',
    'action' => 'delete',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// confirmation
$access_routes[] = array(
    'id' => '/preadmission/confirmation/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'confirm',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// declaration
$access_routes[] = array(
    'id' => '/preadmission/declaration/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'declaration',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// kforce
$access_routes[] = array(
    'id' => '/preadmission/kforce/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'kforce',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// sign up
$access_routes[] = array(
    'id' => '/preadmission/sign_up/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'sign_up',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);

//Pre-admission
// Update(information)
$access_routes[] = array(
    'id' => '/preadmission/update/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'update',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// verify(information)
$access_routes[] = array(
    'id' => '/preadmission/verify/*',
    'name' => ' Pre Admission',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'verify',
    'roles' => '[1,2,21]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);
//Pre-admission
// verificationStatus(status = verified)
$access_routes[] = array(
    'id' => '/preadmission/verification_status/*',
    'name' => 'Predmission Verified',
    'plugin' => 'preadmission',
    'controller' => 'masters',
    'action' => 'verification_status',
    'roles' => '[1,5]',
    'users' => '[]',
    'active' => true,
    'owner_only' => false,
    'creator_id' => 1,
    'modifier_id' => 1,
);