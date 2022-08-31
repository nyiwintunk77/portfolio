<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit DESTINATION";
      $parent_page = "DESTINATION MANAGEMENT";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM destination WHERE id = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $dest_arr = mysqli_fetch_assoc($result);


      $places = $dest_arr["places"];
      $description = $dest_arr["description"];

      $duration = $dest_arr["duration"];
    

	if(isset($_REQUEST["destination_update_form"]))
	{
    $id = (int)($_REQUEST['id']);
          $places = mysqli_real_escape_string($con,$_REQUEST["places"]);
          $duration = mysqli_real_escape_string($con,$_REQUEST["duration"]);
      $description = mysqli_real_escape_string($con,$_REQUEST["description"]);

	
	

		$sql = " UPDATE destination SET places = '$places', duration = '$duration', description = '$description'WHERE id = " . $id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
		{
			header("location:" . ADMIN_DESTINATION_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h2> Destination Update Form</h2>
             <form class="form-horizontal"  role="form" method="post">
              <input type="hidden" name="destination_update_form">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="form-group">
                
              <label class="control-label">Travelling Places</label>
              <input type="text" name="places" value="<?php echo $places; ?>" placeholder="Please Enter Travelling Places" class="form-control" required>
              </div>
              <div class="form-group">
                
              <label class="control-label">Duration</label>
              <input type="text" name="duration" value="<?php echo $duration; ?>" placeholder="Please Enter Duration" class="form-control" required>
              </div>
              
           
              <div class="form-group">
                
              <label class="control-label">Description</label>
              <textarea name="description" class="form-control" required ><?php echo $description; ?></textarea>
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


           $('#checkin').inputmask("datetime");
           $('#checkout').inputmask("datetime");
    });
        </script>