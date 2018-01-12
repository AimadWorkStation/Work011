<?php 
	session_start();
	include_once '../../config.php';
	if(isset($_SESSION['id'])){
		if($_POST['id'] == '*'){
			$id = $_SESSION['id'];
			$stmt = $con->prepare('select idrecever from comment where idsender = "'. $id .'" order by post_time');

			$stmt -> execute();

			while ($row = $stmt->fetch()) { 
				$stmt2 = $con->prepare('select * from user where userid = "'. $row[0] .'"');
				$stmt2 -> execute();
				$row2 = $stmt2->fetch();
				?>
				<li class="row" onclick="loadchatbody(<?php echo $row2['userid']; ?>);" >
					<div class="img col-4">
						<img src="app/img/user/<?php echo $row2['image'] ?>" class="img-fluid rounded-circle border border-secondary">
					</div>
					<div class="info col-8 mt-4">
						<span><?php echo $row2['fullname'] ?></span><span> (<?php echo $row2['username'] ?>)</span>
						<span style="display: block;"><?php 
							 if($row2['status'] == 0){ ?>
		 						<i class="fa fa-check-circle" style="color: white"> offline</i></span>
							<?php	}else {  ?>
							<i class="fa fa-check-circle" style="color: green"> online</i></span>
							<?php	}
						 ?>
					</div>
			  </li>
		<?php }//while
				}//if $_POST['id'] == '*'
				else{
						$stmt = $con->prepare('select * from user where userid = "'. $_POST['id'] .'"');

						$stmt -> execute();

						$row = $stmt->fetch();
						?>
							<li class="row" onclick="loadchatbody(<?php echo $row['userid']; ?>);" >
									<div class="img col-4">
										<img src="app/img/user/<?php echo $row['image'] ?>" class="img-fluid rounded-circle border border-secondary">
									</div>
									<div class="info col-8 mt-4">
										<span><?php echo $row['fullname'] ?></span><span> (<?php echo $row['username'] ?>)</span>
										<span style="display: block;"><?php 
											 if($row['status'] == 0){ ?>
						 						<i class="fa fa-check-circle" style="color: white"> offline</i></span>
											<?php	}else {  ?>
											<i class="fa fa-check-circle" style="color: green"> online</i></span>
											<?php	}
										 ?>
									</div>
							  </li>
					<?php 
		
			}//else

		};//if isset($_SESSION['id'])
		?>	


