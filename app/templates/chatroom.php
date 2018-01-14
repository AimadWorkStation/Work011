<?php 
	
 ?>


 	<div class="row chatroom mt-5 mb-4 w-75 ml-auto mr-auto h-100">

		<div class="d-xl-none col-sm-12 listefriendMobile">
			<div class="d-block d-lg-none d-xl-block col-sm-12" style="background-color: red;height: 100px;">
	 			<div class="row chatheader" style="background-color: yellow; height: 80px;">
		 			
		 		</div>
		 		<div class="row chatbody">
		 			
		 		</div>
		 	</div>
		</div>
 		<div class="listefriend d-none d-lg-block col-lg-4">
 			<div class="row listheader">
	 			<div class="search h-100 w-100 position-relative">
	 				<input class="form-control ml-auto mr-auto w-75 mt-4 border-0 btn-outline-light" type="text" id="search" placeholder="Search" autocomplete="off">
	 				<i class="fa fa-search"></i>
	 			</div>
	 		</div>
	 		<div class="row listbody position-relative h-100" id="scrollstyle">
	 			<ul class="list-group">
				  <!-- place of the users or friends list  -->

				</ul>
	 		</div>
	 	</div>
	 	<div class="chatingzone col-sm-12 col-lg-8 position-relative">
	 		<div class="row chatheader" style="height: 100px;">
	 			<div class="down col-9 row pr-0">
	 				<!-- place of header chat with whom i'm chatting -->
	 				
	 			</div>
	 			<div class="up col-3 p-0 mt-2">
	 				<span id="logout" onclick="window.location ='index.php';" class="float-right pl-2">  Logout</span>
	 				<span id="profil" onclick="showprofile(<?php echo $_SESSION['id']; ?>);" class="float-right">Profile</span>
	 			</div>
	 		</div>
	 		<div class="row chatbody" id="scrollstyle">
	 				<div class="w-100 text-center" id="showmore" style="height: 26px">
	 					<span id="loadmore">Load more <i class="fa fa-spinner"></i></span>
	 				</div>
		 			<ul class="list-group w-100 position-relative list-unstyled h-100" id="chatbody">
						<!-- messages contents -->
					</ul>
	 		</div>
	 		<div class="write position-absolute">
				<input type="text" id="message" placeholder="message">
				<span id="send">Send</span>
				<span id="document"><i class="fa fa-file"></i></span>
				<span id="photo"><i class="fa fa-photo"></i></span>
			</div>
	 	</div>
 	</div>
	
	<div class="editProfile text-center position-absolute w-75" style="top:28%;
    left: 13%; display: none;">
		
	</div>

 	