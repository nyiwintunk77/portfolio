<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit Car";
      $parent_page = "CAR MANAGEMENT";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM car WHERE CarNo = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $car_arr = mysqli_fetch_assoc($result);


      $car_name = $car_arr["name"];
      $car_type = $car_arr["type"];
;
      $car_services = $car_arr["services"];
      $car_availibility = $car_arr["availibility"];

	if(isset($_REQUEST["car_update_form"]))
	{
            $car_id = (int)($_REQUEST["id"]);
		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
		$type = mysqli_real_escape_string($con,$_REQUEST["type"]);
	
		$services = mysqli_real_escape_string($con,$_REQUEST["services"]);
		$availibility = mysqli_real_escape_string($con,$_REQUEST["availibility"]);
	

		$sql = " UPDATE car SET name = '$name', type = '$type', services = '$services', availibility = '$availibility' WHERE CarNo = " . $car_id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
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

             <h1> Edit Car Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="car_update_form">
             	<div class="form-group">
             		<input type="hidden" name="id" value="<?php echo $id; ?>">
             	<label class="control-label">Car Name</label>
             	<input type="text" name="name" placeholder="Please Enter Car Name"  value="<?php echo $car_name; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Car Type</label>
             	<input type="text" name="type" placeholder="Please Enter Car Type"  value="<?php echo $car_type; ?>" class="form-control" required>
             	</div>
             
             	<div class="form-group">
             		
             	<label class="control-label">Services</label>
             	<textarea name="services"  class="form-control" required ><?php echo $car_services; ?></textarea>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Availibility</label>
             	<input type="text" name="availibility" placeholder="Please Enter  Number of Passengers"  value="<?php echo $car_availibility; ?>" class="form-control" required>
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