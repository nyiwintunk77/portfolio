<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "PURCHASE MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $booking_id = (int)($_GET["id"]);
        $sql = "UPDATE booking SET deleted = 1 WHERE id = " . $booking_id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_PURCHASE_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>PURCHASE MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>PackageName</th>
                <th>CustomerName</th>
                <th>Num of Passenger</th>
                <th>Status</th>
                <th>Departure</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Booking ID</th>
                <th>PackageName</th>
                <th>CustomerName</th>
                <th>Num of Passenger</th>
                <th>Status</th>
                <th>Departure</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM booking WHERE deleted = 0 ORDER BY id DESC";
        	$result = mysqli_query($con, $query);
        	while ($booking_arr = mysqli_fetch_assoc($result)) { 

                $booking_id = $booking_arr["id"];
                $package_id = $booking_arr["package_id"];
                $user_id = $booking_arr["user_id"];
                $passengers = $booking_arr["passengers"];
                $status = $booking_arr["status"];
                $departure = $booking_arr["departure"];
                $Departure = reformat_datetime($departure);

               
            $pack_res = mysqli_query($con, "SELECT * FROM tourpackage WHERE id = " . $package_id . " AND deleted = 0");

            $pack_arr = mysqli_fetch_assoc($pack_res);
            $package_name = $pack_arr["name"];


              $user_res = mysqli_query($con, "SELECT * FROM customer WHERE id = " . $user_id . " AND deleted = 0");

            $user_arr = mysqli_fetch_assoc($user_res);
            $customer = $user_arr["name"];

                ?>
        	 
            <tr>
                <td><?php echo  $booking_id?></td>
                <td><?php echo  $package_name?></td>
                <td><?php echo $customer; ?></td>
              
                <td><?php echo $passengers; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $departure;  ?></td>
               
                <td><a href="<?php echo ADMIN_PURCHASE_DETAIL_LINK . "?id=" . $booking_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> View</a>
                    <a href="<?php echo ADMIN_PURCHASE_MANAGE_LINK . "?id=" . $booking_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
                </td>
                
            </tr>
            <?php 
        	 } 
        	?>
        </tbody>
    </table>
</div>
</div>
<?php include(ADMIN_ROOT_URL . "admin_footer.php"); ?>
<script type="text/javascript" src="<?php echo JS_URL; ?>datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>