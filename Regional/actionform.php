<?php
session_start();
include "../connect.php";
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d H-i-s');
$form = $_POST['form_id'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];
$user = $_SESSION['uid'];

if(mysqli_query($conn, "UPDATE gad_form SET form_status='$status', approver_id='$user', date_approved='$date', remarks='$remarks' WHERE form_number='$form'")){
	echo "<script>window.location = 'reggpb.php?approved';</script>";
}else{
	echo "Error updating records!" . mysqli_error($conn);
}