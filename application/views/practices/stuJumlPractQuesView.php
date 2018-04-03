<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
	var path = '<?php echo base_url();?>';	
  var ext_id = '<?php echo $ext_id;?>';
    var currentStuUsername = '<?php echo $user_data['stuUsername'];?>';
    <?php 
        $quests_array = json_encode($quests);
    ?>  
    var questsPractJumb = <?php echo $quests_array;?>;
    console.log(questsPractJumb);
	</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/stuJumbPract.css');?>">
</head>
<body id="dashboard-view" class="bg-light">
<?php $this->load->view('nav/stuMainNav');?>
<main role="main" class="container"><br>
<!-- <div>Time Left <span id="time"></span>seconds</div> -->
<span id="timer"></span>
<div class="container">
<header>
  <h2>Jumbled Letters</h2>
  --Online Practice / Jumbled Letters
  <div style="float: right;">Time Left: <span id="timespan"></span> seconds</div>
  <!-- <div id="timespan" style="float: right;">
  Time Left:
  </div> -->
</header>
<form id="jumPractQuespap">

<!-- <script>var timeleft=1*60;</script> -->
<!-- $i=1;
print_r($quests);exit();
foreach($quests as $row) 
{
?> -->
<!-- <div class='questsIndDiv media text-muted pt-3 newsfeeds-div'>
<p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> 
<strong class='d-block text-gray-dark'></strong></p>
<input type='text' style='width:120px;' class='form-control ansInput' placeholder='text answer'><span></span>
</div> -->
<?php
// $i++;
// }
?>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="detailReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailReportModal_Title">Report Card</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="detailReportModal_Body" class="modal-body">
      <div id="detailReportModal_Body" class="modal-body">
      <div class="alert alert-danger" role="alert">
      Congratulation!!!!!!!!!<br>
      You Have Successfully Finished The Test.<br>
      &nbsp;&nbsp; Test Summary  

</div>
		<table>
	
		</table>
		<input id="totalMarksObt" type="text" readonly>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <a id="detailReportModal_Buttons" type="button" class="btn btn-primary">Start Exam</a> -->
      </div>
    </div>
  </div>
</div>

</main>
<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src='<?php echo base_url('assets/js/timer.js');?>'></script>
<script src='<?php echo base_url('assets/js/custom.js');?>'></script>
<script src='<?php echo base_url('assets/js/all.js');?>'></script>
<script src='<?php echo base_url('assets/js/data.js');?>'></script>
<script src='<?php echo base_url('assets/js/jumbled.js');?>'></script>
<script src='<?php echo base_url('assets/js/dashboard.js');?>'></script>

</body>
</html>