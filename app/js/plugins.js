
$(document).ready(function(){
	//button register disable whene username existe at register form
	$('#adduser').attr('disabled',true);
	//show and close register form
	$('#register').click(() => {
		$('.register').fadeIn(500);
	});
	$('.close').click(() => {
		$('.register').fadeOut(500);
	});


	//register test username existe
	$('#user').keyup(function() {
		str = $(this).val();			
		if(str.length < 5){
			$('#adduser').attr('disabled',true);
			$('#usernamelength').css('display','block');
			$('#usernameExiste').css('display','none');
			$('#usernameNotExiste').css('display','none');
		}
		else{
			$('#usernamelength').css('display','none');
			$.post('app/templates/userexist.php', {str:str}, function(data){
				if(data == 'existe'){
					$('#adduser').attr('disabled',true);
					$('#usernameExiste').css('display','block');
					$('#usernameNotExiste').css('display','none');
				}
				else{
					$('#adduser').attr('disabled',false);
					$('#usernameNotExiste').css('display','block');
					$('#usernameExiste').css('display','none');
				}
			});
		}
		
	});

	//registr form
	$('#adduser').click((e) => {
		console.log('hello');
		user = $('#user').val();
		fullname = $('#fullname').val();
		password = $('#pass').val();
		$.post('app/templates/adduser.php',{user:user,fullname:fullname,password:password},function(data){
			if(data == 'true'){
				$('#user').css('backgroundColor',"#245820").val('');
				$('#fullname').css('backgroundColor',"#245820").val('');
				$('#pass').css('backgroundColor',"#245820").val('');
				setTimeout(() => { $('.register').fadeOut(1000); },2000);
				$('#username').val(user);
				$('#password').val(password);
			}
		});
	});

	
	

  	//function load chatbody
  	function loadchatbody(userid,friendid){
  		$.post('loadchatbody.php', {userid : userid,friendid : friendid}, function(data){
  			$('.list-group').innerHTML(data);
  		});
  	}

  	//search friends
  	$('#search').keyup(function(){
		var str = $(this).val();
		if(str != ''){
			$.post('app/templates/usersearch.php',{str:str},function(data){
				$('.listbody .list-group').html(data);
			});
		}
		else{
			$.post('app/templates/listfriend.php',{id:'*'},function(data){
				$('.listbody .list-group').html(data);
			});
		}
	});
  	//load friend automatique
  	$.post('app/templates/listfriend.php',{id:'*'},function(data){
		$('.listbody .list-group').html(data);
	});	

  	



});


// functions ::

//to show editprofile
function showprofile(id){
	$.post('app/templates/editProfile.php', {id: id}, function(data) {
		$('.editProfile').html(data);
	});
	$('.editProfile').fadeIn(1000);
}

//logout
$('#logout').click(function() {
	$.post('app/templates/logout.php', {}, function() {
		
	});
});
	

//select friend to chat with so it's active
$(".list-group").on("click", ".row", function(event){
    $(this).addClass('friendActive').siblings().removeClass('friendActive');
});

//show body of the friend 
function loadchatbody(e){
	console.log(e);
}

//add to chat body
function addtofriendlist(e){
	$.post('app/templates/listfriend.php',{id:'*'},function(data){
		$('.listbody .list-group').html(data);
	});	
	$.post('app/templates/listfriend.php',{id:e},function(data){
		$('.listbody .list-group').prepend(data);
	});	
	$('#search').val('');
	console.log(e);
}

//update user
function updateuser(){

}