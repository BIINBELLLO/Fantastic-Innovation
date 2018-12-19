<?php
session_start();
unset($_SESSION['User_Type']);
unset($_SESSION['gotten_email']);
header("Location: index.php");
?>