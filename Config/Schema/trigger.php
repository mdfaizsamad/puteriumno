<?php
// $triggers[] = "
// CREATE TABLE IF NOT EXISTS `view_statistics` (
//   `id` int(11) NOT NULL,
//   `semester_id` int(11) NOT NULL,
//   `sem_year` year(4) NOT NULL,
//   `value` float NOT NULL DEFAULT '0',
//   `program_level_id` int(11) NOT NULL,
//   `program_level_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
//   `status_id` int(11) NOT NULL,
//   `status_name` varchar(255) COLLATE utf8_bin DEFAULT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

// ALTER TABLE `view_statistics`
//   ADD PRIMARY KEY (`id`);

// ALTER TABLE `view_statistics`
//   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
//  ";

 $triggers[] = "
 CREATE TRIGGER `access_route_menu_name`
 AFTER UPDATE ON `access_routes`
 FOR EACH ROW UPDATE `access_menus` SET `access_menus`.`name` = NEW.name
 WHERE `access_menus`.`access_route_id` = NEW.id
 ";

// $triggers[] = "
// CREATE TRIGGER `trigger_copy_app_to_stu` AFTER INSERT ON app_statuses
// FOR EACH ROW
// BEGIN
// IF (NEW.status_id = 12) THEN

// INSERT INTO `stu_masters` (id,app_master_id,first_name,last_name,
// 							race_id,nationality_id,religion_id,ic_ppt_no,
// 							is_malaysian,dob,gender,phone,email,password,
// 							is_open_entry,privacy_policies,marital_status,
// 							need_fin_assistance,self_sponsored_detail,
// 							ext_id_no,is_alumni,is_active)
// SELECT
// 	NEW.master_id,
// 	app_masters.id,app_masters.first_name,app_masters.last_name,
// 	app_masters.race_id,app_masters.nationality_id,app_masters.religion_id,app_masters.ic_ppt_no,
// 	app_masters.is_malaysian,app_masters.dob,app_masters.gender,app_masters.phone,app_masters.email,app_masters.password,
// 	app_masters.is_open_entry,app_masters.privacy_policies,app_masters.marital_status,
// 	app_masters.need_fin_assistance,app_masters.self_sponsored_detail,
// 	app_masters.ext_id_no,app_masters.is_alumni,app_masters.is_active
// FROM
// 	app_masters
//     WHERE
// 	app_masters.id = NEW.master_id;

// INSERT INTO `stu_details` (id,stu_master_id,program_level_id,state,program_id,
// 							study_centre_id,intake_id,academic_group_id,teaching_mode,
// 							study_mode,created,creator_id,modified,modifier_id)
// SELECT
// 	app_details.id,
// 	app_details.master_id,app_details.program_level_id,app_details.state,app_details.program_id,
// 	app_details.study_centre_id,app_details.intake_id,app_details.academic_group_id,app_details.teaching_mode,
// 	app_details.study_mode,app_details.created,app_details.creator_id,app_details.modified,app_details.modifier_id
// FROM
// 	app_details
//     WHERE
// 	app_details.master_id = NEW.master_id;

// INSERT INTO `stu_educations` (id,stu_master_id,education_level_id,year,school,programs,
// 								verification_sts,created,creator_id,modified,modifier_id)
// SELECT
// 	app_educations.id,
// 	app_educations.master_id,app_educations.education_level_id,app_educations.year,app_educations.school,app_educations.programs,
// 	app_educations.verification_sts,app_educations.created,app_educations.creator_id,app_educations.modified,app_educations.modifier_id
// FROM
// 	app_educations
//     WHERE
// 	app_educations.master_id = NEW.master_id;

// INSERT INTO `stu_guardian_contacts` (id,stu_master_id,relationship_id,salary_range_id,
// 										type,first_name,last_name,ic_ppt_no,mobile,
// 										phone,occupations,created,creator_id,modified,
// 										modifier_id)
// SELECT
// 	app_guardian_contacts.id,
// 	app_guardian_contacts.master_id,app_guardian_contacts.relationship_id,app_guardian_contacts.salary_range_id,
// 	app_guardian_contacts.type,app_guardian_contacts.first_name,app_guardian_contacts.last_name,app_guardian_contacts.ic_ppt_no,app_guardian_contacts.mobile,
// 	app_guardian_contacts.phone,app_guardian_contacts.occupations,app_guardian_contacts.created,app_guardian_contacts.creator_id,
// 	app_guardian_contacts.modified,app_guardian_contacts.modifier_id

// FROM
// 	app_guardian_contacts
//     WHERE
// 	app_guardian_contacts.master_id = NEW.master_id;


// INSERT INTO `stu_addresses` (id,stu_master_id,address_type_id,province_id,country_id,
// 								address_1,address_2,address_3,town,postcode,created,
// 								creator_id,modified,modifier_id)
// SELECT
// 	app_addresses.id,
// 	app_addresses.master_id,app_addresses.address_type_id,app_addresses.province_id,app_addresses.country_id,
// 	app_addresses.address_1,app_addresses.address_2,app_addresses.address_3,app_addresses.town,app_addresses.postcode,
// 	app_addresses.created,app_addresses.creator_id,app_addresses.modified,app_addresses.modifier_id

