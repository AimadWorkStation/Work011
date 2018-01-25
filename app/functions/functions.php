<?php 
session_start();
require '..\classes\Users.php';
use App\Users;

if(isset($_POST['function'])){
	$f = $_POST['function'];

	switch ($f) {
		case 'checkUserLogin':
			/**
			 * Check user login
			 */
			$username = $_POST['username'];
			$password = $_POST['password'];
			$data = Users::checkUserLogin($username,$password);
			if($data == null){
				echo 'error';
			}else{
				$_SESSION['username'] = $data['username'];
				$_SESSION['id'] = $data['id'];
				echo 'no error';
			}
			/**
			 * Fin check user login
			 */
			break;
		
		// case 'value':
		// 	# code...
		// 	break;

		default:
			# code...
			break;
	}


}
