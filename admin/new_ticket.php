<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "NEW TICKET";
      $parent_page = "TICKET MANAGEMENT";
	if(isset($_REQUEST["ticket_register_form"]))
	{

		$booking_id = mysqli_real_escape_string($con,$_REQUEST["booking_id"]);
		$delivery_id = mysqli_real_escape_string($con,$_REQUEST["delivery_id"]);
		$seat_no = mysqli_real_escape_string($con,$_REQUEST["seat_no"]);

	
	

		 $sql = " INSERT INTO ticket (booking_id, delivery_id, seat_no) values ('$booking_id', '$delivery_id',  '$seat_no')";
	
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);
		if($rows > 0)
		{
			header("location:" . ADMIN_TICKET_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Ticket Registeration Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="ticket_register_form">
             	<div class="form-group">
             		
             	<label class="control-label">Booking ID</label>
             	<input type="text" name="booking_id" placeholder="Please Enter Booking ID" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Delivery Man</label>
                <select name="delivery_id" class="form-control" required="">
                    <option value="">Choose Delivery Man</option>
                    <?php
                        $query = "SELECT * FROM delivery WHERE deleted = 0";
            $result = mysqli_query($con, $query);
            while ($delivery_arr = mysqli_fetch_assoc($result)) { 
                ?>
                <option value="<?php echo $delivery_arr["id"]; ?>"><?php echo $delivery_arr["person"]; ?></option>
                <?php  } ?>
                </select>
             	
             	</div>
             	
           
             	<div class="form-group">
             		
             	<label class="control-label">Seat No</label>
             	<input type="text" name="seat_no" class="form-control" required >
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