// FROM
// 	app_addresses
//     WHERE
// 	app_addresses.master_id = NEW.master_id;

// INSERT INTO `stu_working_experiences` (stu_master_id,dt_start,dt_end,company_name,
// 										designation,responsibilities,specialitization,
// 										refree,creator_id)
// SELECT
// 	app_working_experiences.master_id,app_working_experiences.dt_start,app_working_experiences.dt_end,app_working_experiences.company_name,
// 	app_working_experiences.designation,app_working_experiences.responsibilities,app_working_experiences.specialitization,
// 	app_working_experiences.refree,app_working_experiences.creator_id

// FROM
// 	app_working_experiences
//     WHERE
// 	app_working_experiences.master_id = NEW.master_id;

// INSERT INTO `stu_master_exts` (master_id,category,rank,date_joined,unit,
// 								speciality,remarks,created,creator_id,modified,
// 								modifier_id)
// SELECT
// 	app_master_exts.master_id,app_master_exts.category,app_master_exts.rank,app_master_exts.date_joined,app_master_exts.unit,
// 	app_master_exts.speciality,app_master_exts.remarks,app_master_exts.created,app_master_exts.creator_id,app_master_exts.modified,
// 	app_master_exts.modifier_id

// FROM
// 	app_master_exts
//     WHERE
// 	app_master_exts.master_id = NEW.master_id;

// INSERT INTO `stu_sponsored_bies` (stu_master_id,sponsorship_id,amount,other_details,
// 									created,creator_id,modified,modifier_id)
// SELECT
// 	app_sponsored_bies.master_id,app_sponsored_bies.sponsorship_id,app_sponsored_bies.amount,app_sponsored_bies.other_details,
// 	app_sponsored_bies.created,app_sponsored_bies.creator_id,app_sponsored_bies.modified,app_sponsored_bies.modifier_id

// FROM
// 	app_sponsored_bies
//     WHERE
// 	app_sponsored_bies.master_id = NEW.master_id;

// END IF;
// END;
// ";

// $triggers[] = "
// CREATE TRIGGER `copy_education_details_to_stu` AFTER INSERT ON stu_educations
// FOR EACH ROW
// BEGIN
// INSERT INTO `stu_education_details` (stu_education_id,school_subject_id,specialization,result,
// 										created,creator_id,modified,modifier_id)
// SELECT
// 	app_education_details.app_education_id,app_education_details.school_subject_id,app_education_details.specialization,app_education_details.result,
// 	app_education_details.created,app_education_details.creator_id,app_education_details.modified,app_education_details.modifier_id
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

$triggers[] = "
CREATE TRIGGER `create_registration_bills` AFTER INSERT ON stu_details
FOR EACH ROW
BEGIN
INSERT INTO `fin_stu_transactions` (stu_master_id,fee_type_id,
									amount,balance,entry_type,trx_type_id,created)
SELECT
	NEW.stu_master_id,
	fin_fee_tables.fee_type_id,fin_fee_tables.price,fin_fee_tables.price,'debit','1',NOW()

FROM
	fin_fee_tables	
    WHERE
	fin_fee_tables.fee_type_id = '1' AND fin_fee_tables.student_type = (SELECT is_malaysian FROM stu_masters WHERE id = NEW.stu_master_id) 
	AND fin_fee_tables.study_mode = (SELECT study_mode FROM stu_details WHERE stu_master_id = NEW.stu_master_id) AND 
	fin_fee_tables.academic_group_id = (SELECT academic_group_id FROM stu_details WHERE stu_master_id = NEW.stu_master_id);

INSERT INTO `fin_stu_transactions` (stu_master_id,fee_type_id,
									amount,balance,entry_type,trx_type_id,created)
SELECT
	NEW.stu_master_id,
	fin_fee_tables.fee_type_id,fin_fee_tables.price,fin_fee_tables.price,'debit','1',NOW()

FROM
	fin_fee_tables	
    WHERE
	fin_fee_tables.fee_type_id = '2' AND fin_fee_tables.student_type = (SELECT is_malaysian FROM stu_masters WHERE id = NEW.stu_master_id) 
	AND fin_fee_tables.study_mode = (SELECT study_mode FROM stu_details WHERE stu_master_id = NEW.stu_master_id);

END;
";

// $triggers[] = "
// DELIMITER $$
// CREATE TRIGGER `trigger_sya_yg_baru` AFTER INSERT ON app_statuses
// FOR EACH ROW
// BEGIN
// IF (NEW.status_id = 16) THEN
// INSERT INTO `stu_masters` (id,first_name)
// SELECT
// 	NEW.master_id,
// 	app_masters.first_name
// FROM
// 	app_masters
//     WHERE
// 	app_masters.id = NEW.master_id;
// END IF;
// END;
// $$
// DELIMITER ;";

return $triggers;
