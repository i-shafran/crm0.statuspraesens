<?php
/*+**********************************************************************************
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/

require_once 'include/Webservices/Utils.php';
require_once("include/Webservices/State.php");
require_once("include/Webservices/OperationManager.php");
require_once("include/Webservices/SessionManager.php");
require_once("include/Webservices/Query.php");
require_once("include/Webservices/Create.php");
require_once("include/Webservices/Update.php");
require_once("include/Webservices/Retrieve.php");
require_once("include/Webservices/Delete.php");
require_once("include/Webservices/DescribeObject.php");
require_once("modules/Users/Users.php");
require_once("modules/Services/Services.php");



/**
 * Class provides saving data to vtiger entities.
 */
class WebserviceExchange {
    private  $user;

    /**
     * Initilizate parametres.
     * @param array $data
     * @param string $module
     */
    public function __construct() {
        $this->user=Users::getActiveAdminUser();            //user in webservice is an object
    }
    
    /**
     * Returns an record id if exist or null if
     * record not exist.
     * @return reference|null
     */
    private function dataExists($data,$module) {
        
        //sales are sync by name too
        if($module=="SalesOrder") {
            $name=$data['subject'];
            $query = "select * from $module where salesorder_no='$name';";
            $result = vtws_query($query, $this->user);
            if($result!=null) {
                return $result[0]['id'];     
            }
            return null;
        } 
        
        if ($module=="Products") {
            $productName = $data['productname'];
            $productCode = $data['productcode'];
            $result = vtws_query("select * from $module;", $this->user);
            foreach($result as $product) {
                if($product['productcode']==$productCode && 
                        $product['productname']==$productName) {
                    return $product['id'];
                }
            } 
        }
        
        if($module=="Services") {
            $name = $data['servicename'];
            $result = vtws_query("select * from $module where servicename='$name';", $this->user);
            if($result!=null) {
                return $result[0]['id'];     
            }
        }
        
        $name=$data['1c_id'];
        $query = "select * from $module where 1c_id='$name';";
        $result = vtws_query($query, $this->user);
        if($result!=null) {
            return $result[0]['id'];      
        }   
        return null;
    }
    
    /**
     * Creates new record nad returns it fields.
     * @return array
     */
    private function createNewRecord($data,$module) {
        if($module!="SalesOrder") {       //to sync orders with 1c - we as website
            return vtws_create($module, $data, $this->user);
        } else {
            return;         //new record never creates from 1c
        } 
    }
    
    /**
     * Updates record with id=$id and return update result.
     * @param reference $id
     * @return array
     */
    private function updateRecord($id,$data) {
        $record = vtws_retrieve($id, $this->user);
        foreach($data as $field => $value) {
            if($field!='id' && $field!='subject' && $value!="-")                //this field must be renamed
                $record[$field] = $value;
        }
        return vtws_update($record, $this->user);;
    }
    
    private function deleteRecord($id) {
        return vtws_delete($id, $this->user);
    }
    
    /**
     * Creates or updates record? whic was initilizate on construct.
     * @return array
     */
    public function saveData($data,$module) {
        $id = $this->dataExists($data,$module);
        if($id==null) {
            return $this->createNewRecord($data,$module);
        } else {
           return $this->updateRecord($id,$data);
        }
    }
    
    public function deleteData($data,$module) {
        $id = $this->dataExists($data,$module);
        if($id==null) {
            return;
        } else {
           return $this->deleteRecord($id);
        }
    }
    
    /**
     * Creates new record if not exist and return it
     * @return array
     */
    public function retrieveRecord($data,$module) {
        $query="";
        if($module!="SalesOrder") {
            $name=$data['1c_id'];
            $query = "select * from $module where 1c_id='$name';";
        } else {
            $name=$data['subject'];
            $query = "select * from $module where salesorder_no='$name';";
        }
        $result = vtws_query($query,$this->user);
       
        if($result!=null) {
            return $this->retrieve($result[0]["id"]);
        } elseif($module=="Accounts") {
            $name=$data['accountname'];
            $query = "select * from $module where accountname='$name';";
            $result = vtws_query($query,$this->user);
            if($result!=null) {
                return $this->updateRecord($result[0]["id"],$data);
            } else {
                $this->createNewRecord($data,$module);
            }
        }
       
        return null;
    }
    
