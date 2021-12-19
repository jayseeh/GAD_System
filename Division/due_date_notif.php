<?php
require('../connect.php');
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d');
$form_type = $_POST['form_type'];
//$form_type = "GPB";
$query = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE' and due_date >='$date' ");
$fetch = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE'");
$row = mysqli_fetch_assoc($fetch);
$due_date = $row['due_date'];



// Calculates the difference between DateTime objects
if($date==$due_date){
	echo 'N';
}elseif ($date<$due_date) {
	$datetime1 = date_create($date);
	$datetime2 = date_create($due_date);
	$interval = date_diff($datetime1, $datetime2);
	$compare =  (int)$interval->format('%a');
	if($compare <= 7 and $compare>=1){
		echo $compare." day/s left to submit a ".$form_type." details. <br> Due date: ".$due_date;
	}
	else{
		echo 'N';
	}
}else{
	echo 'N';
}