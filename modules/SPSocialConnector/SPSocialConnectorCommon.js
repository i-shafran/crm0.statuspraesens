/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: SalesPlatform Ltd
 * The Initial Developer of the Original Code is SalesPlatform Ltd.
 * All Rights Reserved.
 * If you have any questions or comments, please email: devel@salesplatform.ru
 ************************************************************************************/
if(typeof(SPSocialConnectorCommon) == 'undefined') {
    var SPSocialConnectorCommon = {

        /** Wizard Container **/
        getWizardContainer : function() {
            var container = $('__wizard_container__');
            if(!container) {
                    container = document.createElement('div');
                    container.className = 'layerPopup';
                    container.id = '__wizard_container__';
                    document.body.appendChild(container);				
            }

            return container;
        },

        displayWizardContainer : function(container, sourcenode) {
            if(typeof(container) == 'undefined') container = SPSocialConnectorCommon.getWizardContainer();
            if(container) {
                if(typeof(sourcenode) != 'undefined') {

                    if(sourcenode != null) {
                        fnvshobj(sourcenode, container.id);
                    } else {
                        // Place at center if not already positioned.
                        if(container.style.top == '') {
                                placeAtCenter(container);
                        }
                    }
                }
                container.show();
            }
        },

        hideWizardContainer : function() {
            if(typeof(container) == 'undefined') container = SPSocialConnectorCommon.getWizardContainer();
            if(container) {
                    container.hide();
            }
        },	

        /** Select Wizard **/
        displaySelectWizard_DetailView : function(sourcemodule, recordid) {
            var sourcenode = null;			
            SPSocialConnectorCommon.displaySelectWizard(sourcenode, sourcemodule, recordid);
        },

        displaySelectWizard : function(sourcenode, sourcemodule, recordid) {
            var idstring = false;

            // Record id not sent directly? Could be from ListView
            if(typeof(recordid) == 'undefined' || recordid == null || recordid == '') {
                var excludedRecords = document.getElementById("excludedRecords").value;
                var select_options = document.getElementById('allselectedboxes').value;
                var searchurl = document.getElementById('search_url').value;
                var numOfRows = document.getElementById('numOfRows').value;
                var viewid = getviewId();
                if(select_options != 'all') {
                    var x = select_options.split(';');
                    var count = x.length;

                    if(count > 1) {
                            idstring = select_options;
                    } else {
                            alert(alert_arr.SELECT);
                            return false;
                    }
                } else {
                    idstring = select_options;
                    count = numOfRows;
                }
            } else {
                // Record id sent? Could be from DetailView
                idstring = recordid;
            }
            if(count > getMaxMassOperationLimit()) {
                var confirm_str = alert_arr.MORE_THAN_500;
                if(confirm(confirm_str)) {
                    var confirm_status = true;
                } else {
                    return false;
                }
            } else {
                confirm_status = true;
            }

            if(confirm_status) {

                if(idstring) {
                    var url = 'module=SPSocialConnector&action=SPSocialConnectorAjax&ajax=true&file=SPSocialConnectorSelectWizard';
                    url += '&sourcemodule=' + encodeURIComponent(sourcemodule);
                    url += '&idstring=' + encodeURIComponent(idstring);
                    url += '&excludedRecords=' + encodeURIComponent(excludedRecords);
                    url += '&viewname=' +encodeURIComponent(viewid);
                    url += '&searchurl=' +encodeURIComponent(searchurl);

                    new Ajax.Request('index.php', {
                        queue: {
                            position: 'end',
                            scope: 'command'
                        },
                        method: 'post',
                        postBody:url,
                        onComplete: function(response) {                   
                            SPSocialConnectorCommon.buildSelectWizard(response.responseText, sourcenode);
                        }
                    });
                }
            }
        },

        buildSelectWizard : function(content, sourcenode) {
            var container = SPSocialConnectorCommon.getWizardContainer();
            container.innerHTML = content;			
            SPSocialConnectorCommon.displayWizardContainer(container, sourcenode);			
        },

        hideSelectWizard : function() {
            SPSocialConnectorCommon.hideWizardContainer();
        },

        /** Compose Wizard **/
        displayComposeWizard : function(form, sourcenode) {

            var form_urltype_inputs = form.urltype;
            if(typeof form_urltype_inputs.length == 'undefined') {
                form_urltype_inputs = [form.urltype];
            }

            // Variables to submit for next wizard
            var urlfields = '';
            var idstring = form.idstring.value;
            var excludedRecords = form.excludedRecords.value;
            var viewid = form.viewid.value;
            var searchurl = form.searchurl.value;
            var sourcemodule = form.sourcemodule.value;

            // Gather the url fields selected.
            for(var index = 0; index < form_urltype_inputs.length; ++index) {
                if(form_urltype_inputs[index].checked) {
                        urlfields += form_urltype_inputs[index].value + ';';
                }
            }

            if(urlfields == '') {
                // TODO Show alert?
                return false;
            }			

            var url = 'module=SPSocialConnector&action=SPSocialConnectorAjax&ajax=true&file=SPSocialConnectorComposeWizard';			
            url += '&sourcemodule=' + encodeURIComponent(sourcemodule);			
            url += '&idstring=' + encodeURIComponent(idstring);
            url += '&excludedRecords=' + encodeURIComponent(excludedRecords);
            url += '&viewname=' +encodeURIComponent(viewid);
            url += '&searchurl=' +encodeURIComponent(searchurl);
            url += '&urlfields='+ encodeURIComponent(urlfields);
            
            new Ajax.Request('index.php', {
                queue: {position: 'end', scope: 'command'},
                method: 'post',
                postBody:url,
                onComplete: function(response) {					
                    SPSocialConnectorCommon.buildComposeWizard(response.responseText, sourcenode);					
                }
            });
        },

        buildComposeWizard : function(content, sourcenode) {
            var container = SPSocialConnectorCommon.getWizardContainer();
            container.innerHTML = content;			
            SPSocialConnectorCommon.displayWizardContainer(container, sourcenode);
        },

        hideComposeWizard : function() {
            SPSocialConnectorCommon.hideWizardContainer();
        },

        /** Send Operation **/
        triggerSendMsg : function(form) {

            var messageTextInput = form.message;
            if(messageTextInput.value == '') {
                messageTextInput.focus();
                return false; 
            }

            // Variables to submit for next wizard
            var urlfields = form.urlfields.value;
            var idstring = form.idstring.value;
            var excludedRecords = form.excludedRecords.value;
            var viewid = form.viewid.value;
            var searchurl = form.searchurl.value;
            var sourcemodule = form.sourcemodule.value;
            var message = messageTextInput.value;

            $('status').show();

            VtigerJS_DialogBox.block();

            var url = 'module=SPSocialConnector&action=SPSocialConnectorAjax&ajax=true&file=SPSocialConnectorSend';			
            url += '&sourcemodule=' + encodeURIComponent(sourcemodule);			
            url += '&idstring=' + encodeURIComponent(idstring);
            url += '&urlfields='+ encodeURIComponent(urlfields);
            url += '&message=' + encodeURIComponent(message);
            url += '&excludedRecords=' + encodeURIComponent(excludedRecords);
            url += '&viewname=' +encodeURIComponent(viewid);
            url += '&searchurl=' +encodeURIComponent(searchurl);
            new Ajax.Request('index.php', {
                queue: {position: 'end', scope: 'command'},
                method: 'post',
                postBody:url,
                onComplete: function(response) {
                    var win = window.open("index.php?module=SPSocialConnector&action=Popup&popuptype=send_msg&"+response.responseText+"","test","top=100, left=100, width=1000, height=590, resizable=0, scrollbars=0");                
                    SPSocialConnectorCommon.hideComposeWizard();			
                    $('status').hide();
                    VtigerJS_DialogBox.unblock();
                    var timer = setInterval(function() {   
                        if(win.closed) {  
                            clearInterval(timer);  
                            location.reload(); 
                        }  
                        }, 500); 

                }
            });

        },

        // Load profile from social nets. Include in Leads, Account, Contacts
        // Display iframe: enter URL
        displayEnterUrlWizard : function(sourcemodule, recordid) {

            var url = 'module=SPSocialConnector&action=SPSocialConnectorAjax&ajax=true&file=SPSocialConnectorEnterUrlWizard';
            url += '&sourcemodule=' + encodeURIComponent(sourcemodule);			
            url += '&recordid=' + encodeURIComponent(recordid);

            new Ajax.Request('index.php', {
                queue: {position: 'end', scope: 'command'},
                method: 'post',
                postBody:url,
                onComplete: function(response) {	
                        SPSocialConnectorCommon.buildEnterUrlWizard(response.responseText, sourcenode=null);					
                }
            });
        },

        buildEnterUrlWizard : function(content, sourcenode) {
            var container = SPSocialConnectorCommon.getWizardContainer();
            container.innerHTML = content;			
            SPSocialConnectorCommon.displayWizardContainer(container, sourcenode);
        },

        hideEnterUrlWizard : function() {
            SPSocialConnectorCommon.hideWizardContainer();
        },

        LoadProfile : function(form) {

            var messageTextInput = form.message;
            if(messageTextInput.value == '') {
                    messageTextInput.focus();
                    return false; 
            }

            var message = messageTextInput.value;
            var sourcemodule = form.sourcemodule.value;
            var recordid = form.recordid.value;

            var win = window.open("index.php?module=SPSocialConnector&action=Popup&popuptype=load_profile&URL="+message+
                    "&sourcemodule="+sourcemodule+"&recordid="+recordid+"","test","top=100, left=100, width=650, height=490, resizable=0, scrollbars=0");
            
            var timer = setInterval(function() {   
                if(win.closed) {  
                    clearInterval(timer);  
                    location.reload();  
                }  
                }, 500);  

        }
    };
}
