<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "USER MANAGEMENT";
    if($_GET['role'] == "delete")
    {
        $id = (int)($_GET["id"]);
        $sql = "UPDATE customer SET deleted = 1 WHERE id = " . $id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_USER_MANAGE_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>USER MANAGEMENT</h2>
<div class="row">
            		<div class="col-md-12">
            
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>NRC</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>NRC</th>
               
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM customer WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($user_arr = mysqli_fetch_assoc($result)) { 

                ?>
        	 
            <tr>
                <td><?php echo $user_arr["name"]; ?></td>
                <td><?php echo $user_arr["phone"]; ?></td>
                <td><?php echo $user_arr["email"]; ?></td>
                <td><?php echo $user_arr["address"]; ?></td>
                <td><?php echo $user_arr["gender"]; ?></td>
                <td><?php echo $user_arr["nrc"]; ?></td>
               
                <td><a href="<?php echo ADMIN_EDIT_USER_LINK . "?id=" . $user_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_USER_MANAGE_LINK . "?id=" . $user_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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