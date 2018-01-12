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
 		

 		//upload img vaidation
			function chnageimage(id,oldimg) {
				var file = $('#upload')[0].files[0];
				var fileName = file.name;
				var fileSize = file.size;
				var extention = fileName.split('.').pop().toLowerCase();
		  		if(jQuery.inArray(extention, ['jpg','jpeg','png']) == -1){
		  			$('#filename').text('File has to be an image');
		  		}
		  		else if(fileSize > 700000){
		  			$('#filename').text('size must be < 700ko');
		  		}
		  		else{
		  			var form_data = new FormData();
		  			form_data.append('file',file);
		  			form_data.append('id',id);
		  			form_data.append('oldimage',oldimg);	
		  			$.ajax({
		  				url : 'app/templates/upload.php',
		  				method : "POST",
		  				data : form_data,
		  				contentType : false,
		  				cache : false,
		  				processData : false,
		  				beforeSend : function(){
							$('#filename').text("Uploading ...");
		  				},
		  				success : function(data){
		  					$('#filename').text(data);
		  					$('.photoprofil img').attr('src',"app/img/user/"+ data);
		  				}
		  			});
		  		}
			}

 	</script>
	 <div class="row pt-5 pb-5 mb-5 m-auto w-75 h-100 bg-dark position-relative">
	 	<div class="leftside col-7">
	 		<form>
	 			<h4>Aimad tchad</h4>
	 			<label class="d-block"><?php echo $row['username']; ?></label>
	 			<input class="w-75" type="text" id="userfullname" placeholder="<?php echo $row['fullname']; ?>" autocomplete ='off'>
	 			<label class="d-block mt-2">Old Password</label>
	 			<input class="w-75" type="password" id="useroldpassword" placeholder="Old Password" autocomplete="off">
	 			<label class="d-block mt-2">New Password</label>
	 			<input class="w-75" type="password" id="usernewpassord" placeholder="New Password" autocomplete="off">
	 			<input class="mt-4 btn btn-toolbar d-block ml-auto mr-auto" type="submit" onclick="return updateuser(<?php echo $userid; ?>);" value="Submit">
	 		</form>
	 	</div>
	 	<div class="rightside col-5">
	 		<div class="photoprofil w-50 m-auto">
	 			<img src="app/img/user/<?php echo $row['image']; ?>" class="img-fluid">
	 		</div>
	 		<div class="costum mt-3">
				<span>choose file</span>
				<input type="file" id="upload" onchange="chnageimage(<?php echo $userid; ?>,'<?php echo $row['image']; ?>');">	
			</div>
			<span class="d-block mt-1" id="filename"></span>
	 	</div>
	 	<i class="fa fa-close fa-2x position-absolute" id='closeEditProfile'style="top: 7px;
	    right: 10px;font-size: 1.4em;cursor: pointer"></i>
	</div>
<?php } ?>