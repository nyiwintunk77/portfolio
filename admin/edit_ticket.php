<?php
    require_once("../require_file.php");
    require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit TICKET";
      $parent_page = "TICKET MANAGEMENT";
      $id = (int)($_GET["id"]);
      $query = "SELECT * FROM ticket WHERE id = $id AND deleted = 0";
        $result = mysqli_query($con, $query);
        $ticket_arr = mysqli_fetch_assoc($result);
        $deli_res = mysqli_query($con,"SELECT * FROM delivery WHERE id = " . $ticket_arr["delivery_id"] );
        $deli_arr = mysqli_fetch_assoc($deli_res);
        $db_delivery_id = $deli_arr["id"];
        $delivery_man = $deli_arr["person"];
        $booking_id = $ticket_arr["booking_id"];
        $seat_no = $ticket_arr["seat_no"];

    if(isset($_REQUEST["ticket_update_form"]))
    {
        $id = (int)($_REQUEST["id"]);
        $delivery_id = mysqli_real_escape_string($con,$_REQUEST["delivery_id"]);
        $booking_id = mysqli_real_escape_string($con,$_REQUEST["booking_id"]);
        $seat_no = mysqli_real_escape_string($con,$_REQUEST["seat_no"]);
    
    

        $sql = " UPDATE ticket SET delivery_id = '$delivery_id', booking_id = '$booking_id', seat_no = '$seat_no' WHERE id = " . $id;
        
        $result = mysqli_query($con, $sql);
                 
        
        if($result > 0)
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

             <h1> Ticket Edit Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="ticket_update_form">
             	<div class="form-group">
             		
             	<label class="control-label">Booking ID</label>
             	<input type="text" name="booking_id" value="<?php echo $booking_id; ?>" placeholder="Please Enter Booking ID" class="form-control" required>
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
                <option value="<?php echo $delivery_arr["id"]; ?>" <?php if($delivery_arr["id"] == $db_delivery_id) { echo "selected";} ?>><?php echo $delivery_arr["person"]; ?></option>
                <?php  } ?>
                </select>
             	
             	</div>
             	
           
             	<div class="form-group">
             		
             	<label class="control-label">Seat No</label>
             	<input type="text" name="seat_no" value="<?php echo $seat_no; ?>" class="form-control" required >
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