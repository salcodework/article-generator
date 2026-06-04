<?php
date_default_timezone_set("Asia/Kolkata");
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

$conn = new mysqli("localhost","root","","bankdb");
$Rdate=date('Y-m-d h:i:s');
?>