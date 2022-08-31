<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "HOTEL MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $hotel_id = (int)($_GET["id"]);
        $sql = "UPDATE hotel SET deleted = 1 WHERE hotelno = " . $hotel_id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_HOTEL_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>HOTEL MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_HOTEL_LINK; ?>" class="btn btn-info pull-right">New Hotel</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>RoomType</th>
                <th>Num of Rooms</th>
                <th>Location</th>
                <th>Standard &amp; Services</th>
                <th>Phone</th>
                <th>CheckIn/CheckOut</th>
                <th>Responsible Person</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>RoomType</th>
                <th>Num of Rooms</th>
                <th>Location</th>
                <th>Standard &amp; Services</th>
                <th>Phone</th>
                <th>CheckIn/CheckOut</th>
                <th>Responsible Person</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM hotel WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($hotel_arr = mysqli_fetch_assoc($result)) { 
                $location  = substr($hotel_arr["location"], 0, 100) . "...";
                $service  = substr($hotel_arr["service"], 0, 100) . "...";
                ?>
        	 
            <tr>
                <td><?php echo $hotel_arr["name"]; ?></td>
                <td><?php echo $hotel_arr["roomtype"]; ?></td>
                <td><?php echo $hotel_arr["num_of_room"]; ?></td>
                <td><?php echo $location; ?></td>
                <td><?php echo $hotel_arr["standard"] . "<br/>" . $service; ?></td>
                <td><?php echo $hotel_arr["phone"];  ?></td>
                <td><?php echo reformat_datetime($hotel_arr["CheckIn"]) . "<br/>" . reformat_datetime($hotel_arr["CheckOut"]); ?></td>
                <td><?php echo $hotel_arr["staff_name"]; ?></td>
                <td><a href="<?php echo ADMIN_EDIT_HOTEL_LINK . "?id=" . $hotel_arr["hotelno"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_HOTEL_MANAGE_LINK . "?id=" . $hotel_arr["hotelno"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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