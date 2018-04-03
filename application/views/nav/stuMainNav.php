<script>
	<?php if(!isset($session_id)){$session_id=FALSE;} ?>
	var session_id = '<?php echo $session_id; ?>';
</script>
<nav class="navbar navbar-expand-md fixed-top navbar-dark">
	<a class="navbar-brand" href="<?php echo base_url('stu');?>">Student Online</a>
	<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
		<a class="nav-link" href="<?php echo base_url('stu/profile');?>"><?php echo $user_data['stuFullname']?><span class="sr-only">(current)</span></a>
		</li>
		<!-- <li class="nav-item">
		<a class="nav-link" href="#">Notifications</a>
		</li> -->
		<!-- <li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('stu/profile');?>">Profile</a> -->
		</li>
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('stu/stuCompet');?>">Competition</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url('stu/stuPractice');?>">Online Practice</a>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
			<a class="dropdown-item" href="#">Action1</a>
			<a class="dropdown-item" href="#">Action2</a>
			<a class="dropdown-item" href="<?php echo base_url('stu/logout');?>">Logout</a>
		</div>
		</li>
	</ul>
	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
	</div>
</nav>

<!-- <div class="nav-scroller bg-white box-shadow">
	<nav class="nav nav-underline">
	<a class="nav-link active" href="<?php echo base_url('stu');?>">Dashboard</a>
	<a class="nav-link" onclick="showNotice()">
		Notice Board
		<span class="badge badge-pill bg-light align-text-bottom">27</span>
	</a>
	<a class="nav-link" href="#">Explore</a>
	<a class="nav-link" href="#">Suggestions</a>
	<a class="nav-link" href="#">Link</a>
	<a class="nav-link" href="#">Link</a>
	<a class="nav-link" href="#">Link</a>
	<a class="nav-link" href="#">Link</a>
	<a class="nav-link" href="#">Link</a>
	</nav>
</div> -->

<div id="notiProfile" class="alert alert-info alert-dismissible fade show" role="alert">
  <button onclick="dismissAlert()" type="button" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
  Your profile is <span id="notiPerc"></span>% complete, <a href='<?php echo base_url('stu/profile');?>'>update now!</a>
</div>