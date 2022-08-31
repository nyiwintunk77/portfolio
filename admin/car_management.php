<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "CAR MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $car_id = (int)($_GET["id"]);
        $sql = "UPDATE car SET deleted = 1 WHERE CarNo = " . $car_id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_CAR_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>CAR MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_CAR_LINK; ?>" class="btn btn-info pull-right">New CAR</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Car Type</th>
                <th>Car Name</th>
                <th>Services</th>
                <th>Availibility</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Car Type</th>
                <th>Car Name</th>
                <th>Services</th>
                <th>Availibility</th>
               
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM car WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($car_arr = mysqli_fetch_assoc($result)) { 

                ?>
        	 
            <tr>
                <td><?php echo $car_arr["type"]; ?></td>
                <td><?php echo $car_arr["name"]; ?></td>
                <td><?php echo $car_arr["services"]; ?></td>
                <td><?php echo $car_arr["availibility"]; ?></td>
               
                <td><a href="<?php echo ADMIN_EDIT_CAR_LINK . "?id=" . $car_arr["CarNo"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_CAR_MANAGE_LINK . "?id=" . $car_arr["CarNo"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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