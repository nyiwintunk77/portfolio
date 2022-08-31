<?php
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
	require_once(INC_URL . "tpl_html_head.php");
	require_once(INC_URL . "header.php");