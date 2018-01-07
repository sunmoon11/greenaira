<?php
/**
 *
 * Payment gateways admin values
 * This is pulled into the WP backend admin pages
 * under the Ads gateways page
 *
 *
 * Array param definitions are as follows:
 * name    = field name
 * desc    = field description
 * tip     = question mark tooltip text
 * id      = database column name or the WP meta field name
 * css     = any on-the-fly styles you want to add to that field
 * type    = type of html field
 * req     = if the field is required or not (1=required)
 * min     = minimum number of characters allowed before saving data
 * std     = default value. not being used
 * js      = allows you to pass in javascript for onchange type events
 * vis     = if field should be visible or not. used for dropdown values field
 * visid   = this is the row css id that must correspond with the dropdown value that controls this field
 * options = array of drop-down option value/name combo
 *
 *
 */


$options_gateways = array (

    array( 'type' => 'tab', 'tabname' => __( 'PayPal', APP_TD ), 'id' => '' ),

              array(	'name' => __( 'PayPal Options', APP_TD ),
                        'type' => 'title',
                        'id' => ''),

               array(   'name' => '<img src="'.get_bloginfo('template_directory').'/images/paypal-lg.png" />',
                        'type' => 'logo',
                        'id' => ''),

               array(   'name' => __( 'Enable PayPal', APP_TD ),
                      'desc' => sprintf( __( "You must have a <a target='_new' href='%s'>PayPal</a> account setup before using this feature.", APP_TD ), 'http://www.paypal.com/' ),
                        'tip' => __( 'Set this to yes if you want to offer PayPal as a payment option on your site. This is the most popular option. Note: the &quot;Charge for Listing Ads&quot; option on the pricing page must be set to yes for this option to work.', APP_TD ),
                        'id' => $app_abbr.'_enable_paypal',
                        'css' => 'width:100px;',
                       'std' => '',
                        'js' => '',
                        'type' => 'select',
                        'req' => '',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

              array(    'name' => __( 'PayPal Email', APP_TD ),
                        'desc' => '',
                       'tip' => __( 'Enter your PayPal account email address. This is where your money gets sent.', APP_TD ),
                        'id' => $app_abbr.'_paypal_email',
                       'css' => 'min-width:250px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => ''),

              array(  'name' => __( 'Business Logo', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Paste the URL of your web site or business logo image here if you would like it to appear at the top of the PayPal payment page (i.e. http://www.yoursite.com/logo.jpg)', APP_TD ),
                        'id' => $app_abbr.'_paypal_logo_url',
                       'css' => 'min-width:500px;',
                       'vis' => '',
                        'req' => '',
                        'min' => '',
                       'type' => 'text',
                        'std' => ''),

              array(   'name' => __( 'Enable PayPal IPN', APP_TD ),
                        'desc' => sprintf( __( "Your web host must support <a target='_new' href='%s'>fsockopen</a> otherwise this feature will not work. You must also enable IPN within your PayPal account. See our <a target='_new' href='%s'>tutorial</a> on enabling Instant Payment Notifications.", APP_TD ), 'admin.php?page=sysinfo', 'http://docs.appthemes.com/tutorials/setting-up-paypal-ipn/' ),
                       'tip' => __( 'IPN stands for instant payment notification and is very powerful. Once a payment has been made via PayPal, it will then send your site a behind the scenes confirmation that the payment was made and instantly activate the ad. If your server does not support this option then your customer must click on a link and come back to your site before the ad will be activated.', APP_TD ),
                       'id'  => $app_abbr.'_enable_paypal_ipn',
                        'css' => 'width:100px;',
                        'std' => '',
                        'js' => '',
                       'type' => 'select',
                        'req' => '',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

              array(    'name' => __( 'Enable IPN Debug', APP_TD ),
                        'desc' => sprintf( __( "Debug PayPal IPN emails will be sent to %s.", APP_TD ), get_option('admin_email') ),
                        'tip' => __( 'If you would like to receive the raw IPN post responses from PayPal to see if payments are being processed correctly, check this box.', APP_TD ),
                        'id' => $app_abbr.'_paypal_ipn_debug',
                        'css' => '',
                        'type' => 'checkbox',
                        'req' => '',
                       'min' => '',
                       'std' => '',
                       'vis' => ''),

             array(    'name' => __( 'Sandbox Mode', APP_TD ),
                        'desc' => sprintf( __( "You must have a <a target='_new' href='%s'>PayPal Sandbox</a> account setup before using this feature.", APP_TD ), 'http://developer.paypal.com/' ),
                        'tip' => __( 'By default PayPal is set to live mode. If you would like to test and see if payments are being processed correctly, check this box to switch to sandbox mode.', APP_TD ),
                        'id' => $app_abbr.'_paypal_sandbox',
                        'css' => '',
                        'type' => 'checkbox',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => ''),
     array( 'type' => 'tabend', 'id' => '' ),
//
//    array( 'type' => 'tab', 'tabname' => __( 'Bank Transfer', APP_TD ), 'id' => '' ),
//
//               array(	'name' => __( 'Bank Transfer Options', APP_TD ),
//                        'type' => 'title',
//                        'id' => ''),
//
//               array(   'name' => '<img src="'.get_bloginfo('template_directory').'/images/bank-vault.png" />',
//                        'type' => 'logo',
//                        'id' => ''),
//
//               array(   'name' => __( 'Enable Bank Transfer', APP_TD ),
//                        'desc' => '',
//                        'tip' => __( 'Set this to yes if you want to offer cash payments via bank transfer as a payment option on your site. Note: the &quot;Charge for Listing Ads&quot; option on the pricing page must be set to yes for this option to work.', APP_TD ),
//                        'id' => $app_abbr.'_enable_bank',
//                        'css' => 'width:100px;',
//                        'std' => '',
//                        'js' => '',
//                        'type' => 'select',
//                        'req' => '',
//                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
//                                             'no'  => __( 'No', APP_TD ) )),
//
//                array(  'name' => __( 'Wire Instructions', APP_TD ),
//                        'desc' => __( 'Enter your specific bank wire instructions here. HTML can be used.', APP_TD ),
//                        'tip' => __( 'This will be shown on the payment page after a new ad has been submitted. You will then need to verify the money has been transfered and then manually approve the ad. Include your bank account name, number, routing number, IBAN, or whatever information is necessary to transfer money into your account. IMPORTANT: THE INFORMATION IN THIS TEXT BOX WILL BE SHOWN ON YOUR WEB SITE CONFIRMATION PAGE. APPTHEMES IS NOT LIABLE FOR ANY DAMAGES SO BE VERY CAREFUL WITH WHAT YOU INPUT HERE.', APP_TD ),
//                        'id' => $app_abbr.'_bank_instructions',
//                        'css' => 'width:500px;height:150px;',
//                        'vis' => '',
//                        'req' => '',
//                        'min' => '',
//                        'type' => 'textarea',
//                        'std' => ''),
//
//    array( 'type' => 'tabend', 'id' => '' ),
    
    array( 'type' => 'tab', 'tabname' => __( 'Voguepay', APP_TD ), 'id' => '' ),

               array(	'name' => __( 'Voguepay Options', APP_TD ),
                        'type' => 'title',
                        'id' => ''),

               array(   'name' => '<img src="'.get_bloginfo('template_directory').'/images/voguepay-logo.png" />',
                        'type' => 'logo',
                        'id' => ''),

               array(   'name' => __( 'Enable Voguepay', APP_TD ),
                        'desc' => sprintf( __( "You must have a <a target='_new' href='%s'>Voguepay</a> account setup before using this feature.", APP_TD ), 'http://www.voguepay.com/' ),
                        'tip' => __( 'Set this to yes if you want to offer PayPal as a payment option on your site. This is the most popular option. Note: the &quot;Charge for Listing Ads&quot; option on the pricing page must be set to yes for this option to work.', APP_TD ),
                        'id' => $app_abbr.'_enable_voguepay',
                        'css' => 'width:100px;',
                        'std' => '',
                        'js' => '',
                        'type' => 'select',
                        'req' => '',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

              array(    'name' => __( 'VoguePay Merchant ID', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter your VoguePay Merchant ID. This is where your money gets sent.', APP_TD ),
                        'id' => $app_abbr.'_voguepay_id',
                        'css' => 'min-width:250px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => ''),


    array( 'type' => 'tabend', 'id' => '' ),


//    array( 'type' => 'tab', 'tabname' => __( 'Google Checkout', APP_TD ) ),
//
//               array(	'name' => __( 'Google Checkout Options', APP_TD ),
//                        'type' => 'title',
//                        'id' => ''),
//
//               array(   'name' => '<img src="'.get_bloginfo('template_directory').'/images/google-lg.png" />',
//                        'type' => 'logo',
//                        'id' => ''),
//
//               array(   'name' => __( 'Enable Google Checkout', APP_TD ),
//                        'desc' => sprintf( __( "You must have a <a target='_new' href='%s'>Google Checkout</a> account setup before using this feature.", APP_TD ), 'http://checkout.google.com/' ),
//                        'tip' => __( 'Set this to yes if you want to offer Google Checkout as a payment option on your site. Note: the &quot;Charge for Listing Ads&quot; option on the pricing page must be set to yes for this option to work.', APP_TD ),
//                        'id' => $app_abbr.'_enable_gcheckout',
//                        'css' => 'width:100px;',
//                        'std' => '',
//                        'js' => '',
//                        'type' => 'select',
//                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
//                                             'no'  => __( 'No', APP_TD ) )),
//
//              array(    'name' => __( 'Merchant ID', APP_TD ),
//                        'desc' => '',
//                        'tip' => __( 'Enter your Google Checkout merchant ID. This is where your money gets sent.', APP_TD ),
//                        'id' => $app_abbr.'_gcheckout_merch_id',
//                        'css' => 'min-width:250px;',
//                        'type' => 'text',
//                        'req' => '',
//                        'min' => '',
//                        'std' => '',
//                        'vis' => ''),
//
//             array(     'name' => __( 'Merchant Key', APP_TD ),
//                        'desc' => '',
//                        'tip' => __( 'Enter your Google Checkout merchant key.', APP_TD ),
//                        'id' => $app_abbr.'_gcheckout_merch_key',
//                        'css' => 'min-width:250px;',
//                        'type' => 'text',
//                        'req' => '',
//                        'min' => '',
//                        'std' => '',
//                        'vis' => ''),
//
//              array(    'name' => __( 'Sandbox Mode', APP_TD ),
//                        'desc' => '',
//                        'tip' => __( 'By default Google checkout is set to live mode. If you would like to test and see if payments are being processed correctly, check this box to switch to sandbox mode.', APP_TD ),
//                        'id' => $app_abbr.'_google_sandbox',
//                        'css' => '',
//                        'type' => 'checkbox',
//                        'req' => '',
//                        'min' => '',
//                        'std' => '',
//                        'vis' => ''),
//
//    array( 'type' => 'tabend'),
);


global $action_gateway_values;

// hook for admin values
cp_action_gateway_values();

// merge the above options with any passed into via the hook
$options_gateways = array_merge( (array)$options_gateways, (array)$action_gateway_values);


?>