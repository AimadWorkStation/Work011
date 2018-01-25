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
});

//render Log in form
var Login = React.createClass({
	render: function(){
		return(
			<div>
				<form className="login ml-auto mr-auto" action="" method="POST">
						<h4>Admin Login</h4>
						<input className="form-control" type="text" name="user" id='user' onFocus={this.onFocus} placeholder="Username" autoComplete="off" />
						<input className="form-control" type="password" name="pass" id='pass' onFocus={this.onFocus} placeholder="Password" autoComplete="new-password" />
						<input type="submit" onClick={this.onLogin} defaultValue="Login" className="btn btn-primary" />
						<span id='register'> Register</span>
				</form>
				<form className="login register ml-auto mr-auto" action="">
						<h4  className="float-left mb-5">Registre</h4><span className="float-right"><i className="fa fa-close close"></i></span>
						<input className="form-control" type="text" id="usere" placeholder="Username" autoComplete="off" />
						<p id="usernamelength">username must be more then 5 character</p>
						<p id="usernameExiste">Sorry username already existe</p>
						<p id="usernameNotExiste">userame valide</p>
						<input className="form-control" type="text" id="fullname" placeholder="Full Name" autoComplete="off" />
						<input className="form-control" type="password" id="passs" placeholder="Password" autoComplete="off" />
						<input type="text" defaultValue="Registre" className="btn btn-primary btn-block" autoComplete="off" id="adduser" />
				</form>
			</div>
		)
	},
	onFocus : ()=>{
		$('.loginPage').removeClass('animated shake');
	},
	onLogin : (e)=>{
		e.preventDefault();
		var [user,pass] = [$('#user').val(),$('#pass').val()];
		$.ajax({
			url: 'app/functions/functions.php',
			type: 'POST',
			dataType: '',
			data: {function: 'checkUserLogin', username : user, password : pass},
		})
		.done(function(data) {
			console.log(data);
			if(data != 'error') $(location).attr('href', 'index2.php');
			else{
				$('.loginPage').addClass('animated shake')
			}
		})
		.fail(function() {

		});

	}
});

ReactDOM.render(
	<Login />,
	document.getElementById('login')
);
