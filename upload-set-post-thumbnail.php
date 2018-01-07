<?php
if(!session_id()) {
	session_start();
}

include('../../../wp-load.php');

if(isset($_POST["set_post_thumbnail"])){
	$x=0;
	while(!isset($_SESSION["newmetadata"][$x])){
		$_SESSION["newmetadata"][$x]=array(
			"attachment_id"=>$_POST["attachment_id"],
			"filepath"=>$_POST["filepath"]
		);
	}
	
	print_r($_SESSION["newmetadata"]);
	/*// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	// Generate the metadata for the attachment, and update the database record.
	$attach_data = wp_generate_attachment_metadata( $_POST["attachment_id"], $_POST["filepath"] );
	wp_update_attachment_metadata( $_POST["attachment_id"], $attach_data );*/
}
?>