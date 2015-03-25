/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
if(typeof(SPSocialConnector) == 'undefined') {
    var SPSocialConnector = {

        // SalesPlatform.ru begin 'wrapper_name' param added instead 'tblStatusInformation' value
        checkstatus : function(wrapper_name, record) {
                SPSocialConnector.loadstatus(wrapper_name, record, true);
        },

        loadstatus : function(wrapper_name, record, query) {
                var wrapper = $(wrapper_name);

                if(typeof(query) == 'undefined') query = false;

                if(wrapper) {
                        var url = 'module=SPSocialConnector&action=SPSocialConnectorAjax&ajax=true&file=SPSocialConnectorStatusWidget&record=' + record;
                        if(query) {
                                url += '&mode=query';
                        }

                        $('vtbusy_info').show();

                        new Ajax.Request('index.php', {
             queue: {position: 'end', scope: 'command'},
             method: 'post',
             postBody:  url,
             onComplete: function(response)
             {
                wrapper.innerHTML = response.responseText;
                $('vtbusy_info').hide();
             }
        });				
                }	
        }

    };
}