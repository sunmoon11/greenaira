<?php

include "wp-load.php";

get_header();

global $wpdb;

if(isset($_GET['type'])=='first_time'){
	
	
$transaction_id = $_REQUEST['transaction_id'];

$get_payment_detail = file_get_contents('https://voguepay.com/?v_transaction_id=demo-1404631560&type=json');

$payment_detail = json_decode($get_payment_detail, true);

echo "<pre>";

print_r($payment_detail);

echo "</pre>";

	$merchant_id = $payment_detail['merchant_id'];

	$transaction_id = $payment_detail['transaction_id'];

	$payment_requested = $payment_detail['total'];

	$paid_payment = $payment_detail['total_paid_by_buyer'];

	$total_credited_to_merchant = $payment_detail['total_credited_to_merchant'];

	$payment_memo = $payment_detail['memo'];

	$payment_status = $payment_detail['status'];

	$payment_date_time = $payment_detail['date'];

	$payment_refrer = $payment_detail['referrer'];

	$payment_trough = $payment_detail['method'];

	$admin_commistion = get_option('projectTheme_fee_after_paid');

		

	//geting actual bid price of project

	$query_string = parse_url($payment_refrer, PHP_URL_QUERY);

	$get_vars = explode("=", $query_string);

	$project_id = $get_vars[1];

	

	//get winning bid

	$winner_query = "SELECT * FROM `flnc_project_bids` WHERE `pid` = ".$project_id." AND `winner` = '1'";

	$winner_db	=	mysql_query($winner_query) or die( mysql_error() );

	$result = mysql_fetch_array($winner_db);

	$project_actual_bid = $result['bid'];

	$freelancer_id = $result['uid'];

	$payment_to_freelancer = $project_actual_bid * ((100-$admin_commistion) / 100);

	$admin_profit  = $total_credited_to_merchant - $payment_to_freelancer;

	$project_client_id = get_post_field( 'post_author', $project_id );

	

	//Prevent Dupicate Entry

	$select_transaction_id = "SELECT * FROM `project_payment` WHERE `transaction_id` = '".$transaction_id."'";

	$transaction_id_query  = mysql_query($select_transaction_id) or die(mysql_error());

	$getting_result = mysql_fetch_row($transaction_id_query);

/*	if(!empty($getting_result)){

	  echo "Dupicate Entry";

	}else{ */

	// Insert Into Database

	$insert_payment = "INSERT INTO `project_payment`(`client_id`,

													`transaction_id`,

													`merchant_id`,

													`payment_requested`,

													`payment_desc`,

													`datemade`,

													`amount_get`,		

													`payment_status`,

													`admin_profit`,

													`freelancer_payment`,

													`freelancer_id`,

													`freelancer_bid_amnt`)

												VALUES(".$project_client_id.",

														'".$transaction_id."',

														'".$merchant_id."',

														'".$payment_requested."',

														'".$payment_memo."',

														'".$payment_date_time."',

														'".$paid_payment."',

														'".$payment_status."',

														'".$admin_profit."',

														'".$payment_to_freelancer."',

														".$freelancer_id.",

														'".$project_actual_bid."')";

		$insert_query = mysql_query($insert_payment) or die(mysql_query());

		

	// Update Clinet Payment

//	$update_client_payment = "UPDATE `flnc_postmeta` SET `meta_value` = 1 WHERE `meta_key` = 'paid_user' AND `post_id` = $project_id";

	//mysql_query($update_client_payment) or die(mysql_query());

	//}
       wp_redirect( 'http://www.worknpay.com/?p_action=choose_winner&&p_action=winner&&pid='.$_GET['pid'].'&&bid='.$_GET['bid'].'' ); 



	?>

<?php 



		if(function_exists('bcn_display'))

		{

		    echo '<div class="my_box3_breadcrumb"><div class="padd10">';	

		    bcn_display();

			echo '</div></div><div class="clear10"></div>';

		}



?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

        <div id="content">	

            <div class="padd10">

                <div class="box_title"><?php the_title(); ?></div>

                <div class="box_content post-content"> 

                    <?php the_content(); ?>			

                </div>

            </div>

        </div>

    <?php endwhile; // end of the loop. ?>



<div id="right-sidebar">

    <ul class="xoxo">

        <?php dynamic_sidebar('other-page-area'); ?>

    </ul>

</div>

</div>

