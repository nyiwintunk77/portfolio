<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit Delivery";
      $parent_page = "DELIVERY MANAGEMENT";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM delivery WHERE id = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $arr = mysqli_fetch_assoc($result);


      $name = $arr["person"];
  

      $duration = $arr["duration"];
      $fees = $arr["fees"];
    

	if(isset($_REQUEST["delivery_update_form"]))
	{
            $id = (int)($_REQUEST["id"]);
		$name = mysqli_real_escape_string($con,$_REQUEST["name"]);
    $fees = mysqli_real_escape_string($con,$_REQUEST["fees"]);
		$duration = mysqli_real_escape_string($con,$_REQUEST["duration"]);
	

	

		$sql = " UPDATE delivery SET person = '$name', duration = '$duration', fees = '$fees' WHERE id = " . $id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
		{
			header("location:" . ADMIN_DELIVERY_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Edit Delivery Form</h1>
             <form class="form-horizontal"  role="form" method="post">
             	<input type="hidden" name="delivery_update_form">
             	<div class="form-group">
             		<input type="hidden" name="id" value="<?php echo $id; ?>">
             	<label class="control-label">Staff Name</label>
             	<input type="text" name="name" placeholder="Please Enter Car Name"  value="<?php echo $name; ?>" class="form-control" required>
             	</div>
             	<div class="form-group">
             		
             	<label class="control-label">Duration</label>
             	<input type="text" name="duration" placeholder="Please Enter Car Type"  value="<?php echo $duration; ?>" class="form-control" required>
             	</div>
             
             	<div class="form-group">
             		
             	<label class="control-label">Delivery Fees</label>
             	<input type="number" class="form-control" name="fees" value="<?php echo $fees; ?>">
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