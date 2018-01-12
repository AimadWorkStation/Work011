<?php 
	session_start();
	include_once '../../config.php';

	$str = $_POST['str'];
	$stmt = $con->prepare('select * from user where username like "%'. $str .'%" and username != "'. $_SESSION['username'] .'" ');

	$stmt -> execute();

	while ($row = $stmt->fetch()) { 
		?>
		<li class="row marginit" onclick="addtofriendlist(<?php echo $row['userid']; ?>);">
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

	<?php }; ?>