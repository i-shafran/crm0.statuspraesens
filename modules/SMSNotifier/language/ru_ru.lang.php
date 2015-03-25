<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * All Rights Reserved.
 * Description: Defines the Russian language pack.
 * The Initial Translator is Eugene Babiy (eugene.babiy@gmail.com).
 * This Language Pack modified and supported by SalesPlatform Ltd
 * SalesPlatform vtiger CRM Russian Community: http://community.salesplatform.ru/
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/

$mod_strings = Array (
'SMSNotifier'                 => 'SMS-Уведомления',
'SINGLE_SMSNotifier'          => 'SMS Инфо',
'LBL_SMSNOTIFIER_INFORMATION' => 'Информация SMS',
'LBL_CUSTOM_INFORMATION'      => 'Пользовательская Информация',
'Assigned To'                 => 'Кому Назначено',
'Created Time'                => 'Время Создания',
'Modified Time'               => 'Время Изменения',
'message'                     => 'Сообщение',

'Related To'                  => 'Относится к',
'Status'                      => 'Статус',

'LBL_CHECK_STATUS'            => 'Проверить статус',

'SERVER_CONFIGURATION'        => 'Конфигурация Сервера',
'SERVER_CONFIGURATION_DESCRIPTION' => 'Настройка данных Сервера SMS',

'LBL_ADDNEW'                  => 'Добавить',
'LBL_UPDATE'                  => 'Обновить',
'LBL_PROVIDER'                => 'Провайдер',
'LBL_SELECT_ONE'              => 'Выбор',

'LBL_RECEPIENTS'              => 'Получатели',
'SMSCheckStatus'              => 'Проверить Статус',
'StatusInformation'           => 'Информация Статуса',

// SalesPlatform.ru begin
'LBL_YES'                     => 'Да',
'LBL_NO'                      => 'Нет',
'LBL_SSMS_SENDER'             => 'Отправитель',
'LBL_SSMS_TIME'               => 'Время(мин)',
'LBL_SMSPM_AUTH_HASH'         => 'Хэш-код',
'LBL_SMSPM_SENDER'            => 'Отправитель',
'LBL_SMS16_SENDER'            => 'Отправитель',
'LBL_INFORMGRAD_ACCOUNT_NUMBER' => 'Номер счета',
'LBL_VESMS_SENDER'            => 'Отправитель',   
    
'Select Phone Numbers'                          => 'Выбор телефонного номера',
'Please select the number types to send the'    => 'Пожалуйста, выберите тип телефонного номера для отправки',
'Compose SMS'                                   => 'Отправка сообщения',
'Message'                                       => 'Пожалуйста, введите текст сообщения',
'characters'                                    => 'символов',
// SalesPlatform.ru end

'SMSNotifier ID'			  => 'ID SMS-уведомления',

// SalesPlatform.ru begin localization for unconfigured server sms     
'LBL_SMS_SERVER'              => 'Сервер не настроен.',
'LBL_SMS_SERVER_CONF'         => 'Невозможно найти активных конфигураций сервера.',
'LBL_SMS_SETTINGS'            => 'Пожалуйста, настройте ваш сервер в Настройки -> Менеджер Модулей ->',   
'LBL_SMS_SERVER_ADMIN'        => 'Пожалуйста, обратитесь к вашему администратору.',
// SalesPlatform.ru end    
);

// SalesPlatform.ru begin SPConfiguration fix
include 'renamed.ru_ru.lang.php';
// SalesPlatform.ru end
?>
