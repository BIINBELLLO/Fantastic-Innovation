<?php
include("includes/connection.php");
session_start();
$get_email = $_GET['id'];
if (empty($get_email)) {
  header('location:all_parent.php');
}
else{
	$query = mysqli_query($conn, "DELETE FROM parents where Email = '$get_email'");
	if (!$query) {
		$_SESSION['err_msg'] = 'Error Encounter!!! contact Administartor for help';
		header('location:all_parent.php');
	}
	else{
		$delete =  mysqli_query($conn, "DELETE FROM log_in where Email = '$get_email'");
		if ($delete) {
			$_SESSION['mes'] = 'Parent info deleted sucessfully';
		header('location:all_parent.php');
		}
		
	}
}

?>