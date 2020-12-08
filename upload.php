<?php
// ob_start();
// print_r($_GET);
// print_r($_COOKIE);
$gruppenFolder  = $_GET['folder'];
$output_dir = "src/".$gruppenFolder."/";

if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];

	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	// $fileName = $_FILES["myfile"]["name"];
 	 	$fileName = $_GET['userID']. '.json';
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
		$ret[]= $fileName;
			//send to saon and save char-ID to user
			require_once('functions.php');
			require_once('./class/class_dicechamber.php');
			$file = file_get_contents($output_dir.$fileName);
			// $file = file_get_contents($output_dir.$_GET['userID']);
			// print_r($file);
			$Saon = new DiceChamberSaon;
			
			$imageFile = json_decode($file);
			$imageFile = $imageFile->avatar;
			$Saon->placeUserimageSaon($imageFile,$_GET['folder'],$_GET['userID']);
			$Saon->sendCharToSaon($file,$_GET['userID'], $_GET['folder']);
	}


	// echo json_encode($file);

 }
//  file_put_contents('test.html', ob_get_contents());
 ?>