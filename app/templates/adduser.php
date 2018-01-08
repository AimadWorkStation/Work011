<?php 
	include_once '../../config.php';

	$username = $_POST['user'];
	$fullname = $_POST['fullname'];
	$password = sha1($_POST['password']);

	$stmt = $con->prepare('insert into user (username, fullname,password) values(?,?,?)');
	$stmt -> execute(array($username,$fullname,$password));
	echo "true";
	
 ?>