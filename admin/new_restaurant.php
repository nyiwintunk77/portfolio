<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW RESTAURANT";
      $parent_page = "RESTAURANT MANAGEMENT";
	if(isset($_REQUEST["restaurant_register_form"]))
	{

		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
		$place = mysqli_real_escape_string($con,$_REQUEST["place"]);
		$contact = mysqli_real_escape_string($con,$_REQUEST["contact"]);
        $contactperson = mysqli_real_escape_string($con,$_REQUEST["contactperson"]);
        $meal_type = mysqli_real_escape_string($con,$_REQUEST["meal_type"]);
        $treatment_type = mysqli_real_escape_string($con,$_REQUEST["treatment_type"]);
		$datetime = mysqli_real_escape_string($con,$_REQUEST["datetime"]);
	   $datetime = format_datetime($datetime);






	

		 $sql = " INSERT INTO restaurant (name, place, contact ,contactperson ,meal_type ,treatment_type ,datetime) values ('$name', '$place', '$contact','$contactperson','$meal_type ','$treatment_type','$datetime')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_RESTAURANT_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Restaurant Registeration Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="restaurant_register_form">
             	<div class="form-group">
                    <label class="control-label">Restaurant Name</label>
             	<input type="text" name="name" placeholder="Please Enter Restaurant Name" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Restaurant Place</label>
             	<input type="text" name="place" placeholder="Please Enter Restaurant Place" class="form-control" required>
             	</div>
             	
           
                

                <div class="form-group">
                    
                <label class="control-label">Contact Number</label>
                <input type="text" name="contact" placeholder="Please Enter Contact Number" class="form-control" required>
                </div>

             	<div class="form-group">
             		
             	<label class="control-label">Contact Person</label>
             	<input type="text" name="contactperson" placeholder="Please Enter Contact Person" class="form-control" required>
             	</div>

                <div class="form-group">
                    
                <label class="control-label">Meal Type</label>
                <input type="text" name="meal_type" placeholder="Please Enter Meal Type<" class="form-control" required>
                </div>

                <div class="form-group">
                    
                <label class="control-label">Treatment Type</label>
                <input type="text" name="treatment_type" placeholder="Please Enter Treatment Type" class="form-control" required>
                </div>
             	<div class="form-group">
              <label class="control-label">DateTime</label>
            <input type="text" name="datetime" id="datetime"  class="form-control" required>
         
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


           $('#datetime').inputmask("datetime");
           
    });
        </script>