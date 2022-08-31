<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "RESTAURANT MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $car_id = (int)($_GET["id"]);
        $sql = "UPDATE restaurant SET deleted = 1 WHERE id = " . $car_id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_RESTAURANT_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                <h2>RESTAURANT MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_RESTAURANT_LINK; ?>" class="btn btn-info pull-right">New Restaurant</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Place</th>
                <th>Contact</th>
                <th>Contact Person</th>
                <th>Meal Type</th>
                <th>Treatment Type</th>
                <th>DateTime</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Name</th>
                <th>Place</th>
                <th>Contact</th>
                <th>Contact Person</th>
                <th>Meal Type</th>
                <th>Treatment Type</th>
                <th>DateTime</th>
               
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM restaurant WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($restaurant_arr = mysqli_fetch_assoc($result)) { 

                ?>
        	 
            <tr>
                <td><?php echo $restaurant_arr["name"]; ?></td>
                <td><?php echo $restaurant_arr["place"]; ?></td>
                <td><?php echo $restaurant_arr["contact"]; ?></td>
                <td><?php echo $restaurant_arr["contactperson"]; ?></td>
                <td><?php echo $restaurant_arr["meal_type"]; ?></td>
                <td><?php echo $restaurant_arr["treatment_type"]; ?></td>
                <td><?php echo $restaurant_arr["datetime"]; ?></td>
               
                <td><a href="<?php echo ADMIN_EDIT_RESTAURANT_LINK . "?id=" . $restaurant_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_RESTAURANT_MANAGE_LINK . "?id=" . $restaurant_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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