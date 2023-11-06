<?php
	require_once "../class/configure/config.php";
	session_start(); 
    //print_r("123");
	
	if (!isset($_SESSION['admin_username'])) {
		header('Location: ../class/login.php');
	}
?>