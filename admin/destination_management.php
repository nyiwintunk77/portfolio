<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "DESTINATION MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $id = (int)($_GET["id"]);
        $sql = "UPDATE destination SET deleted = 1 WHERE id = " . $id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_DESTINATION_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>DESTINATION MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_DESTINATION_LINK; ?>" class="btn btn-info pull-right">New Destination</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Travelling Places</th>
                <th>Duration</th>
                <th>Description</th>
        
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Travelling Places</th>
                <th>Duration</th>
                <th>Description</th>
        
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM destination WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($destination_arr = mysqli_fetch_assoc($result)) { 

                ?>
        	 
            <tr>
                <td><?php echo $destination_arr["places"]; ?></td>
                <td><?php echo $destination_arr["duration"]; ?></td>
                <td><?php echo $destination_arr["description"]; ?></td>
                
               
                <td><a href="<?php echo ADMIN_EDIT_DESTINATION_LINK . "?id=" . $destination_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_DESTINATION_MANAGE_LINK . "?id=" . $destination_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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