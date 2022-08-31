<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit RESTAURANT";
      $parent_page = "RESTAURANT MANAGEMENT";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM restaurant WHERE id = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $restaurant_arr = mysqli_fetch_assoc($result);


     $name = $restaurant_arr["name"];
     $place = $restaurant_arr["place"];
     $contact = $restaurant_arr["contact"];
     $contactperson = $restaurant_arr["contactperson"];
     $meal_type = $restaurant_arr["meal_type"];
     $treatment_type = $restaurant_arr["treatment_type"];
     $datetime = reformat_datetime($restaurant_arr["datetime"]);


	if(isset($_REQUEST["restaurant_update_form"]))
	{
    $id = (int)($_GET["id"]);
           $name = mysqli_real_escape_string($con,$_REQUEST["name"]);
    $place = mysqli_real_escape_string($con,$_REQUEST["place"]);
    $contact = mysqli_real_escape_string($con,$_REQUEST["contact"]);
        $contactperson = mysqli_real_escape_string($con,$_REQUEST["contactperson"]);
        $meal_type = mysqli_real_escape_string($con,$_REQUEST["meal_type"]);
        $treatment_type = mysqli_real_escape_string($con,$_REQUEST["treatment_type"]);
    $datetime = mysqli_real_escape_string($con,$_REQUEST["datetime"]);
     $datetime = format_datetime($datetime);
	

		$sql = " UPDATE restaurant SET name = '$name', place = '$place', contact = '$contact', contactperson = '$contactperson', meal_type = '$meal_type', treatment_type = '$treatment_type', datetime = '$datetime'  WHERE id = " . $id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
		{
			header("location:" . ADMIN_RESTAURANT_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Edit Restaurant Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             <input type="hidden" name="restaurant_update_form">
             <input type="hidden" name="id" value="<?php echo $id; ?>">

              <div class="form-group">
                    <label class="control-label">Restaurant Name</label>
              <input type="text" name="name" placeholder="Please Enter Restaurant Name" value="<?php echo $name; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                
              <label class="control-label">Restaurant Place</label>
              <input type="text" name="place" placeholder="Please Enter Restaurant Place" value="<?php echo $place; ?>" class="form-control" required>
              </div>
              
           
                

                <div class="form-group">
                    
                <label class="control-label">Contact Number</label>
                <input type="text" name="contact" placeholder="Please Enter Contact Number" value="<?php echo $contact; ?>"  class="form-control" required>
                </div>

              <div class="form-group">
                
              <label class="control-label">Contact Person</label>
              <input type="text" name="contactperson" placeholder="Please Enter Contact Person" value="<?php echo $contactperson; ?>" class="form-control" required>
              </div>

                <div class="form-group">
                    
                <label class="control-label">Meal Type</label>
                <input type="text" name="meal_type" placeholder="Please Enter Meal Type" value="<?php echo $meal_type; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    
                <label class="control-label">Treatment Type</label>
                <input type="text" name="treatment_type" placeholder="Please Enter Treatment Type" value="<?php echo $treatment_type; ?>" class="form-control" required>
                </div>
              <div class="form-group">
              <label class="control-label">DateTime</label>
            <input type="text" name="datetime" id="datetime" value="<?php echo $datetime; ?>"  class="form-control" required>
         
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-info">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
              </div>
             </form>
		        </div>
	

      



</div>


<?php include(ADMIN_ROOT_URL . "admin_footer.php"); ?>


  
<script src="<?php echo JS_URL; ?>jquery.inputmask.bundle.js"></script>
<script src="<?php echo JS_URL; ?>inputmask/phone-codes/phone.js"></script>
<script src="<?php echo JS_URL; ?>scale.fix.js"></script>

<script type="text/javascript">
	jQuery(function(){


           $('#datetime').inputmask("datetime");
           
    });
        </script>