<?php
if(!session_id()) {
	session_start();
}

if(isset($_POST["set_post_thumbnail"])){
	$x=0;
	while(isset($_SESSION["newmetadata"][$x])){
		$x++;
	}
	
	$_SESSION["newmetadata"][$x]=array(
		"attachment_id"=>$_POST["attachment_id"],
		"filepath"=>$_POST["filepath"]
	);
	
}
?>