<?php 

	include_once '../../config.php';

	$str = $_POST['str'];
	$stmt = $con -> prepare("select username from user where username = '". $str ."'");
	$stmt -> execute();
	$count = $stmt -> rowCount();
	if($count > 0){
		echo "existe";
	}
	else{
		echo "notExiste";
	}

