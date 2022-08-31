<?php
	$header_title_trail = " ::: MovingForward";
	$db_admin_username = "admin";
	$db_admin_pass = "0192023a7bbd73250516f069df18b500"; //admin123
	define("DB_HOST", "localhost");
	define("DB_NAME", "travelandtour");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("THIS_YEAR", date('Y'));


	function format_datetime($datetime)
		{
		list($date, $time) = explode(" ", $datetime);
		list($day, $month, $year) = explode("/", $date);
		list($hour, $minute) = explode(":", $time);
		$new_form = $year . "-" . $month . "-" . $day . " " . $hour . ":" . $minute . ":" . "00";
		return $new_form;
	}


	function reformat_datetime($datetime)
		{
		list($date, $time) = explode(" ", $datetime);
		list($year, $month, $day) = explode("-", $date);
		list($hour, $minute) = explode(":", $time);
		$new_form = $day . "/" . $month . "/" . $year . " " . $hour . ":" . $minute . ":" . "00";
		return $new_form;
	}