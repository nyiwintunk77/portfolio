<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "DELIVERY MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $id = (int)($_GET["id"]);
        $sql = "UPDATE delivery SET deleted = 1 WHERE id = " . $id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_DELIVERY_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>DELIVERY MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_DELIVERY_LINK; ?>" class="btn btn-info pull-right">New Delivery</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Staff Name</th>
                <th>Duration</th>
                <th>Delivery Fees</th>
             
               
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Staff Name</th>
                <th>Duration</th>               
                <th>Delivery Fees</th>               
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM delivery WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($delivery_arr = mysqli_fetch_assoc($result)) { 

                ?>
        	 
            <tr>
                <td><?php echo $delivery_arr["person"]; ?></td>
                <td><?php echo $delivery_arr["duration"]; ?></td>
                <td>$<?php echo $delivery_arr["fees"]; ?></td>
                
               
                <td><a href="<?php echo ADMIN_EDIT_DELIVERY_LINK . "?id=" . $delivery_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_DELIVERY_MANAGE_LINK . "?id=" . $delivery_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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