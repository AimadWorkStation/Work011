<?php 
	include_once '../../config.php';

if($_FILES['file']['name'] != ''){
	$test = explode('.',$_FILES['file']['name']);
	$extention = end($test);
	$name = rand(1000,9999) . '.' . $extention;
	$location = '../img/user/'.$name;
	move_uploaded_file($_FILES['file']['tmp_name'],$location);
	$stmt = $con -> prepare('update user set image = ? where userid = ?');
	$stmt -> execute(array($name,$_POST['id']));
	echo $name;
}
if($_POST['oldimage'] != 'default.jpg'){
	$imageToDelete = '../img/user/'.$_POST['oldimage'];
    if (file_exists($imageToDelete)) {
        unlink($imageToDelete);
    } else {
        // File not found.
    }
}