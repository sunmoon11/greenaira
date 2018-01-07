<?php
/*
Template Name: Membership Confirm
*/

/**
 * This script is the landing page after payment has been processed
 * by PayPal or other gateways. It is expecting a unique ad id which
 * was randomly generated during the ad submission. It is stored in
 * the cp_sys_ad_conf_id custom field. If this page is loaded and no
 * matching ad id is found or the ad is already published then
 * show an error message instead of doing any db updates
 *
 */


global $wpdb, $current_user;

$oid = isset($_REQUEST['oid']) ? appthemes_clean($_REQUEST['oid']) : false;
$order = get_user_orders($current_user->ID, $oid);

//if the order was found by OID, setup the order details into the $order variable
if(isset($order) && $order) $order = get_option($order);

//make sure the order sent from payment gateway is logged in the database and that the current user created it
if(isset($order['order_id']) && $order['order_id'] == $oid && $order['user_id'] == $current_user->ID) {

	$order_processed = appthemes_process_membership_order($current_user, $order);
	//send email to user
	if($order_processed)
		cp_owner_activated_membership_email($current_user, $order_processed);

} else {

	$order_processed = false;
	// check and make sure this transaction hasn't already been added
	$sql = "SELECT * FROM $wpdb->cp_order_info WHERE custom = '%s' LIMIT 1";

	$results = $wpdb->get_row( $wpdb->prepare($sql, $oid) );

	if( $results ) $order_processed = 'IPN';

}
?>


<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<!-- full block -->
			<div class="shadowblock_out">

				<div class="shadowblock">

					<div id="step3"></div>

					<?php
						// already processed order, most likely processed by IPN
						if($order_processed == 'IPN') {
					?>

							<h2 class="dotted"><?php _e( 'Thank You!', APP_TD ); ?></h2>

							<div class="thankyou">

								<h3><?php _e( 'Your payment has been processed and your membership status should now be active.', APP_TD ); ?></h3>

								<p><?php echo sprintf( __( 'Visit your <a href="%1$s">dashboard</a> to review your membership status details.', APP_TD ), CP_DASHBOARD_URL ); ?></p>

								<div class="pad50"></div>

							</div>

					<?php
						} elseif($order_processed) { // only proceed is order was processed correctly

							if (file_exists(TEMPLATEPATH . '/includes/gateways/process.php'))
								include_once (TEMPLATEPATH . '/includes/gateways/process.php');
					?>

							<h2 class="dotted"><?php _e( 'Thank You!', APP_TD ); ?></h2>

							<div class="thankyou">

								<h3><?php _e( 'Your payment has been processed and your membership status should now be active.', APP_TD ); ?></h3>

								<p><?php _e( 'Visit your dashboard to review your membership status details.', APP_TD ); ?></p>

								<ul class="membership-pack">
									<li><strong><?php _e( 'Membership Pack:', APP_TD ); ?></strong> <?php echo stripslashes($order_processed['pack_name']); ?></li>
									<li><strong><?php _e( 'Membership Expires:', APP_TD ); ?></strong> <?php echo appthemes_display_date($order_processed['updated_expires_date']); ?></li>
									<li><a href="<?php echo CP_MEMBERSHIP_PURCHASE_URL; ?>"><?php _e( 'Renew or Extend Your Membership Pack', APP_TD ); ?></a></li>
								</ul>

								<div class="pad50"></div>

							</div>

					<?php } else { ?>

							<h2 class="dotted"><?php _e( 'An Error Has Occurred', APP_TD ); ?></h2>

							<div class="thankyou">

								<p><?php _e( 'There was a problem processing your membership or payment was not successful. This error can also occur if you refresh the payment confirmation page. If you believe your order was not completed successfully, please contact the site administrator.', APP_TD ); ?></p>

								<div class="pad50"></div>

							</div>

					<?php } ?>

				</div><!-- /shadowblock -->

			</div><!-- /shadowblock_out -->

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
