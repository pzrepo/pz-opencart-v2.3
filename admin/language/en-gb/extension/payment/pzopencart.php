<?php

// Heading
$_['heading_title']      	= 'PzOpencart'; 

// Text 
$_['text_payment']       	= 'Extensions';



//General Settings
$_['entry_route']    		= 'Route Traffic (%):';
$_['entry_route_pz']  	= 'PzOpencart';
$_['entry_route_cs'] 	= 'Cs Pay';
$_['help_route'] 			= '% of total transactions to route to each gateway. This option will come into effect only if pzopencart is configured.';

$_['entry_module']   		= 'Gateway Mode:';  

$_['entry_module_id'] 		='Test|Live';
$_['entry_geo_zone']     	= 'Geo Zone:';
//$_['entry_currency']		= 'Currency';

$_['entry_order_status'] 	= 'Success Order Status:';
$_['entry_order_fail_status'] = 'Cancel/Fail Order Status:';
$_['text_disabled']  		= 'Disabled';
$_['text_enabled']  		= 'Enabled';
$_['entry_status']       	= 'Status:';
$_['entry_sort_order']   	= 'Sort Order:';
$_['text_success']       	= 'Success: You have successfully modified Payment settings';
$_['help_total']       		= 'Order total on which this payment option to be available for checkout.';
//$_['help_currency']			= 'Three-letter ISO 4217 currency code required. e.g. USD,INR,etc.';

$_['entry_merchant']     	= 'Merchant ID:';
$_['entry_workingkey']      = 'Working Key:';
$_['entry_partner_name']    = 'Partner Name:';
$_['entry_partner_id']     	= 'Partner Id:';
$_['entry_ipaddress']     	= 'IP Address:';
$_['entry_partner_testurl']     	= 'Test URL:';
$_['entry_partner_liveurl']     	= 'Live URL:';


// Error
$_['error_permission']   	= 'Warning: You do not have permission to modify payment details!';
$_['error_route']     	    = 'Total %-ge value must be equal to 100!';
//Error Pz
$_['error_merchant']     	= 'Merchant Key Required!';
$_['error_salt']         	= 'Salt Required!';
//Error Cs
$_['error_module']   		= 'Invalid Mode';
$_['error_vanityrul']   	= 'Invalid payment or vanity url';
$_['error_accesskey']   	= 'Invalid access key';
$_['error_secretkey']   	= 'Invalid secret key';
//$_['error_currency']		= 'Currency code required.';
$_['error_status'] 			= 'Pzopencart parameters must be configured to enable this module.';



?>