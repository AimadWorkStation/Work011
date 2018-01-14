
<?php 
session_start();
	if(isset($_POST['id'])){
		include_once '../../config.php';
		//header chat statement
		$idfriend = $_POST['id'];
		$iduser = $_SESSION['id'];
		//body chat statement
		$stmt = $con -> prepare("SELECT * from comment where (idsender = $idfriend and idrecever = $iduser ) || (idsender = $iduser and idrecever = $idfriend)");
		$stmt -> execute();
		//variables to return
		while ($row = $stmt -> fetch()) {
			if($row['idsender'] == $idfriend){ ?>
				<li class="message-local">
					<?php echo $row['comment']; ?>
				</li>
	<?php		}
			else{ ?>
				<li class="message-remote">
					<?php echo $row['comment']; ?>
				</li>

	<?php		}
		} 
	};	
 ?>
