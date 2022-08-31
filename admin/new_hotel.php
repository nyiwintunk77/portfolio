<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
	$page_title = "NEW HOTEL";
	$parent_page = "HOTEL MANAGEMENT";
	if(isset($_REQUEST["hotel_register_form"]))
	{

		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
		$type = mysqli_real_escape_string($con,$_REQUEST["type"]);
		$checkin = mysqli_real_escape_string($con,$_REQUEST["checkin"]);
		$checkout = mysqli_real_escape_string($con,$_REQUEST["checkout"]);
		$checkout = format_datetime($checkout);
		$checkin = format_datetime($checkin);
	


		$num_rooms = mysqli_real_escape_string($con,$_REQUEST["num_rooms"]);
		$location = mysqli_real_escape_string($con,$_REQUEST["location"]);
		$standard = mysqli_real_escape_string($con,$_REQUEST["standard"]);
		$service = mysqli_real_escape_string($con,$_REQUEST["service"]);
		$phone = mysqli_real_escape_string($con,$_REQUEST["phone"]);
		$staff = mysqli_real_escape_string($con,$_REQUEST["staff"]);

		 $sql = " INSERT INTO hotel (name, roomtype, CheckIn, CheckOut, num_of_room, location, standard, service, phone, staff_name) values ('$name', '$type', '$checkin', '$checkout', '$num_rooms', '$location', '$standard', '$service', '$phone', '$staff')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_HOTEL_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Hotel Registeration Form</h1>
             <form class="form-horizontal"  role="form">
             	<input type="hidden" name="hotel_register_form">
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Name</label>
             	<input type="text" name="name" placeholder="Please Enter Hotel Name" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Room Type</label>
             	<input type="text" name="type" placeholder="Please Enter Room Type" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Check In</label>
             	<input type="text" name="checkin" id="checkin"  class="form-control" required>
             	</div>
             	<div class="form-group">
              <label class="control-label">Check Out</label>
            <input type="text" name="checkout" id="checkout"  class="form-control" required>
         
            </div>
             	<div class="form-group">
             		
             	<label class="control-label">Number of Rooms</label>
             	<input type="text" name="num_rooms" placeholder="Please Enter Number of Rooms" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Location</label>
             	<textarea  name="location" placeholder="Please Enter Hotel Location" class="form-control" required></textarea>
             </div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Standard</label>
             	<input type="text" name="standard" placeholder="Please Enter Hotel Standard" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Service</label>
             	<textarea name="service" class="form-control" required ></textarea>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Phones</label>
             	<input type="text" name="phone" placeholder="Please Enter Phone Number" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Responsible person</label>
             	<input type="text" name="staff" placeholder="Please Hotel Responsible Person" class="form-control" required>
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