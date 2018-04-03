<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agent Login</title>
	<script src='<?= base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>var path = '<?= base_url();?>';</script>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css');?>">
	<script src='<?= base_url('assets/js/data.js');?>'></script>
	<script src='<?= base_url('assets/js/script.js');?>'></script>
</head>
<body>
<?php
$date = new DateTime();
echo $date->getTimestamp();
?>
<div class="container">
<div id="login-alert"></div>
<form id="agnSigninForm" class="form-signin">
  <h2 class="form-signin-heading">Please sign in</h2>
  <div id="usernameIp">
	<label for="agnUsername" class="sr-only">Username</label>
	<input type="text" id="agnUsername" name="agnUsername" class="form-control" placeholder="Username" autofocus>
	<small class="togPhoneUser" class="form-text text-muted"><a id="usePhone" href="#">Sign in with your Phone Number instead.</a></small>
  </div>
  <div id="phoneIp" style="display:none">
	<label for="agnPhone" class="sr-only">Phone Number</label>
	<input type="tel" id="agnPhone" name="agnPhone" class="form-control" placeholder="Phone Number" autofocus>
	<small class="togPhoneUser" class="form-text text-muted"><a id="useUsername" href="#">Sign in with your Username instead.</a></small>
  </div>
  <label for="agnPassword" class="sr-only">Password</label>
  <input type="password" id="agnPassword" name="agnPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox">
	<label>
	  <input type="checkbox" value="remember-me"> Remember me
	</label>
  </div>
  <button id="agnSigninBtn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

</div> <!-- /container -->

</body>
</html>