    /**
     * Returns default admin reference id.
     * @return reference
     */
    public static function getAssignedUserId($loggedUser) {
        $user = Users::getActiveAdminUser();
        $result = vtws_query("select id from Users where user_name='$loggedUser';",$user);
        return $result[0]['id'];
    }
    
    /**
     * Return a RUB reference id.
     * @return reference
     */
    public static function getDefaultCurrencyId() {
        $user = Users::getActiveAdminUser();
        $result = vtws_query("select * from Currency where currency_code='RUB';", $user);
        return $result[0]['id'];
    }
    
    public function query($sql) {
        $result = vtws_query($sql, $this->user);
        return $result;
    }
    
    public function retrieve($id) {
        $result = vtws_retrieve($id,$this->user);
        return $result;
    }
    
    
    public function setTaxToProduct($hdnProductId) {
        global $adb;
        $params = array($hdnProductId,1,18.000);            //it is NDS
        $query = "insert into vtiger_producttaxrel values(?,?,?)";
	$adb->pquery($query,$params);
    }
    
    public function deleteTaxFromProduct($hdnProductId) {
        global $adb;
        $params = array($hdnProductId);            //it is NDS
        $query = "delete from vtiger_producttaxrel where productid='?'";
	$adb->pquery($query,$params);
    }
    
     /**
     * 
     * Adds records into catalog
     * @param int $catalodID
     * @param int $productID
     * @param double $catalogPrice
     * @param int $currency
     */
    public function addToVtigerCatalog($catalodID,$productID,$catalogPrice,$currency) {
        global $adb;           //because not access to pricebookproductrel by REST
        $adb->pquery("INSERT INTO `vtiger_pricebookproductrel` 
            (`pricebookid`, `productid`, `listprice`, `usedcurrency`)
            VALUES ($catalodID, $productID, $catalogPrice, $currency);", array());
    }
    
    /**
     * Get all products and services from catalog with $id
     * @return array<array>
     */
    public function getArrayProductsCatalog($id) {
        global $adb;                                    //because not access to pricebookproductrel by REST
        $inventories = array();
        $result = $adb->pquery("Select productid from `vtiger_pricebookproductrel` where 
            pricebookid='$id';",  array());
        while($product = $result->fetchByAssoc()) {
            $isProduct = true;
            $request = $this->query("select * from Products where id=x".$product['id'].";");
            if($request==null) {
                $request = $this->query("select * from Services where id=x".$product['id'].";");
                $isProduct = false;
            }
            $request = $this->retrieve($request['id']);
            if($isProduct) {
                $request['type'] ="product";
            } else {
                $request['type'] ="service";
            }
            array_push($inventories, $request);
        }
        
        return $inventories;
    }
    
    /**
     * Return a currency id. If not exists - create it.
     * @param String $code
     */
    public function getCurrencyId($code,$conversion) {
        $user = Users::getActiveAdminUser();
        $result = vtws_query("select * from Currency where currency_code='$code';", $user);
        if($result!=null) {
           return substr($result[0]['id'], strpos($result[0]['id'],'x')+1);
        } else {
            $currency['conversion_rate']=$conversion;
            $currency['defaultid']=-10;
            $currency['currency_status']="Active";
            $currency['deleted']=0;
            $currency['currency_code']=$code;
            $currency['currency_name']=$code;
            $currency['currency_symbol']=$code;
            $result = vtws_create("Currency",$currency,$user);
            
            return substr($result['id'], strpos($result['id'],'x')+1);
        }  
    }
    
    /**
     * 
     * Sets currency to product
     * @param int $productId
     * @param int $currencyId
     */
    public function setCurrencyToProduct($productId,$currencyId) {
        global $adb;
        $adb->pquery("UPDATE `vtiger_products` SET
            `currency_id`= '$currencyId' where `productid`='$productId';", array());
        
        $adb->pquery("UPDATE `vtiger_service` SET
            `currency_id`= '$currencyId' where `serviceid`='$productId';", array());

    }
    
    public function isLogin($user,$key) {
        if($user==null) {
            return false;
        }
        $result = vtws_query("select accesskey from Users where user_name='$user';", Users::getActiveAdminUser());
        if($result!=null) {
            if($result[0]['accesskey']==$key) {
                return true;
            }
        } else {
            return false;
        }
    }
}

?>