</div>



	<?php

	echo "<table border='1' cellpadding='5'>";

	echo "<tr><td>Payment for Merchant ID </td><td>".$merchant_id."</td></tr>";

	echo "<tr><td>Transaction ID</td><td>".$transaction_id."</td></tr>";

	echo "<tr><td>Requested Payment</td><td>".$payment_requested."</td></tr>";

	echo "<tr><td>Payment Paid</td><td>".$paid_payment."</td></tr>";

	echo "<tr><td>Payment Credited To Merchant (after voguepay Chanrges)</td><td>".$total_credited_to_merchant."</td></tr>";

	

	echo "<tr><td>Payment Memo</td><td>".$payment_memo."</td></tr>";

	echo "<tr><td>Payment Status</td><td>".$payment_status."</td></tr>";

	echo "<tr><td>Payment Date &amp; Time</td><td>".$payment_date_time."</td></tr>";

	echo "<tr><td>Payment For</td><td>".$payment_refrer."</td></tr>";

	echo "<tr><td>Payment Through</td><td>".$payment_trough."</td></tr>";

	echo "</table>";
	
	
	


}else {
	
	

$transaction_id = $_REQUEST['transaction_id'];

$get_payment_detail = file_get_contents('https://voguepay.com/?v_transaction_id=demo-1404631560&type=json');

$payment_detail = json_decode($get_payment_detail, true);

echo "<pre>";

print_r($payment_detail);

echo "</pre>";

	$merchant_id = $payment_detail['merchant_id'];

	$transaction_id = $payment_detail['transaction_id'];

	$payment_requested = $payment_detail['total'];

	$paid_payment = $payment_detail['total_paid_by_buyer'];

	$total_credited_to_merchant = $payment_detail['total_credited_to_merchant'];

	$payment_memo = $payment_detail['memo'];

	$payment_status = $payment_detail['status'];

	$payment_date_time = $payment_detail['date'];

	$payment_refrer = $payment_detail['referrer'];

	$payment_trough = $payment_detail['method'];

	$admin_commistion = get_option('projectTheme_fee_after_paid');

		

	//geting actual bid price of project

	$query_string = parse_url($payment_refrer, PHP_URL_QUERY);

	$get_vars = explode("=", $query_string);

	$project_id = $get_vars[1];

	

	//get winning bid

	$winner_query = "SELECT * FROM `flnc_project_bids` WHERE `pid` = ".$project_id." AND `winner` = '1'";

	$winner_db	=	mysql_query($winner_query) or die( mysql_error() );

	$result = mysql_fetch_array($winner_db);

	$project_actual_bid = $result['bid'];

	$freelancer_id = $result['uid'];

	$payment_to_freelancer = $project_actual_bid * ((100-$admin_commistion) / 100);

	$admin_profit  = $total_credited_to_merchant - $payment_to_freelancer;

	$project_client_id = get_post_field( 'post_author', $project_id );

	

	//Prevent Dupicate Entry

	$select_transaction_id = "SELECT * FROM `project_payment` WHERE `transaction_id` = '".$transaction_id."'";

	$transaction_id_query  = mysql_query($select_transaction_id) or die(mysql_error());

	$getting_result = mysql_fetch_row($transaction_id_query);

/*	if(!empty($getting_result)){

	  echo "Dupicate Entry";

	}else{ */

	// Insert Into Database

	$insert_payment = "INSERT INTO `project_payment`(`client_id`,

													`transaction_id`,

													`merchant_id`,

													`payment_requested`,

													`payment_desc`,

													`datemade`,

													`amount_get`,		

													`payment_status`,

													`admin_profit`,

													`freelancer_payment`,

													`freelancer_id`,

													`freelancer_bid_amnt`)

												VALUES(".$project_client_id.",

														'".$transaction_id."',

														'".$merchant_id."',

														'".$payment_requested."',

														'".$payment_memo."',

														'".$payment_date_time."',

														'".$paid_payment."',

														'".$payment_status."',

														'".$admin_profit."',

														'".$payment_to_freelancer."',

														".$freelancer_id.",

														'".$project_actual_bid."')";

		$insert_query = mysql_query($insert_payment) or die(mysql_query());

		

	// Update Clinet Payment

	$update_client_payment = "UPDATE `flnc_postmeta` SET `meta_value` = 1 WHERE `meta_key` = 'paid_user' AND `post_id` = $project_id";

	mysql_query($update_client_payment) or die(mysql_query());

	//}




	?>

<?php 



		if(function_exists('bcn_display'))

		{

		    echo '<div class="my_box3_breadcrumb"><div class="padd10">';	

		    bcn_display();

			echo '</div></div><div class="clear10"></div>';

		}



?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

        <div id="content">	

            <div class="padd10">

                <div class="box_title"><?php the_title(); ?></div>

                <div class="box_content post-content"> 

                    <?php the_content(); ?>			

                </div>

            </div>

        </div>

    <?php endwhile; // end of the loop. ?>



<div id="right-sidebar">

    <ul class="xoxo">

        <?php dynamic_sidebar('other-page-area'); ?>

    </ul>

</div>

</div>

</div>



	<?php

	echo "<table border='1' cellpadding='5'>";

	echo "<tr><td>Payment for Merchant ID </td><td>".$merchant_id."</td></tr>";

	echo "<tr><td>Transaction ID</td><td>".$transaction_id."</td></tr>";

	echo "<tr><td>Requested Payment</td><td>".$payment_requested."</td></tr>";

	echo "<tr><td>Payment Paid</td><td>".$paid_payment."</td></tr>";

	echo "<tr><td>Payment Credited To Merchant (after voguepay Chanrges)</td><td>".$total_credited_to_merchant."</td></tr>";

	

	echo "<tr><td>Payment Memo</td><td>".$payment_memo."</td></tr>";

	echo "<tr><td>Payment Status</td><td>".$payment_status."</td></tr>";

	echo "<tr><td>Payment Date &amp; Time</td><td>".$payment_date_time."</td></tr>";

	echo "<tr><td>Payment For</td><td>".$payment_refrer."</td></tr>";

	echo "<tr><td>Payment Through</td><td>".$payment_trough."</td></tr>";

	echo "</table>";
	
	
	
	
	
	}
?>

<?php get_footer(); ?>?>