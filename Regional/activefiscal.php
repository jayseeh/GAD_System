<?php
session_start();
include "../connect.php";
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d H:i:s');

$code = $_POST['thecode'];
$queryin = mysqli_query($conn,"UPDATE fiscal_year SET status='INACTIVE' WHERE code!='$code'");
$queryac = mysqli_query($conn,"UPDATE fiscal_year SET status='ACTIVE' WHERE code='$code'");


$_SESSION['code'] = $code;

if($queryac){
	echo "<script>window.location ='fiscalyear.php?activate_fiscal';</script>";
}else{
	echo "Error updating records!" . mysqli_error($conn);
}