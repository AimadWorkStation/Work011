<?php 
	include_once 'config.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['user'];
		$pass = sha1($_POST['pass']);
		$stmt = $con ->prepare('select userid,username,password from user where username = ? and password = ?');
		$stmt -> execute(array($username,$pass));
		$count = $stmt->rowCount();
		$row = $stmt->fetch();
		if($count > 0){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $row[0];
			//change status for online
			$stmt = $con ->prepare('update user set status = 1 where userid = ?');
			$stmt -> execute(array($_SESSION['id']));

			//end change status
			header('location:index.php');
		}
		else{
			echo "nothing";;
		}
	}

 ?>
<form class="login ml-auto mr-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h4>Admin Login</h4>
		<input class="form-control" type="text" name="user" id='username' placeholder="Username" autocomplete="off">
		<input class="form-control" type="password" name="pass" id='password' placeholder="Password" autocomplete="new-password">
		<input type="submit" value="Login" class="btn btn-primary">
		<span id='register'> Register</span>
</form>

<form class="login register ml-auto mr-auto" action="" >
		<h4  class="float-left mb-5">Registre</h4><span class="float-right"><i class="fa fa-close close"></i></span>
		<input class="form-control" type="text" id="user" placeholder="Username" autocomplete="off">
		<p id="usernamelength" style="color : #8b8ba9; display: none;">username must be more then 5 character</p>
		<p id="usernameExiste" style="color : red; display: none;">Sorry username already existe</p>
		<p id="usernameNotExiste" style="color : green; display: none;">userame valide</p>
		<input class="form-control" type="text" id="fullname" placeholder="Full Name" autocomplete="off" required>
		<input class="form-control" type="password" id="pass" placeholder="Password" autocomplete="off" required>
		<input type="text" value="Registre" class="btn btn-primary btn-block" autocomplete="off" id="adduser">
</form>