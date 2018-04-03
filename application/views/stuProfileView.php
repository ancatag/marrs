<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script>var path = '<?php echo base_url();?>';var currentStuUsername = '<?php echo $user_data['stuUsername'];?>';</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css');?>">
</head>
<body id="dashboard-view" class="bg-light">
<?php $this->load->view('nav/stuMainNav'); ?>
<main role="main" class="container float-left">

<div class="container">
    <form id="stuUpdateForm" class="needs-validation" novalidate>
    <h3> General Information </h3>
    <div class="form-row">
        <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Name</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuFullname'] ? $user_data['stuFullname'] : NULL; ?>" 
        name="stuFullname" id="stuFullname" placeholder="Full Name" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationTooltip02">Email</label>
        <input type="email" class="form-control" value= "<?php echo $user_data['stuEmail'] ? $user_data['stuEmail'] : NULL; ?>" 
        name="stuEmail" id="stuEmail" placeholder="Email" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationTooltipUsername">Username</label>
        <div class="input-group">
            <input type="text" class="form-control" value= "<?php echo $user_data['stuUsername'] ? $user_data['stuUsername'] : NULL; ?>" 
            name="stuUsername" id="stuUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
            <div class="invalid-feedback username-invalid-feedback" style="display:none;">
            Username taken.
            </div>
            <div class="valid-feedback username-valid-feedback" style="display:none;">
            Username available.
      	    </div>
            <div class="valid-feedback chosen-username-valid-feedback" style="display:none;">
              This is your chosen username
            </div>
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Phone Number</label>
        <input type="tel" class="form-control" value= "<?php echo $user_data['stuPhone'] ? $user_data['stuPhone'] : NULL; ?>" 
        name="stuPhone" id="stuPhone" placeholder="" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Date of Birth</label>
        <input type="date" class="form-control" value= "<?php echo $user_data['stuDob'] ? $user_data['stuDob'] : NULL; ?>" 
        name="stuDob" id="stuDob" placeholder="" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Gender</label>
        <select class="custom-select" id="stuGender" name="stuGender">
            <option <? if (!isset($user_data['stuGender'])) echo "selected";?>Choose...</option>
            <option value="Male" <? if (isset($user_data['stuGender']) && $user_data['stuGender']=="Male") echo "selected";?> Male </option>
            <option value="Female" <? if (isset($user_data['stuGender']) && $user_data['stuGender']=="Female") echo "selected";?>Female </option>
        </select>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Father Name</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuFathername'] ? $user_data['stuFathername'] : NULL; ?>" 
        name="stuFathername" id="stuFathername" placeholder="Father's Name"required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="validationTooltip02">Mother Name</label>
        <input type="email" class="form-control" value= "<?php echo $user_data['stuMothername'] ? $user_data['stuMothername'] : NULL; ?>" 
        name="stuMothername" id="stuMothername" placeholder="Mother's Name" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
        </div>
    </div>

    <h3> Communication Address</h3>
    <div class="form-row">
        <div class="col-md-3 mb-3">
        <label for="validationTooltip03">Address Line 1</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuCommadd'] ? $user_data['stuCommadd'] : NULL; ?>" 
        name="stuCommadd" id="stuCommadd" placeholder="Address Line 1" required>
        <div class="invalid-tooltip">
            Please provide a valid city.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip04">Address Line 2</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuCommadd1'] ? $user_data['stuCommadd1'] : NULL; ?>" 
        name="stuCommadd1" id="stuCommadd1" placeholder="Address Line 2" required>
        <div class="invalid-tooltip">
            Please provide a valid state.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip04">Address Line 3</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuCommadd2'] ? $user_data['stuCommadd2'] : NULL; ?>" 
        name="stuCommadd2" id="stuCommadd2" placeholder="Address Line 3" required>
        <div class="invalid-tooltip">
            Please provide a valid state.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Zip</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuCapincode'] ? $user_data['stuCapincode'] : NULL; ?>" 
        name="stuCapincode" id="stuCapincode" placeholder="Zip" required>
        <div class="invalid-tooltip">
            Please provide a valid zip.
        </div>
        </div>
    </div>

    <h3> Permanent Address </h3>
    <div class="form-row">
        <div class="col-md-3 mb-3">
        <label for="validationTooltip03">Address Line 1</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuPermadd'] ? $user_data['stuPermadd'] : NULL; ?>" 
        name="stuPermadd" id="stuPermadd" placeholder="Address Line 1" required>
        <div class="invalid-tooltip">
            Please provide a valid city.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip04">Address Line 2</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuPermadd1'] ? $user_data['stuPermadd1'] : NULL; ?>" 
        name="stuPermadd1" id="stuPermadd1" placeholder="Address Line 2" required>
        <div class="invalid-tooltip">
            Please provide a valid state.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip04">Address Line 3</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuPermadd2'] ? $user_data['stuPermadd2'] : NULL; ?>" 
        name="stuPermadd2" id="stuPermadd2" placeholder="Address Line 3" required>
        <div class="invalid-tooltip">
            Please provide a valid state.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Zip</label>
        <input type="text" class="form-control" value= "<?php echo $user_data['stuPapincode'] ? $user_data['stuPapincode'] : NULL; ?>" 
        name="stuPapincode" id="stuPapincode" placeholder="Zip" required>
        <div class="invalid-tooltip">
            Please provide a valid zip.
        </div>
        </div>
    </div>
    <input id="stuPhoto" name="stuPhoto" type="hidden" value= "<?php echo $user_data['stuPhoto'] ? $user_data['stuPhoto'] : NULL; ?>">
    <input id="stu_id" name="stu_id" type="hidden" value= "<?php echo $user_data['stu_id'] ? $user_data['stu_id'] : NULL; ?>">
    <button id="stuUpdateBtn" class="btn btn-primary" type="submit">Update Profile</button>
    </form>
</div>


</main>
<script src='<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<script src='<?php echo base_url('assets/js/all.js');?>'></script>
<script src='<?php echo base_url('assets/js/data.js');?>'></script>
<script src='<?php echo base_url('assets/js/dashboard.js');?>'></script>
</body>
</html>
