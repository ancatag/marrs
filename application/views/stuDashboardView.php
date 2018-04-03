<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<script> var path = '<?php echo base_url();?>'; </script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css');?>">
</head>

<body id="dashboard-view" class="bg-light">
<?php $this->load->view('nav/stuMainNav'); ?>
<main role="main">
<div id="noticeBoard" class="container float-left">
	<div class="row">
		<div class="col-sm-10">
			<!-- <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
			<img class="mr-3" src="https://getbootstrap.com/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
			<div class="lh-100">
				<h6 class="mb-0 text-white lh-100">Notice Board</h6>
				<small>Newsfeeds</small>
			</div>
			</div> -->

			<div class="my-3 p-3 bg-white rounded box-shadow">
			<h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
			<div class="newsfeeds">

			</div>
			<small class="d-block text-right mt-3">
				<a href="#">All updates</a>
			</small>
			<!-- <button id="getAllNews">Get News</button> -->
			</div>
		</div>
	</div>
</div>
</main>
<?php $this->load->view('nav/stuMainFooter'); ?>                      
<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src='<?php echo base_url('assets/js/all.js');?>'></script>
<script src='<?php echo base_url('assets/js/data.js');?>'></script>
<script src='<?php echo base_url('assets/js/dashboard.js');?>'></script>
</body>
</html>
