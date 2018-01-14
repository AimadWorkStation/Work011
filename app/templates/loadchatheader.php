<?php 
session_start();
	if(isset($_POST['id'])){
		include_once '../../config.php';
		//header chat statement
		$idfriend = $_POST['id'];
		$iduser = $_SESSION['id'];
		$stmt = $con -> prepare("SELECT * from user where userid = $idfriend ");
		$stmt -> execute();
		$row = $stmt -> fetch();
		//body chat statement
		$stmt2 = $con -> prepare("SELECT * from comment where (idsender = $idfriend and idrecever = $iduser ) || (idsender = $iduser and idrecever = $idfriend)");
		$stmt2 -> execute();
		$count = $stmt2 -> rowCount();
		//variables to return
	
 ?>

 	<div class="col-3 pr-0">
	<img src="app/img/user/<?php echo $row['image']; ?>" class="img-fluid rounded-circle border border-secondary">
	</div>
	<div class="col-9 mt-4">
		<span><?php echo $row['fullname']; ?></span>
		<span class="d-block" id="numberMessage">Messages <?php echo $count;?></span>
	</div>

<?php }; ?>