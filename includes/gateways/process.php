<?php
/**
 * Payment processing script to store transaction
 * details into the database for PayPal ONLY
 * @package Ads
 *
 * TODO: rewrite script to support multiple payment gateways
 *
 */


// process the paypal transaction into the db table
function cp_process_paypal_transaction() {
	global $wpdb;

	if ( isset($_POST['txn_id']) ) {

		// since paypal sends over the date as a string, we need to convert it
		// into a mysql date format. There will be a time difference due to PayPal's
		// US pacific time zone and your server time zone
		$payment_date = strtotime( $_POST['payment_date'] );
		$payment_date = strftime( '%Y-%m-%d %H:%M:%S', $payment_date );


		//setup some values that are not always sent
		if ( isset( $_REQUEST['aid'] ) ) {
			$aid = trim( $_REQUEST['aid'] );
			$the_ad = get_post( $aid );
			$user_id = $the_ad->post_author;
		} else {
			$aid = '';
			$user_id = trim( $_REQUEST['uid'] );
		}

		$reason_code = ( isset($_POST['reason_code']) ) ? $_POST['reason_code'] : '';
		$pending_reason = ( isset($_POST['pending_reason']) ) ? $_POST['pending_reason'] : '';
		$parent_txn_id = ( isset($_POST['parent_txn_id']) ) ? $_POST['parent_txn_id'] : '';
		$test_ipn = ( isset($_POST['test_ipn']) ) ? $_POST['test_ipn'] : '';

		// check and make sure this transaction hasn't already been added
		$results = $wpdb->get_var( $wpdb->prepare( "SELECT txn_id FROM $wpdb->cp_order_info WHERE txn_id = %s LIMIT 1", appthemes_clean( $_POST['txn_id'] ) ) );

		if ( !$results ) {

			$data = array(
				'ad_id' => appthemes_clean($aid),
				'user_id' => appthemes_clean($user_id),
				'first_name' => appthemes_clean($_POST['first_name']),
				'last_name' => appthemes_clean($_POST['last_name']),
				'payer_email' => appthemes_clean($_POST['payer_email']),
				'residence_country' => appthemes_clean($_POST['residence_country']),
				'transaction_subject' => appthemes_clean($_POST['transaction_subject']),
				'item_name' => appthemes_clean($_POST['item_name']),
				'item_number' => appthemes_clean($_POST['item_number']),
				'payment_type' => appthemes_clean($_POST['payment_type']),
				'payer_status' => appthemes_clean($_POST['payer_status']),
				'payer_id' => appthemes_clean($_POST['payer_id']),
				'receiver_id' => appthemes_clean($_POST['receiver_id']),
				'parent_txn_id' => appthemes_clean($parent_txn_id),
				'txn_id' => appthemes_clean($_POST['txn_id']),
				'mc_gross' => appthemes_clean($_POST['mc_gross']),
				'mc_fee' => appthemes_clean($_POST['mc_fee']),
				'payment_status' => appthemes_clean($_POST['payment_status']),
				'pending_reason' => appthemes_clean($pending_reason),
				'txn_type' => appthemes_clean($_POST['txn_type']),
				'tax' => appthemes_clean($_POST['tax']),
				'mc_currency' => appthemes_clean($_POST['mc_currency']),
				'reason_code' => appthemes_clean($reason_code),
				'custom' => appthemes_clean($_POST['custom']),
				'test_ipn' => appthemes_clean($test_ipn),
				'payment_date' => $payment_date,
				'create_date' => current_time('mysql'),
			);

			$wpdb->insert( $wpdb->cp_order_info, $data );

		// ad transaction already exists so it must be an update via PayPal IPN (refund, etc)
		} else {

			//Updating transaction that was already found
			$data = array(
				'payment_status' => appthemes_clean($_POST['payment_status']),
				'mc_gross' => appthemes_clean($_POST['mc_gross']),
				'txn_type' => appthemes_clean($_POST['txn_type']),
				'reason_code' => appthemes_clean($reason_code),
				'mc_currency' => appthemes_clean($_POST['mc_currency']),
				'test_ipn' => appthemes_clean($_POST['test_ipn']),
				'create_date' => $payment_date,
			);

			$wpdb->update( $wpdb->cp_order_info, $data, array( 'txn_id' => $_POST['txn_id'] ) );

		}

	}

}
add_action( 'cp_process_transaction_entry', 'cp_process_paypal_transaction' );


