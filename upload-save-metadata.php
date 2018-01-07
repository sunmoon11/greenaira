<?php
if(!session_id()) {
	session_start();
}

include('../../../wp-load.php');

if(isset($_POST["save_metadata"]) && isset($_SESSION["newmetadata"])){
	update_img_meta_data($_SESSION["newmetadata"]);
	unset($_SESSION["newmetadata"]);
}

if (!function_exists('update_img_meta_data')) {
	function update_img_meta_data($newmetadata=array()){
		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		
		if(!empty($newmetadata) && is_array(($newmetadata))){
			foreach($newmetadata as $metadata){
			
				// Generate the metadata for the attachment, and update the database record.
				$attach_data = wp_generate_attachment_metadata( $metadata["attachment_id"], $metadata["filepath"] );
				wp_update_attachment_metadata( $metadata["attachment_id"], $attach_data );
			}
		}
	}
}
?>