<?php
if(!session_id()) {
	session_start();
}

if(isset($_POST["uploadtofolder"])){
	$_SESSION["target_path"]=$_POST["uploadtofolder"];
	exit;
}

$uploadedfile="files";
$target_path="/home1/jkcglos1/public_html/greenaira.com/wp-content/uploads/2016/03";

if(isset($_SESSION["target_path"])){
	$target_path=$_SESSION["target_path"];
}

$file_extentions=array('JPG', 'jpg', 'JPEG', 'jpeg', 'PNG', 'png', 'GIF', 'gif');

echo upload_files($uploadedfile, $target_path, $file_extentions);
	
function upload_files($uploadedfile, $target_path, $file_extentions){
			$valid_file=false;
			// Where the file is going to be placed 
			/* Add the original filename to our target path.  
			Result is "uploads/filename.extension*/
			if(isset($_FILES[$uploadedfile]))
			if($_FILES[$uploadedfile]['name']!=""){
				$file_name=basename( $_FILES[$uploadedfile]['name']);
				$file_info = pathinfo($_FILES[$uploadedfile]['name']); 
				$file_extension=$file_info['extension'];
				
				$file_name=str_replace(".".$file_extension, "", $file_name);
				
				$sufix="";
				$x=1;
				while(file_exists($target_path."/".$file_name.$sufix.".".$file_extension)){
					$sufix="-".$x;
					$x++;
				}
				
				$target_path=$target_path."/".$file_name.$sufix.".".$file_extension;
				$file_url="uploads/nigeria-classified/".$file_name.$sufix.".".$file_extension;
				$file_name=$file_name.$sufix.".".$file_extension;
				if(is_array($file_extentions) && count($file_extentions) >0 ) {
					foreach($file_extentions as $extention){
						if($file_extension==$extention)
							$valid_file=true;
					}
				}
				else if(!is_array($file_extentions)){
					if($file_extension==$extention)
						$valid_file=true;
				}
				if(!$valid_file){
					return false;
				}
				else if(move_uploaded_file($_FILES[$uploadedfile]['tmp_name'], $target_path)) {
					return $target_path;
				}
				else{
					 return false;
				}
			}
}