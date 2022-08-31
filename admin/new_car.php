<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW CAR";
      $parent_page = "CAR MANAGEMENT";
	if(isset($_REQUEST["car_register_form"]))
	{

		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
		$type = mysqli_real_escape_string($con,$_REQUEST["type"]);
		$services = mysqli_real_escape_string($con,$_REQUEST["services"]);
		$availibility = mysqli_real_escape_string($con,$_REQUEST["availibility"]);
	
	

		 $sql = " INSERT INTO car (name, type, services, availibility) values ('$name', '$type',  '$services', '$availibility')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_CAR_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Car Registeration Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="car_register_form">
             	<div class="form-group">
             		
             	<label class="control-label">Car Name</label>
             	<input type="text" name="name" placeholder="Please Enter Car Name" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Car Type</label>
             	<input type="text" name="type" placeholder="Please Enter Car Type" class="form-control" required>
             	</div>
             	
           
             	<div class="form-group">
             		
             	<label class="control-label">Car Services</label>
             	<textarea name="services" class="form-control" required ></textarea>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Availibility</label>
             	<input type="text" name="availibility" placeholder="Please Enter Number of Passenger" class="form-control" required>
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