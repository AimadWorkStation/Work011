
$(document).ready(function(){
	$('#adduser').attr('disabled',true);
	$('#register').click(() => {
		console.log('hello');
		$('.register').fadeIn(1500);
	});
	$('.close').click(() => {
		$('.register').fadeOut(1000);
	});



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


	$('#adduser').click(() => {
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

	$('#profil').click(function(){
		$('.editProfile').fadeIn(1000);
	});
	$('#closeEditProfile').click(function(){
		$('.editProfile').fadeOut(1000);
	});
	
	

});