<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student Registration</title>
	<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>var path = '<?php echo base_url();?>';</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/opening.css');?>">
	<script src='<?php echo base_url('assets/js/data.js');?>'></script>
	<script src='<?php echo base_url('assets/js/all.js');?>'></script>
</head>
<body>  
<nav class="navbar navbar-dark fixed-top">
	<a class="navbar-brand" href="#">MaRRs Spellingbee Student Portal</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsExample01">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="#">Link</a>
		</li>
		<li class="nav-item">
		<a class="nav-link disabled" href="#">Disabled</a>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
			<a class="dropdown-item" href="#">Action</a>
			<a class="dropdown-item" href="#">Another action</a>
			<a class="dropdown-item" href="#">Something else here</a>
		</div>
		</li>
	</ul>
	<form class="form-inline my-2 my-md-0">
		<input class="form-control" type="text" placeholder="Search" aria-label="Search">
	</form>
	</div>
</nav>

<main>
<div id="signupFormCont" class="container container-form">

<form id="stuSignupForm">
<div class="form-group row">
	<label for="stuFullname" class="col-sm-2 col-form-label">Full Name</label>
	<div class="col-sm-5">
		<input type="text" class="form-control" name="stuFullname" id="stuFullname" placeholder="Full Name">
	</div>
</div>
<div class="form-group row">
	<label for="stuUsername" class="col-sm-2 col-form-label">Username</label>
	<div class="col-sm-5">
		<input type="text" class="form-control" name="stuUsername" id="stuUsername" placeholder="Username">
		<div class="invalid-feedback" style="display:none;">
          Username taken.
        </div>
		<div class="valid-feedback" style="display:none;">
        Username available.
      	</div>
	</div>
</div>
<div class="form-group row">
	<label for="stuEmail" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-5">
		<input type="email" class="form-control" name="stuEmail" id="stuEmail" placeholder="Email">
	</div>
</div>
<div class="form-group row">
	<label for="stuPassword" class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-5">
		<input type="password" class="form-control" name="stuPassword" id="stuPassword" placeholder="Password">
	</div>
</div>
<div class="form-group row">
	<label for="stuPassword1" class="col-sm-2 col-form-label">Confirm Password</label>
	<div class="col-sm-5">
		<input type="password" class="form-control" id="stuPassword1" placeholder="Confirm Password">
	</div>
</div>
<!-- <div class="form-group row">
	<label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
	<div class="col-sm-10">
	<select class="form-control" id="inputGender">
      <option>Male</option>
      <option>Female</option>
    </select>
	</div>
</div> -->
<div class="form-group row">
	<div class="col-sm-10 offset-sm-2">
		<button id="stuSignupBtn" type="submit" class="btn btn-primary">Register</button>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-5 offset-sm-2">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" id="privacyPolicy">
			<small class="form-check-label" for="privacyPolicy">
			I have read and agree to the Privacy Policy
			</small>
		</div>
	</div>
</div>
</form>

</div> <!-- /login container -->
<main>

</body>
</html>