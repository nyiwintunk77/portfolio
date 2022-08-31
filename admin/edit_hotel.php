<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM hotel WHERE hotelno = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $hotel_arr = mysqli_fetch_assoc($result);


      $hotel_name = $hotel_arr["name"];
      $hotel_roomtype = $hotel_arr["roomtype"];
      $hotel_num_of_room = $hotel_arr["num_of_room"];
      $hotel_location = $hotel_arr["location"];
      $hotel_standard = $hotel_arr["standard"];
      $hotel_phone = $hotel_arr["phone"];
      $hotel_CheckIn = $hotel_arr["CheckIn"];
      $hotel_CheckOut = $hotel_arr["CheckOut"];
      $hotel_location = $hotel_arr["location"];
      $hotel_service = $hotel_arr["service"];
      $hotel_staff_name = $hotel_arr["staff_name"];

	if(isset($_REQUEST["hotel_update_form"]))
	{
            $hotel_id = (int)($_REQUEST["id"]);
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

		$sql = " UPDATE hotel SET name = '$name', roomtype = '$type', CheckIn = '$checkin', CheckOut = '$checkout', num_of_room = '$num_rooms', location = '$location', standard = '$standard', service = '$service', phone = '$phone', staff_name = '$staff' WHERE hotelno = " . $hotel_id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
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

             <h1>Edit Hotel Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="hotel_update_form">
             	<div class="form-group">
             		<input type="hidden" name="id" value="<?php echo $id; ?>">
             	<label class="control-label">Hotel Name</label>
             	<input type="text" name="name" placeholder="Please Enter Hotel Name"  value="<?php echo $hotel_name; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Room Type</label>
             	<input type="text" name="type" placeholder="Please Enter Room Type"  value="<?php echo $hotel_roomtype; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Check In</label>
             	<input type="text" name="checkin" id="checkin"   value="<?php echo $hotel_CheckIn; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
              <label class="control-label">Check Out</label>
            <input type="text" name="checkout" id="checkout"   value="<?php echo $hotel_CheckOut; ?>" class="form-control" required>
         
            </div>
             	<div class="form-group">
             		
             	<label class="control-label">Number of Rooms</label>
             	<input type="text" name="num_rooms" placeholder="Please Enter Number of Rooms"  value="<?php echo $hotel_num_of_room; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Location</label>
             	<textarea  name="location" placeholder="Please Enter Hotel Location"   class="form-control" required><?php echo $hotel_location; ?></textarea>
             </div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Standard</label>
             	<input type="text" name="standard" placeholder="Please Enter Hotel Standard"  value="<?php echo $hotel_standard; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Service</label>
             	<textarea name="service"  class="form-control" required ><?php echo $hotel_service; ?></textarea>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Phones</label>
             	<input type="text" name="phone" placeholder="Please Enter Phone Number"  value="<?php echo $hotel_phone; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Hotel Responsible person</label>
             	<input type="text" name="staff" placeholder="Please Hotel Responsible Person"  value="<?php echo $hotel_staff_name; ?>" class="form-control" required>
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