<?php
session_start();
include("includes/connection.php");
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
$err_msg = $suc_msg = '';	
		# code......
		$id = $_GET['id'];
		$delete = mysqli_query($conn, "Delete from request where id = '$id'");
	
		if ($delete) {
			# code...
				# code...
				$suc_msg = "Baby Declined Successful!";
				header("Location: sitter_accept_rqst.php");
			
			
		}else{
			$err_msg = "Sorry error occured!";
			header("Location: sitter_accept_rqst.php");
		}
		  ?>