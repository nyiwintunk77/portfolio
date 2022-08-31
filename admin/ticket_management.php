<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "TICKET MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $id = (int)($_GET["id"]);
        $sql = "UPDATE ticket SET deleted = 1 WHERE id = " . $id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_TICKET_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>TICKET MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_TICKET_LINK; ?>" class="btn btn-info pull-right">New Ticket</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Delivery Man</th>
                <th>Booking ID</th>
                <th>Seat Num</th>
            
               
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Delivery Man</th>
                <th>Booking ID</th>
                <th>Seat Num</th>
            
               
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM ticket WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($ticket_arr = mysqli_fetch_assoc($result)) { 
                $deli_res = mysqli_query($con,"SELECT * FROM delivery WHERE id = " . $ticket_arr["delivery_id"] );
                $deli_arr = mysqli_fetch_assoc($deli_res);
                $delivery_man = $deli_arr["person"];
                $booking_id = $ticket_arr["booking_id"];

                ?>
        	 
            <tr>
                <td><?php echo $delivery_man; ?></td>
                <td><?php echo $booking_id; ?></td>
                <td><?php echo $ticket_arr["seat_no"]; ?></td>
              
               
                <td><a href="<?php echo ADMIN_EDIT_TICKET_LINK . "?id=" . $ticket_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_TICKET_MANAGE_LINK . "?id=" . $ticket_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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