<?php
require_once("require_file.php");
unset($_SESSION["u_id"]);
header("location:" . CLIENT_MAIN_LOGIN_LINK);
exit();