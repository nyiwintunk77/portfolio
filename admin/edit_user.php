<?php
	
	require_once("../require_file.php");
	require_once(ADMIN_ROOT_URL . "admin_auth.php");
      $page_title = "Edit Customer";
      $parent_page = "USER MANAGEMENT";
      $id = (int)($_GET["id"]);
       $sql = "SELECT * FROM customer WHERE id = '" . $id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $user_arr = mysqli_fetch_assoc($result);


      $name = $user_arr["name"];
      $phone = $user_arr["phone"];
      $email = $user_arr["email"];
      $address = $user_arr["address"];
      $gender = $user_arr["gender"];
      $nrc = $user_arr["nrc"];
      $pass = $user_arr["pass"];
     

	if(isset($_REQUEST["update_user_form"]))
	{
    $id = (int)($_GET["id"]);
      $name = mysqli_real_escape_string($con,$_REQUEST["name"]);
      $phone = mysqli_real_escape_string($con,$_REQUEST["phone"]);
      $email = mysqli_real_escape_string($con,$_REQUEST["email"]);
      $address = mysqli_real_escape_string($con,$_REQUEST["address"]);
      $gender = mysqli_real_escape_string($con,$_REQUEST["gender"]);
      $nrc = mysqli_real_escape_string($con,$_REQUEST["nrc"]);
      $pass = mysqli_real_escape_string($con,$_REQUEST["pass"]);
	

		$sql = " UPDATE customer SET name = '$name', phone = '$phone', email = '$email', address = '$address', gender = '$gender', nrc = '$nrc', pass = '$pass' WHERE id = " . $id;
	    
		$result = mysqli_query($con, $sql);
                 
		
		if($result > 0)
		{
			header("location:" . ADMIN_USER_MANAGE_LINK);
			exit();
		}


	}
	require_once(ADMIN_ROOT_URL . "admin_files.php");
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>bootstrap.datepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ; ?>prettyfy.css">
        <div class="content">
            <div class="container-fluid">

             <h1> Edit Customer Form</h1>
             <form name="register" method="post">

        <input type="hidden" name="update_user_form" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">
       
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Name</label>
          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Please Enter Your Name" required>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Gender</label>
          <select class="form-control" name="gender" >
            <option value="">Please Choose Gender</option>
            <option <?php if($gender == "Male") { echo "selected";} ?>>Male</option>
            <option <?php if($gender == "Female") { echo "selected";} ?>>Female</option>
          </select>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Contact Number</label>
          <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" placeholder="Please Enter Your Contact Number" required>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">NRC</label>
          <input type="text" name="nrc" value="<?php echo $nrc; ?>" class="form-control" placeholder="Please Enter Your NRC" required>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Address</label>
          <textarea class="form-control" name="address"><?php echo $address; ?></textarea>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Email</label>
          <input  name="email" value="<?php echo $email; ?>" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="e.g mail@yahoo.com" required>
        </div>
        <div class="form-group">
          <label class="control-label" style="font-size: 14pt; color: #000;">Password</label>
          <input type="text" name="pass" value="<?php echo $pass; ?>" class="form-control" placeholder="Please Enter Password" required>
        </div>
       
        <div class="form-group">
          <button type="submit" class="btn btn-info">Save</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
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