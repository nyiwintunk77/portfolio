<?php
require_once("../require_file.php");
unset($_SESSION["admin_id"]);
header("location:" . ADMIN_LOGIN_URL);
exit();