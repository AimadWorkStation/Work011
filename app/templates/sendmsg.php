<?php 
	//userid : userid,friendid : friendid,msg : msg
	include_once '../../config.php';
	$msg = $_POST['msg'];
	$userid = $_POST['userid'];
	$friendid = $_POST['friendid'];
	if(empty($msg)){
		echo "empty";
	}
	else{
		$stmt = $con -> prepare("insert into comment (idsender, idrecever,comment) values (?,?,?)");
		$stmt -> execute(array($userid,$friendid,$msg));
		echo "done";
	}
