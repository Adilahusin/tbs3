<?php
	require_once "../class/configure/config.php";
	session_start(); 
    //print_r("123");
	
	if (!isset($_SESSION['user_id'])) {
		header('Location: ../class/login.php');
	}
?>