<?php
if(!isset($_SESSION["admin_id"]) || $_SESSION["admin_id"] != 100101)
{

	header("location:" . ADMIN_LOGIN_URL );
	exit();
}