<?php
include("includes/connection.php");
session_start();
$get_email = $_GET['id'];
if (empty($get_email)) {
 header('location:all_babysiter.php');
}
else{
	$query = mysqli_query($conn, "DELETE FROM babysitter where Email = '$get_email'");
	if (!$query) {
		$_SESSION['err_msg'] = 'Error Encounter!!! contact Administartor for help';
		header('location:all_babysiter.php');
	}
	else{
		$delete =  mysqli_query($conn, "DELETE FROM log_in where Email = '$get_email'");
		if ($delete) {
			$_SESSION['mes'] = 'Babysitter info deleted sucessfully';
		header('location:all_babysiter.php');
		}
		
	}
}

?>