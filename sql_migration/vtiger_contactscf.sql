UPDATE `vtiger_contactscf` SET `cf_946` = '';
UPDATE `vtiger_contactscf` SET `cf_800` = '';
UPDATE `vtiger_contactscf` SET `cf_886` = 0;
UPDATE `vtiger_contactscf` SET `cf_888` = '';
UPDATE `vtiger_contactscf` SET `cf_890` = '';
UPDATE `vtiger_contactscf` SET `cf_892` = NULL;
UPDATE `vtiger_contactscf` SET `cf_894` = NULL;
UPDATE `vtiger_contactscf` SET `cf_896` = NULL;
UPDATE `vtiger_contactscf` SET `cf_906` = NULL;
UPDATE `vtiger_contactscf` SET `cf_912` = '';
UPDATE `vtiger_contactscf` SET `cf_840` = '';
UPDATE `vtiger_contactscf` SET `cf_887` = NULL;
UPDATE `vtiger_contactscf` SET `cf_889` = NULL;
UPDATE `vtiger_contactscf` SET `cf_891` = '';
UPDATE `vtiger_contactscf` SET `cf_893` = '';
UPDATE `vtiger_contactscf` SET `cf_895` = '';
UPDATE `vtiger_contactscf` SET `cf_897` = '';
UPDATE `vtiger_contactscf` SET `cf_907` = '00:00:00';

ALTER TABLE `vtiger_contactscf` ADD `fix` INT(1) NULL DEFAULT NULL AFTER `cf_952`;

ALTER TABLE `vtiger_contactscf` CHANGE `cf_718` `cf_718` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;