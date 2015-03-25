<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
include_once dirname(__FILE__) . '/../ISMSProvider.php';
include_once 'vtlib/Vtiger/Net/Client.php';
include_once dirname(__FILE__) . '/streamsms/STREAMSMS.Class.php';

class StreamTelecomRuFiz implements ISMSProvider {
	
	private $_username;
	private $_password;
	private $_parameters = array();

        private $_streamsms;
	
	const SENDER_PARAM = 'LBL_SSMS_SENDER';
	const TIME_PARAM = 'LBL_SSMS_TIME';
        
	private static $REQUIRED_PARAMETERS = array(self::SENDER_PARAM, self::TIME_PARAM);
	
	function __construct() {
            $this->_streamsms = new STREAMSMS();
	}
	
	public function setAuthParameters($username, $password) {
		$this->_username = $username;
		$this->_password = $password;
	}
	
	public function setParameter($key, $value) {
		$this->_parameters[$key] = $value;
	}
	
	public function getParameter($key, $defvalue = false)  {
		if(isset($this->_parameters[$key])) {
			return $this->_parameters[$key];
		}
		return $defvalue;
	}
	
	public function getRequiredParams() {
		return self::$REQUIRED_PARAMETERS;
	}
	
	public function getServiceURL($type = false) {		
		return false;
	}	
	
	public function send($message, $tonumbers) {
		if(!is_array($tonumbers)) {
                    $tonumbers = array($tonumbers);
		}
                $status = 1;
                $flash = 0;
                $time = $this->getParameter(self::TIME_PARAM);
                if ($time <= 0) {
                    $time = 10;
                }
                $sender = $this->getParameter(self::SENDER_PARAM);
                $message = htmlspecialchars($message);
		$results = array();
                foreach($tonumbers as $to) {
                    $result['to'] = $to;
                    $streamsms_result = $this->_streamsms->SendTextMessage(
                            $this->_username, $this->_password,
                            $to, $message, $sender, $status, $flash, $time);
                    $result['id'] = $streamsms_result['ID сообщения'];
                    $result['statusmessage'] = $streamsms_result['Ответ сервера'];
                    if (substr_count($streamsms_result['Ответ сервера'], "Ошибка") > 0) {
                        $result['error'] = true;
                        $result['status'] = self::MSG_STATUS_ERROR;
                    } else {
                        $result['error'] = false;
                        $result['status'] = self::MSG_STATUS_PROCESSING;
                    }
                    $results[] = $result;
                }
		return $results;
	}

	public function query($messageid) {
		if(empty($messageid)){
			$result['error'] = true;
			$result['needlookup'] = 0;
			$result['statusmessage'] = 'Пустой идентификатор сообщения';
			$result['status'] = self::MSG_STATUS_ERROR;
			return($result);
		}
                $streamsms_result = $this->_streamsms->GetMessageState(
                        $this->_username,
                        $this->_password,
                        $messageid);
                $result = array('id' => $messageid, 'error' => false, 'needlookup' => 1, 'statusmessage' => $streamsms_result['Ответ сервера']);
		if (substr_count($streamsms_result['Ответ сервера'], "Ошибка") > 0) {
			$result['error'] = true;
			$result['needlookup'] = 0;
                        $result['status'] = self::MSG_STATUS_ERROR;
		} else {
                        $result['statusmessage'] = $streamsms_result['Статус сообщения'];
                        if (substr_count($streamsms_result['Статус сообщения'], "Ошибка") > 0) {
                                $result['needlookup'] = 0;
                                $result['status'] = self::MSG_STATUS_FAILED;
                                $result['statusmessage'] = $streamsms_result['Статус сообщения'];
                        } else {
                            switch($streamsms_result['Статус сообщения']) {
                                case 'Сообщение ожидает отправки':
                                        $result['status'] = self::MSG_STATUS_PROCESSING;
                                        $result['needlookup'] = 1;
                                        break;
                                case 'Сообщение доставлено на сервер':
                                        $result['status'] = self::MSG_STATUS_DISPATCHED;
                                        $result['needlookup'] = 1;
                                        break;
                                case 'Сообщение передано в мобильную сеть':
                                        $result['status'] = self::MSG_STATUS_PROCESSING;
                                        $result['needlookup'] = 1;
                                        break;
                                case 'Сообщение доставлено получателю':
                                        $result['status'] = self::MSG_STATUS_DELIVERED;
                                        $result['needlookup'] = 0;
                                        break;
                                case 'Статус не распознан':
                                        $result['status'] = self::MSG_STATUS_ERROR;
                                        $result['needlookup'] = 0;
                                        break;
                                default:
                                        $result['status'] = self::MSG_STATUS_ERROR;
                                        $result['needlookup'] = 0;
                                        break;
                            }
                        }
		}
		return $result;
	}
}
?>
