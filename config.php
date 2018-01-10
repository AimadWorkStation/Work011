<?php 

	$dsn = 'mysql:host=localhost;dbname=chat_interface';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try {
		
		$con = new PDO($dsn,$user,$pass,$option);
		$con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		
	}

	







		// $dsn = 'mysql:host=mysql12.000webhost.com;dbname=id4233531_chat_interface';
	// $user = 'id4233531_youritchad';
	// $pass = '******';
	// $option = array(
	// 	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	// );

	// try {
		
	// 	$con = new PDO($dsn,$user,$pass,$option);
	// 	$con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	// } catch (Exception $e) {
		
	// }