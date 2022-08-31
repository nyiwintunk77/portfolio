<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW DESTINATION";
      $parent_page = "DESTINATION MANAGEMENT";
	if(isset($_REQUEST["destination_register_form"]))
	{

		$places = mysqli_real_escape_string($con,$_REQUEST["places"]);
		$duration = mysqli_real_escape_string($con,$_REQUEST["duration"]);
		$description = mysqli_real_escape_string($con,$_REQUEST["description"]);

	
	

		 $sql = " INSERT INTO destination (places, duration, description) values ('$places', '$duration',  '$description')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_DESTINATION_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h2> Destination Registeration Form</h2>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="destination_register_form">
             	<div class="form-group">
             		
             	<label class="control-label">Travelling Places</label>
             	<input type="text" name="places" placeholder="Please Enter Travelling Places" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Duration</label>
             	<input type="text" name="duration" placeholder="Please Enter Duration" class="form-control" required>
             	</div>
             	
           
             	<div class="form-group">
             		
             	<label class="control-label">Description</label>
             	<textarea name="description" class="form-control" required ></textarea>
             	</div>
             
             	
             	<div class="form-group">
             		<button type="submit" class="btn btn-info">Save</button>
             		<button type="reset" class="btn btn-danger">Reset</button>
             	</div>
             </form>
		        </div>
	

      



</div>


<?php include(ADMIN_ROOT_URL . "admin_footer.php"); ?>


  
<script src="<?php echo JS_URL; ?>jquery.inputmask.bundle.js"></script>
<script src="<?php echo JS_URL; ?>inputmask/phone-codes/phone.js"></script>
<script src="<?php echo JS_URL; ?>scale.fix.js"></script>


<script type="text/javascript">
	jQuery(function(){


           $('#checkin').inputmask("datetime");
           $('#checkout').inputmask("datetime");
    });
        </script>