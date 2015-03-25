<?php
/*+**********************************************************************************
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/

require_once('include/utils/utils.php');
include_once('vtlib/Vtiger/Unzip.php');
require_once 'modules/SPCMLConnector/OperationController.php';

define('UPLOAD_DIR', 'test/upload/1c/');

/**
 * Class provides process of data exchange between 1C and vtigerCRM
 */
class TranzactionController {
    private $request;
    
    /**
     * Initilizte params
     * @param $_REQUEST $request
     */
    public function __construct($request) {
        $this->request=$request;
    }
    
    
    /**
     * Controlls exchange process.
     */
    public function runTranzaction() {
        $type = vtlib_purify($this->request['type']);
        $mode = vtlib_purify($this->request['mode']);
        $answer = "fail";
        if ($type == 'catalog') {
            if ($mode == 'checkauth') {
                $answer = "success";
            } else if ($mode == 'init') {
                $answer = "zip=yes
                    1024000";
            } else if ($mode == 'file') {
                $filename = vtlib_purify($this->request['filename']);
                if ($this->saveFile($filename)) {
                    $answer = "success";
                }
            } else if ($mode == 'import') {
                $filename = vtlib_purify($this->request['filename']);
                if (file_exists(UPLOAD_DIR.$filename)) {
                    $answer = "success";
                    $this->runProductsUpdate();
                    $operation = new OperationController(null);
                    $operation->fixTranzaction("Products", "updates_from_1c", 1);
                    echo $answer;
                    return;
                }
            }
            
        } elseif($type=="sale") {
            $operation = new OperationController(null);
            if ($mode == 'checkauth') {
                $answer = "success";
            } else if ($mode == 'init') {
                $answer = "zip=yes
                    1024000";
            } else if($mode=="query") {
                $xml = $this->getCommerceOrders();
                $xml = str_replace("UTF-8","windows-1251",$xml);        //1c dont know utf
                $operation->fixTranzaction("SalesOrder", "updates_to_1c", 1);
                $answer = iconv("utf-8","windows-1251", $xml);
            } else if($mode=="success") {
                return;
            } else if($mode=="file") {
                $filename = vtlib_purify($this->request['filename']);
                if ($this->saveFile($filename)) {
                    $answer = "success";
                    $this->runSalesUpdate();
                    echo $answer;
                    return;
                }
            }
        }
        echo $answer;
    }
    
    /**
     * Run products import operation.
     */
    private function runProductsUpdate() {
        $catFiles = $this->getFiles(UPLOAD_DIR, 0, "import.xml");
        $packFiles = $this->getFiles(UPLOAD_DIR, 0, "offers.xml");
        foreach ($catFiles as $k => $v) {
            $catalog = file_get_contents(UPLOAD_DIR.$catFiles[$k]);
            $package = file_get_contents(UPLOAD_DIR.$packFiles[$k]);
            $commerceData = array($catalog,$package);
            $operation = new OperationController($commerceData);
            try {
                $operation->executeOperation();
            } catch(Exception $ex) {
                $operation->setTranzactionError("Products", "outside", 0, $ex->getMessage());
                echo "fail-".$ex->getMessage();
            } catch(WebServiceException $ex) {
                $operation->setTranzactionError("Products", "outside", 0, $ex->getMessage());
                echo "fail-".$ex->getMessage();
            }
            unlink(UPLOAD_DIR.$catFiles[$k]);
            unlink(UPLOAD_DIR.$packFiles[$k]);
        }
        //clear upload directory
        $files = $this->getFiles(UPLOAD_DIR, 0, "*.zip");
        foreach ($files as $file) {
           unlink(UPLOAD_DIR.$file); 
        }
        
    }
    
    /**
     * Run salesOrder import operation.
     */
    private function runSalesUpdate() {
        $files = $this->getFiles(UPLOAD_DIR, 0, "order*.xml");           
        foreach ($files as $file) {
            $order = file_get_contents(UPLOAD_DIR."$file");
            $commerceData=array($order);
            $operation = new OperationController($commerceData);
            try {
                $operation->executeOperation();
                $operation->fixTranzaction("SalesOrder", "updates_from_1c", 1);
            } catch(Exception $ex) {
                $operation->setTranzactionError("SalesOrder", "two-side", 0, $ex->getTrace());
                echo "fail-".$ex->getMessage();
            } catch(WebServiceException $ex) {
                $operation->setTranzactionError("SalesOrder", "two-side", 0, $ex->getTrace());
                echo "fail-".$ex->getMessage();
            }
            
            unlink(UPLOAD_DIR.$file);
        }
        
        //delete all zip archive
        $files = $this->getFiles(UPLOAD_DIR, 0, "*.zip"); 
        foreach ($files as $file) {
            unlink(UPLOAD_DIR.$file);
        }
    }
    
    private function getCommerceOrders() {
        $operation = new OperationController(null);
        $document = $operation->formSalesXml();
        return $document;
    }
    
    /**
     * Saves and unzip files transmitted from the 1C
     * @param string $filename
     * @return boolean
     */
    private function saveFile($filename) {
        $file_prefix = time();
        if(!file_exists(UPLOAD_DIR)) {
            mkdir(UPLOAD_DIR);
        }
        $file_path = UPLOAD_DIR.$file_prefix."_".$filename;
        $data = file_get_contents("php://input");
        if (!$data) {
            return false;
        }
        $file = fopen($file_path, "wb");
        if (!$file)  {
            return false;
        }
        if (!fwrite($file, $data)) {
            return false;
        }
        fclose($file);
        chmod($file_path, 0666);

        // Unzip
        if (substr($filename, -4) == '.zip') {
            $unzip = new Vtiger_Unzip($file_path);
            if (!$unzip)  {
                return false;
            }
            $unzip->unzipAllEx(UPLOAD_DIR);
            $unzip->close();
        }

        return true;
    }

    /**
     * Return an array of files name, sorted by $order and 
     * satisfy mask $mask
     * @param string $path
     * @param int $order
     * @param string $mask
     * @return array
     */
    private function getFiles($path, $order = 0, $mask = '*') {
        $sdir = array();
        if (false !== ($files = scandir($path, $order))) {  
            foreach ($files as $i => $entry) {     
               if ($entry != '.' && $entry != '..' && fnmatch($mask, $entry)) {
                  $sdir[] = $entry;
               }
            }
        }
        return ($sdir);
    }
}

?>
