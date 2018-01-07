<?php

function voguepay_gateway_process( $order_vals ) {
	global $gateway_name, $app_abbr, $post_url;

	// if this gateway wasn't selected then exit
	if ( $order_vals['cp_payment_method'] != 'voguepay' )
		return;
	// is this a test transaction?
	if ( get_option($app_abbr.'_enable_voguepay') == true )
		$post_url = 'https://voguepay.com/pay/';

	// if ipn enabled we don't need post data from user
	$rm = ( get_option('cp_enable_voguepay') == 'yes' ) ? 0 : 2;
?>    
	<form method="POST" action="<?php echo esc_url( $post_url ); ?>">			
			<input type="hidden" name="v_merchant_id" value='demo' />
			<input type="hidden" name="merchant_ref" value='234-567-890' />
			<input type="hidden" name="memo" value='Ads on Greenaire Site' />
			<input type="hidden" name="custom" value="<?php echo esc_attr( $order_vals['oid'] ); ?>" />
			<input type="hidden" name="item_1" value="<?php echo esc_attr( $order_vals['item_name'] ); ?>" />
			<input type="hidden" name="price_1" value="<?php echo esc_attr( $order_vals['item_amount'] ); ?>" />				
			<input type="hidden" name="total" value="<?php echo esc_attr( $order_vals['item_amount'] ); ?>" />
			<input type="hidden" name="rm" value="<?php echo esc_attr( $rm ); ?>" />			
			<center><input type='image' src='http://voguepay.com/images/buttons/buynow_blue.png' alt='Submit' /></center>
			<script type="text/javascript"> setTimeout("document.paymentform.submit();", 500); </script>			
			</form> 	
<?php
}
add_action( 'cp_action_gateway', 'voguepay_gateway_process', 10, 1 );
?>
<?php
function cp_voguepay_add_gateway_option() {
	global $app_abbr, $gateway_name;

	if ( get_option($app_abbr.'_enable_voguepay') == 'yes' )
		echo '<option value="voguepay">' . __( 'VoguePay', APP_TD ) . '</option>';

}
add_action( 'cp_action_payment_method', 'cp_voguepay_add_gateway_option' );
?>