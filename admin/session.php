<?php
	require_once "../configure/config.php";
	session_start(); 
	
	if (!isset($_SESSION['admin_id'])) {
		header('Location: ../index');
	}

?>