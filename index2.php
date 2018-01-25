<?php 
	session_start();
	global $pageTitle;
	global $pageHeader;
	global $login;
	if(isset($_SESSION['username'])){
		$pageTitle = ucfirst($_SESSION['username']). ' | ChatRoom';
		$pageHeader = 'Chat Room';
	}
	else{
		$pageHeader = '';
		$pageTitle = "login";
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
	<link rel="stylesheet" type="text/css" href="app/css/animate.css">
	<!-- my css codes -->
	<link rel="stylesheet" href="app/css/style.css">
	<!-- react framwork -->
	<script type="text/javascript" src="app/js/react.development.js"></script>
	<script type="text/javascript" src="app/js/react-dom.development.js"></script>
	<script type="text/javascript" src="app/js/browser-5.8.34.min.js"></script>
</head>
<body>
	<div class="header">
		<h1 class="text-center mt-2"><?php echo $pageHeader; ?></h1>
	</div>
	
	<div class="container loginPage">
		<!-- code login/singing page -->
		<?php 
			if(isset($_SESSION['username'])){ ?>
				<div id="chattroom">
					
				</div>	
			<?php }
			else{ ?>
				<div id="login">
					
				</div>
				<div id="app"></div>
			<?php }
		 ?>
		<!-- end code login singe in page -->
	</div>

	<div class="copyright text-center">
		<span style="font-size: 12px">Designed by EmadEddin, FounderOf NextG Workshare &copy; 2018</span>
	</div>	
	<!-- jquery labrery file -->

	<!-- positioning labrery -->
	<script src="app/js/jquery-3.2.1.min.js"></script>
	<script src="app/js/popper.min.js"></script>
	<script src="app/js/bootstrap.min.js"></script>
	<script type="text/babel" src='app/js/main.js'></script>
</body>
</html>