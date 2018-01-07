<?php 
	session_start();
	global $pageTitle;
	global $pageHeader;
	global $login;
	if(isset($_SESSION['Username'])){
		$pageTitle = $_SESSION['username'];
		$pageHeader = 'Chat Room';
		$login = true;
	}
	else{
		$pageHeader = '';
		$pageTitle = "login";
		$login = false;
	}
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="NextG Orgaisation">
  	<meta name="keywords" content="marketing,busiess,designe,Plans,plan,web,devloppement,html,css,jquery">
  	<meta name="author" content="NextG AimadWorkShare">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?php echo $pageTitle;?></title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="app/css/bootstrap.min.css">
	<link rel="stylesheet" href="app/css/font-awesome.min.css">
	<!-- my css codes -->
	<link rel="stylesheet" href="app/css/style.css">
</head>
<body>
	<h1 class="text-center"><?php echo $pageHeader; ?></h1>
	<div class="container loginPage">
		<!-- code login/singing page -->
		<?php 
			if($login){
				echo "Aimad";
			}
			else{
				echo "NoOne";
			}
		 ?>
		<!-- end code login singe in page -->
	</div>	
	
	
	
	<!-- jquery labrery file -->

	<!-- positioning labrery -->
	<script src="app/js/jquery-3.2.1.min.js"></script>
	<script src="app/js/popper.min.js"></script>
	<script src="app/js/bootstrap.min.js"></script>
	<script src='app/js/plugins.js'></script>
	<script src='app/js/bundle.js'></script>	
</body>
</html>