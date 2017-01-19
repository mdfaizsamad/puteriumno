
// CREATE TRIGGER `copy_education_details_to_stu` AFTER INSERT ON stu_educations
// FOR EACH ROW
// BEGIN
// INSERT INTO `stu_education_details` (stu_education_id,school_subject_id,specialization,result,
// 										created,creator_id,modified,modifier_id)
// SELECT
// 	
// FROM
// 	app_education_details
//     WHERE
// 	app_education_details.app_education_id = NEW.id;
// END;
// ";

// $triggers[] = "
// CREATE TRIGGER `copy_guardian_contact_addresses_to_stu` AFTER INSERT ON stu_guardian_contacts
// FOR EACH ROW
// BEGIN
// INSERT INTO `stu_guardian_contact_addresses` (stu_guardian_contacts_id,address_type_id,provinces_id,
// 												country_id,address_1,address_2,address_3,town,
// 												postcode,created,creator_id,modified,modifier_id)
// SELECT
// 	app_guardian_contact_addresses.app_guardian_contacts_id,app_guardian_contact_addresses.address_type,app_guardian_contact_addresses.state,
// 	app_guardian_contact_addresses.country,app_guardian_contact_addresses.address_1,app_guardian_contact_addresses.address_2,app_guardian_contact_addresses.address_3,
// 	app_guardian_contact_addresses.town,app_guardian_contact_addresses.postcode,app_guardian_contact_addresses.created,app_guardian_contact_addresses.creator_id,
// 	app_guardian_contact_addresses.modified,app_guardian_contact_addresses.modifier_id
// FROM
// 	app_guardian_contact_addresses
//     WHERE
// 	app_guardian_contact_addresses.app_guardian_contacts_id = NEW.id;
// END;
// ";