<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$Uid=$_SESSION['userid'];
$Amount=$_POST['Amount'];
$thash=$_POST["thash"];
$bhash=$_POST["bhash"];
$bnum=$_POST["bnum"];

$a=$conn->query("INSERT INTO transaction(CUID,DUID,Tdt,Amount,thash,bhash,bnum) VALUES ('$id','$Uid',now(),'$Amount','$thash','$bhash','$bnum')");

echo "<font color='#0000FF' >Payment Transfer Successfully..!</font>";
		
?>
