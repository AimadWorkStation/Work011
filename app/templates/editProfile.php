<?php 

 ?>

 <div class="row pt-5 pb-5 mb-5 m-auto w-75 h-100 bg-dark position-relative">
 	<div class="leftside col-7">
 		<form>
 			<h4>Aimad tchad</h4>
 			<label class="d-block">Full Name</label>
 			<input class="w-75" type="text" name="" placeholder="type full name">
 			<label class="d-block mt-2">Old Password</label>
 			<input class="w-75" type="password" name="" placeholder="Old Password">
 			<label class="d-block mt-2">New Password</label>
 			<input class="w-75" type="password" name="" placeholder="New Password">
 			<input class="mt-4 btn btn-toolbar d-block ml-auto mr-auto" type="submit" name="" value="Submit">
 		</form>
 	</div>
 	<div class="rightside col-5">
 		<div class="photoprofil w-50 h-50 m-auto">
 			<img src="app/img/user/default.jpg" class="img-fluid">
 		</div>
 		<div class="costum mt-3">
			<span>choose file</span>
			<input type="file" name="">	
		</div>
 	</div>
 	<i class="fa fa-close fa-2x position-absolute" id='closeEditProfile'style="top: 7px;
    right: 10px;font-size: 1.4em;cursor: pointer"></i>
 </div>