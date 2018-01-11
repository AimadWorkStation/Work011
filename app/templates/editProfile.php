<?php 
	include_once '../../config.php';
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$userid = $_POST['id'];
		$stmt = $con->prepare('select * from user where userid = ?');
		$stmt -> execute(array($userid));
		$row = $stmt->fetch();
 ?>
 	<script type="text/javascript">
 		$('#closeEditProfile').click(function(){
			$('.editProfile').fadeOut(1000);
		});
 	</script>
	 <div class="row pt-5 pb-5 mb-5 m-auto w-75 h-100 bg-dark position-relative">
	 	<div class="leftside col-7">
	 		<form>
	 			<h4>Aimad tchad</h4>
	 			<label class="d-block"><?php echo $row['username']; ?></label>
	 			<input class="w-75" type="text" id="userfullname" placeholder="<?php echo $row['fullname']; ?>">
	 			<label class="d-block mt-2">Old Password</label>
	 			<input class="w-75" type="password" id="useroldpassword" placeholder="Old Password">
	 			<label class="d-block mt-2">New Password</label>
	 			<input class="w-75" type="password" id="usernewpassord" placeholder="New Password">
	 			<input class="mt-4 btn btn-toolbar d-block ml-auto mr-auto" type="submit" onclick="" value="Submit">
	 		</form>
	 	</div>
	 	<div class="rightside col-5">
	 		<div class="photoprofil w-50 m-auto">
	 			<img src="app/img/user/<?php echo $row['image']; ?>" class="img-fluid">
	 		</div>
	 		<div class="costum mt-3">
				<span>choose file</span>
				<input type="file" id="upload">	
			</div>
			<span class="d-block mt-1" id="filename"></span>
	 	</div>
	 	<i class="fa fa-close fa-2x position-absolute" id='closeEditProfile'style="top: 7px;
	    right: 10px;font-size: 1.4em;cursor: pointer"></i>
	</div>
<?php } ?>