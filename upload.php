<?php
include('../../../wp-load.php');
	// $filename should be the path to a file in the upload directory.
$filepath = $_POST["imgurl"];

// The ID of the post this attachment is for.
$parent_post_id = 0;

$filename=basename($filepath);
// Check the type of file. We'll use this as the 'post_mime_type'.
$filetype = wp_check_filetype( $filename, null );

// Get the path to the upload directory.
$wp_upload_dir = wp_upload_dir();


// Prepare an array of post data for the attachment.
$attachment = array(
	'guid'           => $wp_upload_dir["url"] . '/' . $filename, 
	'post_mime_type' => 'image/jpeg',
	'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename),
	'post_content'   => '',
	'post_status'    => 'inherit'
);


// Insert the attachment.
$attach_id = wp_insert_attachment( $attachment, $filepath, 0);

if ( !is_wp_error( $attach_id ) ) {
		echo $attach_id;
} else {
	echo "0";
}
/*
// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
require_once( ABSPATH . 'wp-admin/includes/image.php' );

// Generate the metadata for the attachment, and update the database record.
$attach_data = wp_generate_attachment_metadata( $attach_id, $filepath );
wp_update_attachment_metadata( $attach_id, $attach_data );

set_post_thumbnail( $parent_post_id, $attach_id );*/
?>