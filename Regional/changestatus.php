<?php
include("../connect.php");

$id = $_POST['id'];
$status = $_POST['status'];
if($status=='ACTIVE'){
	$toStatus='INACTIVE';
}else{
	$toStatus='ACTIVE';
}
echo $id;

if(mysqli_query($conn, "UPDATE caps set status='$toStatus' where id='$id'")){
	echo "<script>window.location = 'divisionmanagement.php';</script>";
}else{
	echo "Error updating records!" . mysqli_error($conn);
}