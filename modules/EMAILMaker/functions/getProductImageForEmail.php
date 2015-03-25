<?php
function its4you_getProductImageForEmail($product_id,$width='',$height='')
{
	global $adb;
    $sql="SELECT productname, vtiger_attachments.path, vtiger_attachments.attachmentsid, vtiger_attachments.name,vtiger_crmentity.setype 
		FROM vtiger_products 
			LEFT JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.crmid=vtiger_products.productid 
			INNER JOIN vtiger_attachments on vtiger_attachments.attachmentsid=vtiger_seattachmentsrel.attachmentsid 
			INNER JOIN vtiger_crmentity on vtiger_crmentity.crmid = vtiger_attachments.attachmentsid 
		WHERE vtiger_crmentity.setype='Products Image' AND vtiger_products.productid=?
		LIMIT 0,1";
	$result = $adb->pquery($sql, array($product_id));
    $num_rows = $adb->num_rows($result);
    if ($num_rows > 0)
    {
      	$adb->query_result($result,0,"path");
      	$image_src = $adb->query_result($result,0,"path").$adb->query_result($result,0,"attachmentsid")."_".$adb->query_result($result,0,"name");
		if($width){
	  		$width_att = "width='".$width."'";
		} else {
			$width_att = "";
		}
      	if($height){
	  		$height_att = "height='".$height."'";
	  	} else {
		    $height_att = "";
		}
      	$image = "<img src='".$image_src."' $width_att $height_att/>";
      	return $image;
    } else {
		return " ";
	}
}
?>
