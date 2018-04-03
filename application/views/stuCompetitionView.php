<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>var path = '<?php echo base_url();?>';var currentStuUsername = '<?php echo $user_data['stuUsername'];?>';</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
</head>
<body id="jumbleQuestionsView " class="bg-light">
<?php $this->load->view('nav/stuMainNav'); ?>
<main role="main" class="container float-center">
<div class="container">
  <div id="quesTypes" class="row"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="quesTypesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quesTypesModal_Title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="quesTypesModal_Body" class="modal-body">

   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="quesTypesModal_Button" type="button" class="btn btn-primary">Start Exam</a>
      </div>
    </div>
  </div>
</div>


</main>
<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src='<?php echo base_url('assets/js/all.js');?>'></script>
<script src='<?php echo base_url('assets/js/data.js');?>'></script>
<script src='<?php echo base_url('assets/js/jumbled.js');?>'></script>
<script src='<?php echo base_url('assets/js/dashboard.js');?>'></script>
</body>
</html>
