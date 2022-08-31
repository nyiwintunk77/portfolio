<?php 
  require_once("require_file.php");
 $user_exist = FALSE;
  if(isset($_SESSION["u_id"]))
  {
    $session_u_id = (int)($_SESSION["u_id"]);
    $sql = "SELECT * FROM customer WHERE id = " . $session_u_id . " AND deleted = 0";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_affected_rows($con);

    if($rows == 1)
    {
      $user_exist = TRUE;
      $user_arr = mysqli_fetch_assoc($result);
      $session_u_name = $user_arr["name"];
    }
  }
  $page_title  = "Edit Account Detail";
 $sql = "SELECT * FROM customer WHERE id = '" . $session_u_id . "' AND deleted = 0";
      $result = mysqli_query($con, $sql);
      $user_arr = mysqli_fetch_assoc($result);


      $name = $user_arr["name"];
      $phone = $user_arr["phone"];
      $email = $user_arr["email"];
      $address = $user_arr["address"];
      $gender = $user_arr["gender"];
      $nrc = $user_arr["nrc"];
      $pass = $user_arr["pass"];
    if(isset($_POST["form"]) && $_POST["form"] == "register")
    {
    	$name = mysqli_real_escape_string($con, $_POST["name"]);
    	$phone = mysqli_real_escape_string($con, $_POST["phone"]);
    	$gender = mysqli_real_escape_string($con, $_POST["gender"]);
    	$pass = mysqli_real_escape_string($con, $_POST["pass"]);
    	$pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
    	$address = mysqli_real_escape_string($con, $_POST["address"]);
    	$nrc = mysqli_real_escape_string($con, $_POST["nrc"]);
    	$email = mysqli_real_escape_string($con, $_POST["email"]);

    	$sql = "SELECT * FROM customer WHERE email = '" .$email . "' AND deleted = 0 ";
    	$result = mysqli_query($con, $sql);
    	$rows = mysqli_affected_rows($con);
    	if($pass != $pass2)
    	{
    		$res_err = 1;
    		$msg = "The passwords must have the same value.";
    	}
    	
    		$sql = "UPDATE customer SET name = '$name', phone = '$phone', gender = '$gender', pass = '$pass', address = '$address', nrc = '$nrc', email = '$email' WHERE id = " . $session_u_id;
    		$result = mysqli_query($con, $sql);
    		$rows = mysqli_affected_rows($con);
    
    		if($result == 1)
    		{
    		
    		    $success = 1;
            $msg = "Your Account Information is successfully saved.";
    		}
    	
    	
    }
 require("client_files.php");
  
  ?>
  <div class="container">
    <nav aria-label="breadcrumb" role="navigation" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
  </ol>
</nav>
  <div class="row">
  	

    <?php if($success == 1)
    { ?>
      <div class="alert alert-success"><?php echo $msg; ?></div>
   <?php }
    ?>
  	<div class="col-md-6 slide_show">
  		<h1 class="zt-title2" style="color:#000;text-indent: -60px;">Edit Account Detail</h1>
  		<form name="register" method="post">

  			<input type="hidden" name="form" value="register">
  			<?php if($res_err == 1)
  			{?>
  				<div class="alert alert-danger"><?php echo $msg; ?></div>
  			<?php } ?>
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
  				<input type="password" name="pass" minlength="6" value="<?php echo $pass; ?>"class="form-control" placeholder="Please Enter Password" required>
  			</div>
  			<div class="form-group">
  				<label class="control-label" style="font-size: 14pt; color: #000;">Confirm Password</label>
  				<input type="password" name="pass2" minlength="6" class="form-control" placeholder="Please Confirm Your Password" required>
  			</div>
  			<div class="form-group">
  				<button type="submit" class="btn btn-info">Save</button>
  				<button type="reset" class="btn btn-danger">Cancel</button>
  			</div>
  		</form>
  	</div>

  </div>
  </div>

  <?php
  	include(INC_URL . "footer.php");