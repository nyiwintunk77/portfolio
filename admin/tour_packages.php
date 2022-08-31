<?php
	
	require_once("../require_file.php");

	require_once(ADMIN_ROOT_URL . "admin_auth.php");
    $page_title = "TOUR PACKAGES";
    if($_GET['role'] == "delete")
    {
        $id = (int)($_GET["id"]);
        $sql = "UPDATE tourpackage SET deleted = 1 WHERE id = " . $id; 
        $result = mysqli_query($con, $sql);
        echo "<script>window.location.href='" . ADMIN_TOUR_PACKAGES_LINK . "';</script>";
        exit();

    }
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>datatables.min.css">

        <div class="content">

            <div class="container-fluid">
                 <h2>TOUR PACKAGES</h2>
<div class="row">
            		<div class="col-md-12">
            	<a href="<?php echo ADMIN_NEW_TOUR_LINK; ?>" class="btn btn-info pull-right">New Package</a>
            </div>
            </div>
            <hr/>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Package Image</th>
               
                <th width="25%">Features</th>
        
                <th>Itinerary</th>
                <th>Cost</th>
         
           
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Package Name</th>
                <th>Package Image</th>
              
                <th width="25%">Features</th>

                <th>Itinerary</th>
                <th>Cost</th>
        
            
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
        	$query = "SELECT * FROM tourpackage WHERE deleted = 0";
        	$result = mysqli_query($con, $query);
        	while ($tour_pack_arr = mysqli_fetch_assoc($result)) { 
                $car_res = mysqli_query($con,"SELECT * FROM car WHERE CarNo = " . $tour_pack_arr["car_id"] );
                $hotel_res = mysqli_query($con,"SELECT * FROM hotel WHERE hotelno = " . $tour_pack_arr["hotel_id"] );
                $restaur_res = mysqli_query($con,"SELECT * FROM restaurant WHERE id = " . $tour_pack_arr["restaurant_id"] );
                 $car_arr = mysqli_fetch_assoc($car_res);
                 $hotel_arr = mysqli_fetch_assoc($hotel_res);
                 $restaur_arr = mysqli_fetch_assoc($restaur_res);
                ?>
        	 










            <tr>
                <td><?php echo $tour_pack_arr["name"]; ?></td>
                <td><img src="<?php echo PHOTO_URL . $tour_pack_arr["photo"]; ?>" height="80px"></td>
           
                <td>
                    <p><b>Car : </b> <?php echo $car_arr["name"]; ?></p>
                    <p><b>Hotel  :</b> <?php echo $hotel_arr["name"]; ?></p>
                    <p><b>Restaurant :</b>  <?php echo $restaur_arr["name"]; ?></p>
                    <p><b>Type :</b>  <?php echo $tour_pack_arr["type"]; ?></p>

                </td>
          
                <td><?php echo $tour_pack_arr["itinerary"]; ?></td>
               
                <td>$<?php echo $tour_pack_arr["cost"]; ?></td>
   
     
              
             
                <td><a href="<?php echo ADMIN_EDIT_TOUR_LINK . "?id=" . $tour_pack_arr["id"]; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                    <a href="<?php echo ADMIN_TOUR_PACKAGES_LINK . "?id=" . $tour_pack_arr["id"] . "&role=delete"; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete</a>
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