 <?php
 require_once("require_file.php");



$user_exist = FALSE;
	if(isset($_SESSION["u_id"]))
	{
		$session_u_id = (int)($_SESSION["u_id"]);
		$sql = "SELECT * FROM customer WHERE id = " . $session_u_id . " AND deleted = 0";
		$result = mysqli_query($con, $sql);
		$rows = mysqli_affected_rows($con);

		if($rows == 1)
		{
			$user_exist = TRUE;
			$user_arr = mysqli_fetch_assoc($result);
			$session_u_name = $user_arr["name"];
		}
	}

 if(isset($_REQUEST["role"]) && $_REQUEST["role"] == "cancel_booking")
 {
 	$id = (int)($_GET["id"]);
 	$sql = "UPDATE booking SET deleted = 1 WHERE id = " . $id ;
 	$result = mysqli_query($con, $sql);
 	$rows = mysqli_affected_rows($con);
 	if($rows == 1)
 	{
		header("location:" . CLIENT_BOOKINGS_LINK ); 	
 	}

 }

 $page_title = "My Bookings";

 if($_REQUEST["cmd"] == "_xclick")
 {
$booking_id = $_REQUEST["booking_id"];

 	$sql = "UPDATE booking SET status = 'Paid', payment_type = 'Paypal' WHERE id = " . $booking_id . " AND user_id = " . $session_u_id ;
 	$result = mysqli_query($con, $sql);

 	$cmd = $_REQUEST["cmd"];
 	$package_id = $_REQUEST["package_id"];


	$business = $_REQUEST["business"];
	$item_name = $_REQUEST["item_name"];
	$currency_code = $_REQUEST["currency_code"];
	$amount = $_REQUEST["amount"];

 	header("location:https://www.paypal.com/us/cgi-bin/webscr?cmd=" . $cmd . "&business=" . $business . "&item_name=" . $item_name . "&currency_code=" . $currency_code . "&amount=" . $amount);
 }
   require("client_files.php");
  ?>

  <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">
  <div class="clearfix" style="margin-top: 10px;"></div>

<section class="zo2-row-wrapper zo2-no-class" ><section class="container visible-xs visible-sm visible-md visible-lg"><section class="row"><!-- build column: message -->

<!-- jdoc: modules - position: message --><section id="message" class="zo2-col col-sm-12 col-xs-12 content col-md-12 visible-xs visible-sm visible-md visible-lg"><div id="system-message-container">
    </div>
<!-- build row: Component -->

<section id="component" class="zo2-row-wrapper zo2-no-class"><section class="visible-xs visible-sm visible-md visible-lg"><section class="row"><!-- build column: component -->

<!-- jdoc: modules - position: component --><section style="background: #d2bf93;" class="zo2-col zo2-no-class col-md-12 visible-xs visible-sm visible-md visible-lg"><div class="item-page" >
            <div class="page-header">
        <h3 style="font-size: 2em;color:#000;">
                My Booking List                </h3>


    </div>

    <table id="example" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>PackageName</th>

                <th>Num of Passenger</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Departure</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>PackageName</th>

                <th>Num of Passenger</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Departure</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM booking WHERE user_id = " . $session_u_id . " AND deleted = 0 ORDER BY id DESC";
        	$result = mysqli_query($con, $query);
        	while ($booking_arr = mysqli_fetch_assoc($result)) { 

                $booking_id = $booking_arr["id"];
                $package_id = $booking_arr["package_id"];
                $user_id = $booking_arr["user_id"];
                $passengers = $booking_arr["passengers"];
                $status = $booking_arr["status"];
                $departure = $booking_arr["departure"];
                $cost = $booking_arr["cost"];
                $Departure = reformat_datetime($departure);

               
            $pack_res = mysqli_query($con, "SELECT * FROM tourpackage WHERE id = " . $package_id . " AND deleted = 0");

            $pack_arr = mysqli_fetch_assoc($pack_res);
            $package_name = $pack_arr["name"];
            $package_price = $pack_arr["cost"];


              $user_res = mysqli_query($con, "SELECT * FROM customer WHERE id = " . $user_id . " AND deleted = 0");

            $user_arr = mysqli_fetch_assoc($user_res);
            $customer = $user_arr["name"];

                ?>
        	 
            <tr>
                <td><a href="<?php echo CLIENT_TOUR_LINK . "?id=" . $package_id; ?>"><?php echo  $package_name?></a></td>
          
              
                <td><?php echo $passengers; ?></td>
                <td>$<?php echo $package_price * $passengers; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $departure;  ?></td>
               
                <td>
                	<?php if($status == "Pending")
                	{?>
                		
                		<form action="<?php echo CLIENT_BOOKINGS_LINK; ?>" method="post">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
						<input type="hidden" name="business" value="harry.min.97@gmail.com">
						<input type="hidden" name="item_name" value="<?php echo $package_name; ?> <?php echo $passengers; ?>x">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="amount" value="<?php echo $package_price * $passengers; ?>">
						<input type="image" src="<?php echo IMG_URL; ?>btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
						<img alt="" border="0" src="<?php echo IMG_URL; ?>pixel.gif" width="1" height="1">

						</form>
						<small>Pay via Paypal</small>


						<a href="<?php echo CLIENT_BOOKINGS_LINK . "?id=" . $booking_id . "&role=cancel_booking"; ?>" class="btn btn-xs btn-danger " style="color:#fff;"><i class="fa fa-times"></i> Cancel</a>

                		<?php } 
                		elseif($status == "Paid") { ?>
                		<img src="<?php echo IMG_URL; ?>paypal_verified.png" height="50px" alt="Paypal">
                		<?php
                	} else { ?>
                		<a href="<?php echo CLIENT_BOOKINGS_LINK . "?id=" . $booking_id; ?>" class="btn btn-xs btn-info disabled"><i class="fa fa-warning"></i> unavailable Now.</a>
                		<a href="<?php echo CLIENT_BOOKINGS_LINK . "?id=" . $booking_id . "&role=cancel_booking"; ?>" class="btn btn-xs btn-danger " style="color:#fff;"><i class="fa fa-times"></i> Cancel</a>
                		<?php } ?>
                	
                    
                </td>
                
            </tr>
            <?php 
        	 } 
        	?>
        </tbody>
    </table>
        </div>
    </section>
    </section>
    </section>
    </section>

    </section>
    </section>

    </section>
    </section>




    <?php

  include(INC_URL . "footer.php");?>

<script type="text/javascript" src="<?php echo JS_URL; ?>datatables.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#example').DataTable();
} );
</script>