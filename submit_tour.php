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
			$session_u_id = $user_arr["id"];
			$session_u_name = $user_arr["name"];
		}
	}
        $role = trim($_REQUEST["role"]);

        if($role == "submit_tour")
        {

        	if($user_exist == FALSE)
        	{
        		echo json_encode(array(
        			"err" => 1,
        			"msg" => "<div class='alert alert-info'>Click <a href='". CLIENT_MAIN_LOGIN_LINK . "'>Here</a> to Register </div>"
        			)
        		);
        		exit();
        	}

        	$package_id = (int)($_REQUEST["package_id"]);
        	$pass_no = (int)($_REQUEST["pass_no"]);
        	$departure = mysqli_real_escape_string($con,$_REQUEST["departure"]);
        	$departure = format_datetime($departure);
        	$sql = "INSERT INTO booking (package_id,  user_id, status, passengers, departure) VALUES ('$package_id', '$session_u_id', 'Booking', '$pass_no', '$departure')";
        	$result = mysqli_query($con, $sql);
        	$rows = mysqli_affected_rows($con);
        	if($rows <= 0)
        	{
        		echo json_encode(array(
        			"err" => 1,
        			"msg" => "<div class='alert alert-danger'>Booking Failure.</div>"
        			)
        		);
        	}
        	else
        	{
        		echo json_encode(array(
        			"err" => 0,
        			"msg" => "<div class='alert alert-success'>We have received your booking. We will contact you with email as soon as possible.Click <a href=\"" . CLIENT_BOOKINGS_LINK .  "\"> Here </a> to view our booking list.</div>"
        		)
        	);
        	}

        }

