ALTER TABLE `vtiger_crmentity` CHANGE `crmid` `crmid` INT(19) NOT NULL AUTO_INCREMENT;


SELECT
  vtiger_contactscf.cf_743, vtiger_crmentity.crmid, vtiger_crmentity.createdtime, vtiger_crmentity.modifiedtime
FROM 
  vtiger_contactscf 
INNER JOIN
  vtiger_crmentity ON vtiger_contactscf.contactid = vtiger_crmentity.crmid
WHERE 
  vtiger_contactscf.cf_743 LIKE '%WRUE%'