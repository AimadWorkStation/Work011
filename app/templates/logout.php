<?php 
	session_start();
	session_unset();
	session_destroy();
	include_once '../../config.php';
	//change status for offline
	$stmt = $con ->prepare('update user set status = 0');
	$stmt -> execute();
	
	
	// $page = "../../index.php";
	// $sec = "2";
	// header("Refresh: $sec; url=$page");
	exit();