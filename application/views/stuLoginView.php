<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student Login</title>
	<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		<?php if(!isset($session_id)){$session_id=FALSE;} ?>
		var path = '<?php echo base_url();?>';
		var session_id = '<?php echo $session_id; ?>';
		console.log(session_id);
	</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/opening.css');?>">
	<script src='<?php echo base_url('assets/js/data.js');?>'></script>
	<script src='<?php echo base_url('assets/js/all.js');?>'></script>
</head>
<body id="loginView">
<main>
<div id="loginFormCont" class="container">

<form id="stuSigninForm" class="form-signin">
	<div class="text-center mb-4">
		<img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal"></h1>
		<p></p>
	</div>
	<div id="usernameIp" class="form-label-group">
		<input type="username" name="stuUsername" id="stuUsername" class="form-control" placeholder="Username" required autofocus>
		<label for="inputUsername">Username</label>
		<small class="togEmailUser" class="form-text text-muted"><a id="useEmail" href="#">Sign in with your Email instead.</a></small>
		<div class="invalid-feedback" style="display:none;">
        Not a valid user.
        </div>
		<div class="valid-feedback" style="display:none;">
        Good to go.
      	</div>
	</div>
	<div id="emailIp" class="form-label-group" style="display:none">
		<input type="email" name="stuEmail" id="stuEmail" class="form-control" placeholder="Email" required autofocus>
		<label for="inputUsername">Email</label>
		<small class="togEmailUser" class="form-text text-muted"><a id="useUsername" href="#">Sign in with your Username instead.</a></small>
		<div class="invalid-feedback" style="display:none;">
        Not a valid email.
        </div>
		<div class="valid-feedback" style="display:none;">
        Good to go.
      	</div>
	</div>
	<div class="form-label-group">
		<input type="password" name="stuPassword" id="stuPassword" class="form-control" placeholder="Password" required>
		<label for="inputPassword">Password</label>
	</div>
	<div class="alert alert-warning alert-dismissible fade" role="alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>Oops!</strong> Invalid user.
	</div>
	<div class="checkbox mb-3">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<button id="stuSigninBtn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<small id="signUpBtn" class="form-text text-muted"><a href="<?php echo base_url('stu/signup');?>">Already Registered</a></small>
	<p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
</form>

</div> <!-- /signup container -->
</main>

</body>
</html>