cp_process_transaction_entry();


// prepare array with transaction data
function cp_prepare_transaction_entry($order_vals) {
	global $wpdb;

	if ( is_array($order_vals) ) {

		if(isset($order_vals['post_id']))
			$trdata['ad_id'] = $order_vals['post_id'];

		$trdata['payment_type'] = $order_vals['cp_payment_method'];
		$trdata['payment_status'] = 'Pending';
		$trdata['txn_id'] = $order_vals['oid'];
		$trdata['transaction_subject'] = $order_vals['oid'];
		$trdata['custom'] = $order_vals['oid'];
		$trdata['item_name'] = $order_vals['item_name'];
		$trdata['item_number'] = $order_vals['item_number'];
		$trdata['mc_gross'] = $order_vals['item_amount'];
		$trdata['mc_currency'] = get_option('cp_curr_pay_type');

		if ( isset($order_vals['user_id']) ) {
			$the_user = get_userdata($order_vals['user_id']);
		} else {
			$orders = get_user_orders('', $order_vals['oid']);
			if ( !empty($orders) ) {
				$user_id = get_order_userid($orders); 
				$the_user = get_userdata($user_id);
			}
		}

		if ( $the_user ) {
			$trdata['user_id'] = $the_user->ID;
			$trdata['first_name'] = $the_user->first_name;
			$trdata['last_name'] = $the_user->last_name;
			$trdata['payer_email'] = $the_user->user_email;
		}

		return $trdata;

	} else {
		return false;
	}

}



// insert/update transaction data into the db table
function cp_add_transaction_entry($trdata) {
	global $wpdb;

	//required unique transaction identificator
	if ( isset($trdata['txn_id']) ) {

		if(isset($trdata['payment_date'])){
			// convert date format from ex. "m/d/Y H:i:s" to default WP "Y-m-d H:i:s"
			$trdata['payment_date'] = strtotime( $trdata['payment_date'] );
			$trdata['payment_date'] = strftime( '%Y-%m-%d %H:%M:%S', $trdata['payment_date'] );
		} else {
			$trdata['payment_date'] = date("Y-m-d H:i:s");
		}
		$trdata['create_date'] = date("Y-m-d H:i:s");

		$order_table = $wpdb->cp_order_info;
		$where = array( 'txn_id' => $trdata['txn_id'] );

		// check and make sure this transaction hasn't already been added
		$results = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM {$order_table} WHERE txn_id = %s LIMIT 1", $trdata['txn_id'] ) );

		if ( !$results ) {

			$allowed_fields = array( 'ad_id', 'user_id', 'first_name', 'last_name', 'payer_email', 'street', 'city', 'state', 'zipcode', 'residence_country', 'transaction_subject', 'memo', 'item_name', 'item_number', 'quantity', 'payment_type', 'payer_status', 'payer_id', 'receiver_id', 'parent_txn_id', 'txn_id', 'txn_type', 'payment_status', 'pending_reason', 'mc_gross', 'mc_fee', 'tax', 'exchange_rate', 'mc_currency', 'reason_code', 'custom', 'test_ipn', 'payment_date', 'create_date' );
			$data = array();

			foreach( $allowed_fields as $field ) {
				if ( !isset($trdata[$field]) )
					$trdata[$field] = '';

				$data[$field] = $trdata[$field];
			}

			$insert = $wpdb->insert( $order_table, $data );

			if ( $insert )
				return $wpdb->insert_id;
			else
				return false;

		} else {

			$allowed_fields = array( 'item_number', 'item_name', 'txn_type', 'payment_status', 'mc_gross', 'mc_currency', 'reason_code', 'test_ipn', 'payment_date' );
			$data = array();

			foreach( $allowed_fields as $field )
				if ( isset($trdata[$field]) )
					$data[$field] = $trdata[$field];

			$update = $wpdb->update( $order_table, $data, $where );

			if ( $update )
				return $results;
			else
				return false;

		}

	} else {
		return false;
	}

}


?>
