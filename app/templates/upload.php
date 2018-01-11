<?php 

if($_FILES['file']['name'] != ''){
	$test = explode('.',$_FILES['file']['name']);
	$extention = end($test);
	$name = rand(1000,9999) . '.' . $extention;
	$location = '../img/user/'.$name;
	move_uploaded_file($_FILES['file']['tmp_name'],$location);
	echo $_POST['id'];
}