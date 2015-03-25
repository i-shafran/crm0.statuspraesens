<?php
/*+**********************************************************************************
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/

    require_once 'modules/SPCMLConnector/WebserviceExchange.php';
    
    /**
     * Provides basic functionality to CRM Modules-Objects
     */
    class EntityObject {
        protected $vtigerDescription;
        
        /**
         * Basic initilizate xml and vtiger description of the CRM object
         * @param string $xml
         * @param array $vtigerDescription
         */
        public function __construct($vtigerDescription) {
             $this->vtigerDescription = $vtigerDescription;
             $this->vtigerDescription['assigned_user_id'] = WebserviceExchange::getAssignedUserId($_SERVER['PHP_AUTH_USER']);
         }
        
         /**
          * Returns an array description of CRM object
          * @return array
          */
         public function getVtigerDescription() {
             return $this->vtigerDescription;
         }
    }  
      
    /**
     * Describes CRM product
     */
    class CommerceProduct extends EntityObject  {
        protected $nds;
        
        /**
         * Basic initilizate product
         * @param string $xml
         * @param array $vtigerDescription
         */
        public function __construct( $vtigerDescription) {
            parent::__construct($vtigerDescription);
            $this->vtigerDescription ['discontinued'] = 1;     //product musy be active 
            $this->nds=false;
        }
        
        /**
        * Compares id's of two products
        * @param Product $product
        * @return boolean
        */
        public function compareProductsID($product) {
            $product = $product->getVtigerDescription();
            if($this->vtigerDescription['1c_id']==$product['1c_id']) {
                return true;
            }
            return false;  
        }
             
        /**
         * Add fields from $product, which not exist in vtiger description
         * @param CommerceProduct $product
         */
        public function mergeProducts($product) {
            $productFields=$product->getVtigerDescription();
            $keys= array_diff_key($productFields,$this->vtigerDescription);
            foreach($keys as $key=>$value) {
                $this->vtigerDescription[$key]=$value;
            }
        }
        
        public function isNDS() {
            return $this->nds;
        }
        
        public function setNDS($bool) {
            $this->nds=$bool;
        }
    }
    
    /**
     * Describes CRM account
     */
    class CommerceAccount extends EntityObject {
       private $accountRole;
       
       /**
        * Basic initilizates account
        * @param string $xml
        * @param array $vtigerDescription
        * @param string $role
        */
       public function __construct($vtigerDescription,$role) {
           parent::__construct($vtigerDescription);
           $this->vtigerDescription ['discontinued'] = 1;           //active record
           $this->accountRole=$role;            //need in commerce documents
       }
       
       /**
        * Return an account role.
        * @return string
        */
       public function getRole() {
           return $this->accountRole;
       }
    }
    
    /**
     * Describes CRM SalesOrder
     */
    class CommerceSalesOrder extends EntityObject {
        
        /**
         * Basic initilizate SalesOrder
         * @param string $xml
         * @param array $vtigerDescription
         */
        public function __construct($vtigerDescription) {
            parent::__construct($vtigerDescription);
            $this->vtigerDescription['inventories']['Products']=array();
            $this->vtigerDescription['inventories']['Global'][0]['inventory_currency'] =
                WebserviceExchange::getDefaultCurrencyId();              //Rubles
            $this->vtigerDescription['inventories']['Global']['taxtype'] = "individual";
        }
        
        /**
         * Add an account to SalesOrder
         * @param CommerceAccount $account
         */
        private function insertAccount($account) {
            $this->vtigerDescription['account_id']=$account['id'];
            $this->vtigerDescription['bill_street']=$account['bill_street'];
            $this->vtigerDescription['ship_street']=$account['ship_street'];
        }
        
        /**
         * Build CRM description of the SalesOrder
         * @param CommerceAccount $account
         * @param array<CommerceProducts> $products
         * @param array<CommerceProducts> $services
         */
       public function buildOrder($account,$products) {
           $this->insertAccount($account);
           foreach($products as $product) {
               $this->insertProductToOrder($product);
           }
       }
       
       /**
        * Insert new product to the SalesOrder description.
        * @param array $product
        */
       public function insertProductToOrder($product) {
            $lenth = count($this->vtigerDescription['inventories']['Products']);
            $this->vtigerDescription['inventories']['Products'][$lenth+1]['hdnProductId']=$product['id'];
            $this->vtigerDescription['inventories']['Products'][$lenth+1]['qty']=$product['qty'];
            $this->vtigerDescription['inventories']['Products'][$lenth+1]['listPrice']=$product['unit_price'];
            
        }
          
        /**
         * Sets inventory currency.
         * @param reference $currency
         */
        public function setInventoryCurrency($currency) {
            $this->vtigerDescription['inventories']['Global'][0]['inventory_currency']=$currency;
        } 
    }
    
    /**
     * Provides basic functionality to the commerce-object classes.
     */
    class AbstractDocument {
        protected $xmlDescription;
        protected $products;
        protected $props; 
        
        /**
         * Basic initilizate fields
         * @param string $xml
         */
        public function __construct($xml) {
            $this->props=array();
            $this->products=array();
            $this->xmlDescription=$xml;;
        }
        
        /**
         * Initilizate props of the document or other document part (product, owner)
         * @param SimpleXmlElement $xmlParser
         */
        protected function initilizateProps($xmlParser) {
            $this->props=array();
            foreach($xmlParser->ЗначениеРеквизита as $prop) {
                $data['name'] = strip_tags($prop->Наименование->asXML());
                if($data['name']=="Проведен") {
                    $value = strip_tags($prop->Значение->asXML());
                    if($value=="false") {
                        $data['value']="Создан";       //document status
                    } else {
                        $data['value']="Одобрен";        //may be fix
                    }
                } else {
                    $data['value'] = strip_tags($prop->Значение->asXML());
                } 
                    array_push($this->props, $data);
            }
        }
        
        /**
         * Extract all products from the commerce document
         * @param SimpleXmlElement $xmlParser
         */
        protected function unzipProducts($xmlParser) {
            
            foreach($xmlParser->Товар as $xmlProduct) {
                
                if($xmlProduct->xpath('БазоваяЕдиница') == false) {
                    throw new Exception("Not usageunit in product!");
                }
                if($xmlProduct->xpath('Ид') == false) {
                    throw new Exception("Not product id!");
                }
                if($xmlProduct->xpath('Наименование') == false) {
                    throw new Exception("Not product name!");
                }
                
                $vtigerDescription['usageunit'] = strip_tags($xmlProduct->БазоваяЕдиница->asXML());
                $vtigerDescription['1c_id'] = strip_tags($xmlProduct->Ид->asXML());
                $this->initilizateProps($xmlProduct->ЗначенияРеквизитов);
                if($this->getPropValueByName("ВидНоменклатуры")=="Товар") {
                    $vtigerDescription['productname'] = strip_tags($xmlProduct->Наименование->asXML());
                    $vtigerDescription['productcode'] = strip_tags($xmlProduct->Артикул->asXML());
                    $vtigerDescription['type'] = "product";
                } else {
                   $vtigerDescription['servicename'] = strip_tags($xmlProduct->Наименование->asXML()); 
                   $vtigerDescription['productcode'] = strip_tags($xmlProduct->Артикул->asXML());
                   $vtigerDescription['type'] = "service";
                }
                
                $product=new CommerceProduct($vtigerDescription);
                if(strip_tags($xmlProduct->СтавкиНалогов->СтавкаНалога->Наименование->asXML())=="НДС") {
                    if(strip_tags($xmlProduct->СтавкиНалогов->СтавкаНалога->Ставка->asXML())!="Без налога") {
                        $product->setNDS(true);
                    } 
                }
                $this->addProduct($product);
            }    
            return;
        }
        
        /**
         * Add a product to the document
         * @param CommerceProduct $product
         */
        public function addProduct($product) {
            array_push($this->products, $product);
        }
        
        /**
         * Return all products from the document
         * @return array<CommerceProduct>
         */
        public function getProducts() {
            return $this->products;
        }
           
        /**
         * Return all products from the document in vtiger description
         * @return array<array>
         */
        public function getVtProducts() {
            $products=array();
            foreach($this->products as $product) {
                array_push($products, $product->getVtigerDescription());
            }
            return $products;
        }
        
        /**
         * Return props of the document
         * @return array<array>
         */
        public function getProps() {
            return $this->props;
        }
        
        /**
         * Return a vaule of prop with name $name or "-"
         * if prop name not find
         * @param string $name
         * @return string
         */
        public function getPropValueByName($name) {
            foreach($this->props as $prop) {
                if($prop['name']==$name) {
                    return $prop['value'];
                }      
            }
            return null;
        }
    }
   
    /**
     * Describes commerce document  - Catalog or PackageOffer
     */
    class Catalog extends AbstractDocument {
        private $vtigerCatalogDescription;
        private $isPackage;
        private $catalogID;
        private $catalogName;
        private $owner;
        
        /**
         * Basic initilizate
         * @param string $xml
         * @param boolean $isPackage
         */
        public function __construct($xml,$isPackage) {
            parent::__construct($xml);
            $this->isPackage=$isPackage;
            $this->initializateFields();
        }
        
        /**
         * Initilizate fields needed to create CRM catalog
         */
        private function initilizateVtigerDescription() {
            $this->vtigerCatalogDescription['bookname']=$this->catalogName;
            $this->vtigerCatalogDescription['active']="1";                                                   //catalog is active
            $this->vtigerCatalogDescription['currency_id'] = WebserviceExchange::getDefaultCurrencyId();              //rubles
            $this->vtigerCatalogDescription['assigned_user_id'] = WebserviceExchange::getAssignedUserId($_SERVER['PHP_AUTH_USER']);
            $this->vtigerCatalogDescription['1c_id']=$this->catalogID;
        }
        
        /**
         * Initilizate all members of the class object
         */
        private function initializateFields() {
            $xmlParser=new SimpleXMLElement($this->xmlDescription);
            
            if($xmlParser->xpath('Наименование') == false) {
                throw new Exception("Not catalog name!");
            }
            
            $this->catalogName = strip_tags($xmlParser->Наименование->asXML());
            
            if($xmlParser->xpath('Владелец') == false) {
                throw new Exception("Not owner in catalog!");
            }
            
            $this->unzipOwner($xmlParser->Владелец);
            if($this->isPackage==false) {
                
                if($xmlParser->xpath('Ид') == false) {
                    throw new Exception("Not catalog id!");
                }
                
                $this->catalogID = strip_tags($xmlParser->Ид->asXML());
                
                if($xmlParser->xpath('Товары') == false) {
                    throw new Exception("Not products in catalog!");
                }
                
                $this->unzipProducts($xmlParser->Товары);
            } else {
                
                if($xmlParser->xpath('/ПакетПредложений/ИдКаталога') == false) {
                    throw new Exception("Not catalog id!");
                }
                
                $this->catalogID = strip_tags($xmlParser->ИдКаталога->asXML());
                
                if($xmlParser->xpath('/ПакетПредложений/Предложения') == false) {
                    throw new Exception("Not offers in catalog!");
                }
                
                $this->unzipOffers($xmlParser->Предложения);
            }
            $this->initilizateVtigerDescription();
            unset($xmlParser);
        }
        
        /**
         * Extracts owner of the document
         * @param SimpleXmlElemet $xmlParser
         */
        private function unzipOwner($xmlParser) {
            $this->owner['id'] = strip_tags($xmlParser->Ид->asXML());
            $this->owner['name'] = strip_tags($xmlParser->Наименование->asXML());
        }
        
        /**
         * Extract all proposals from the document
         * @param SimpleXmlElemet $xmlParser
         */
        private function unzipOffers($xmlParser) {  
            
            //if in document greater than 1 price - get first
            foreach($xmlParser->Предложение as $xmlOffer) {
                
                if($xmlOffer->xpath('Цены') == false) {
                    throw new Exception("Not product price in offers!");
                }
                
                if($xmlOffer->xpath('Ид') == false) {
                    throw new Exception("Not product id in offers!");
                }
                
                $vtigerDescription['productname'] = strip_tags($xmlOffer->Наименование->asXML());
                $vtigerDescription['1c_id'] = strip_tags($xmlOffer->Ид->asXML());
                $vtigerDescription['usageunit'] = strip_tags($xmlOffer->Цены->Цена->Единица->asXML());
                $vtigerDescription['unit_price'] = strip_tags($xmlOffer->Цены->Цена->ЦенаЗаЕдиницу->asXML());
                $vtigerDescription['qtyinstock'] = strip_tags($xmlOffer->Количество->asXML());
                $vtigerDescription['currency_code'] = strip_tags($xmlOffer->Цены->Цена->Валюта->asXML());
                $vtigerDescription['conversion_rate'] = strip_tags($xmlOffer->Цены->Цена->Коэффициент->asXML());
                $product=new CommerceProduct($vtigerDescription);
                $this->addProduct($product);
            }
        }
        
        /**
         * Compare products and servies an if id's is equals - mix two products.
         * If id not equals any of existing products - it will be added
         * @param Catalog $catalog
         */
        public function updateProducts($catalog) {
            $products = $catalog->getProducts();                            //in package we dont know it is a service or product
            $this->products=$this->mergeInventories($this->products, $products);    //we compare it on 1c_id 
        }
        
        /**
         * Compares id and merge products
         * @param array<Products> $oldInventories
         * @param array<Products> $inventories
         * @return array
         */
        private function mergeInventories($oldInventories,$inventories) {
            $result = array();
            
            foreach ($oldInventories as $oldKey => $v) {
                $pushed=false;
                foreach ($inventories as $k => $value) {
                    if($oldInventories[$oldKey]->compareProductsID($inventories[$k])) {
                        $oldInventories[$oldKey]->mergeProducts($inventories[$k]);
                        array_push($result, $oldInventories[$oldKey]);
                        $pushed=true;
                        break;
                    }
                }
                if(!$pushed) {
                    array_push($result, $oldInventories[$oldKey]);      //not price
                }
            }
            
            return $result;
        }
        
        /**
         * Return catalof id
         * @return string
         */
        public function getCatalogID() {
            return $this->catalogID;
        }
        
        /**
         * Return catalog name
         * @return string
         */
        public function getCatalogName() {
            return $this->catalogName;
        }
        
        /**
         * Return vtiger catalog description
         * @return array
         */
        public function getVtigerCatalog() {
            return $this->vtigerCatalogDescription;
        }
    }
    
    /**
     * Describes commerce data named document
     */
    class CommerceDocument extends AbstractDocument {
        private $id;
        private $number;
        private $date;
        private $operation;
        private $currency;
        private $role;
        private $accounts;
        
        /**
         * Basic initilizate fileds
         * @param string $xml
         */
        public function __construct($xml) {
            parent::__construct($xml);
            $this->initilizateFields();
        }
        
        /**
         * Initilizate all fields.
         */
        private function initilizateFields() {
            
            $xmlParser=new SimpleXMLElement($this->xmlDescription);
            
            if($xmlParser->xpath('/Документ/Ид') == false) {
                    throw new Exception("Not document id!");
            }
            
            if($xmlParser->xpath('/Документ/Номер') == false) {
                print_r($xmlParser);
                    throw new Exception("Not document number!");
            }
            
            if($xmlParser->xpath('/Документ/ХозОперация') == false) {
                    throw new Exception("Not document operation!");
            }
            
            if($xmlParser->xpath('/Документ/Валюта') == false) {
                    throw new Exception("Not document currency!");
            }
            
            if($xmlParser->xpath('/Документ/Контрагент') == false) {
                    throw new Exception("Not document account!");
            }
            
            $this->id = strip_tags($xmlParser->Ид->asXML());
            $this->number = strip_tags($xmlParser->Номер->asXML());
            $this->date = strip_tags($xmlParser->Дата->asXML());
            $this->operation = strip_tags($xmlParser->ХозОперация->asXML());
            $this->role = strip_tags($xmlParser->Роль->asXML());
            $this->currency = strip_tags($xmlParser->Валюта->asXML());           
            
            $this->initilizateAccounts($xmlParser->Контрагент);             //not standart but 1c need
            $this->unzipProducts($xmlParser->Товары);
            $this->initilizateProps($xmlParser->ЗначенияРеквизитов);
            unset($xmlParser);
        }
        
        /**
         * Get all account from the document.
         * @param SimpleXmlElemet $xmlParser
         */
        private function initilizateAccounts($xmlParser) {
            /*on standart in here will be tag <Контрагенты> before each tag
            <Контрагент> but 1c nod support it standart */
            
            $account=$xmlParser;
            $vtigerDescription['1c_id']=  strip_tags($account->Ид->asXML());
            $vtigerDescription['accountname']=strip_tags($account->Наименование->asXML());
            
            //1c not all fill mandatory fields
            if ($account->xpath('/АдресРегистрации')!=false) {
                $vtigerDescription['bill_street'] = strip_tags($account->АдресРегистрации->Представление->asXML());
                $vtigerDescription['ship_street'] = strip_tags($account->АдресРегистрации->Представление->asXML());    
                $role = strip_tags($account->Роль->asXML());
            } else {
                $vtigerDescription['bill_street'] = "-";
                $vtigerDescription['ship_street'] = "-";
                $role = "покупатель";
            }
            
            $this->accounts = new CommerceAccount($vtigerDescription, $role); 
        }
        
        /**
         * Extract all products,services and their count from the document 
         * @param SimpleXmlElemet $xmlParser
         */
        protected function unzipProducts($xmlParser) {
            foreach($xmlParser->Товар as $xmlProduct) {
                $this->initilizateProps($xmlProduct->ЗначенияРеквизитов);
                if($this->getPropValueByName("ВидНоменклатуры")=="Товар") {
                    $vtigerDescription['productname'] = strip_tags($xmlProduct->Наименование->asXML());
                    $vtigerDescription['type'] = "product";
                } else {
                   $vtigerDescription['servicename'] = strip_tags($xmlProduct->Наименование->asXML()); 
                   $vtigerDescription['type'] = "service";
                }
                
                $vtigerDescription['1c_id'] = strip_tags($xmlProduct->Ид->asXML());
                $vtigerDescription['usageunit'] = strip_tags($xmlProduct->БазоваяЕдиница->asXML());
                $vtigerDescription['unit_price']=strip_tags($xmlProduct->ЦенаЗаЕдиницу->asXML());
                $vtigerDescription['qty']=strip_tags($xmlProduct->Количество->asXML());
                $product=new CommerceProduct($vtigerDescription);
                $this->addProduct($product);
            }
        }
        
        /**
         * Return accounts parsed from document.
         * @return CommerceAccount
         */
        public function getAccounts() {
            return $this->accounts;
        }
        
        /**
         * Return document currence code
         * @return string
         */
        public function getCurrency() {
            return $this->currency;
        }
        
        /**
         * Return VtigerDescription of Accounts in document
         * @return CommerceAccount
         */
        public function getVtAccounts() {
            return $this->accounts->getVtigerDescription();
        }

        /**
         * Return commerce operation.
         * @return string
         */
        public function getOperation() {
            return $this->operation;
        }
        
        /**
         * Return document id
         * @return string
         */
        public function getDocumentId() {
            return $this->id;
        }
    }
    
    /**
     * Parsing commerce information in xml fromat
     */
    class CommerceMLParser {
        private $xmlDocument;
        private $commerceOperation;
        
        /**
         * Basci initilixate
         * @param string $xml
         */
        public function __construct($xml) {
            $this->xmlDocument=$xml;
            $this->crmObjects=array();
            $this->commerceOperation=null;
            if(!$this->unzipCommerceOperation()) {
                throw new Exception('Unknow operation!');
            } 
        }
        
        /**
         * Initilizate commerce operation from the xml description.
         * If in document unknow operation - return false. 
         * @return boolean
         */
        private function unzipCommerceOperation() {
            $xmlParser=new SimpleXMLElement($this->xmlDocument);
            foreach($xmlParser as $node) {
                $field=$node->getName();
                
                //getting operation name
                if ($field=="Каталог") {
                        $this->commerceOperation="catalogOperation";
                        return true;
                } elseif ($field=="ПакетПредложений") {
                        $this->commerceOperation="packageOperation";     //need to ask
                        return true;
                } elseif ($field=="Документ") {
                    $operation =  strip_tags($node->ХозОперация->asXML());
                    if($operation=="Заказ товара") {
                        $this->commerceOperation="salesOrderOperation";
                        return true;
                    }
                }
            }
            return false;
        }
        
        /**
         * Return Catalog object from xml description
         * @return Catalog
         */
        private function catalogOperation() {
            $xmlParser = new SimpleXMLElement($this->xmlDocument);
            //add all catalogs
            $catalogs=array();
            foreach($xmlParser->Каталог as $catalog) {
                $cat = new Catalog($catalog->asXML(),false); //not package
                array_push($catalogs, $cat);
            }
            return $catalogs;
        }
        
        /**
         * Return Catalog object from xml description with prices
         * @return Catalog
         */
        private function packageOperation () {
            $xmlParser = new SimpleXMLElement($this->xmlDocument);
            $packages = array();
            foreach($xmlParser->ПакетПредложений as $package) {
                $pac = new Catalog($package->asXML(),true); //package
                array_push($packages, $pac);
            }
            $this->commerceOperation="catalogOperation";
            return $packages;
        }
        
        /**
         * Return CommerceDocument from the xml description/
         * @return CommerceDocument
         */
        private function salesOrderOperation() {
            
            $xmlParser = new SimpleXMLElement($this->xmlDocument);
            //get all document which contains order
            $documents=array();
            foreach($xmlParser->Документ as $document) {
                $doc = new CommerceDocument($document->asXML());
                array_push($documents, $doc);
            }
            return $documents;
        }
        
        /**
         * Return name of commerce operation
         * @return string
         */
        public function getCommerceOperation() {
            return $this->commerceOperation;
        }
        
        /**
         * Returns an commerce object from the xml description.
         * @return Catalog|CommerceDocument
         */
        public function runCommerceOperation() {
            $result = call_user_func("CommerceMLParser::".$this->commerceOperation);
            return $result;
        }
    }
?>
