<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW DELIVIERY";
      $parent_page = "DELIVERY MANAGEMENT";
	if(isset($_REQUEST["delivery_register_form"]))
	{

		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
        $duration = mysqli_real_escape_string($con,$_REQUEST["duration"]);
		$fees = mysqli_real_escape_string($con,$_REQUEST["fees"]);

	
	

		 $sql = " INSERT INTO delivery (person, duration, fees) values ('$name', '$duration', '$fees')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_DELIVERY_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Delivery Registeration Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="delivery_register_form">
             	<div class="form-group">
             		
             	<label class="control-label">Staff Name</label>
             	<input type="text" name="name" placeholder="Please Enter Car Name" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Duration</label>
             	<input type="text" name="duration" placeholder="Please Enter Car Type" class="form-control" required>
             	</div>
                <div class="form-group">
                    
                <label class="control-label">Fees ($) </label>
                <input type="number" name="fees" placeholder="Please Enter Delivery Fees" class="form-control" required>
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