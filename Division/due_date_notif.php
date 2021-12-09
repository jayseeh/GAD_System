<?php
require('../connect.php');
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d H:i:s');
$form_type = $_POST['form_type'];
//$form_type = "GPB";
$query = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE' and due_date >='$date' ");
$fetch = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE'");
$row = mysqli_fetch_assoc($fetch);
$due_date = $row['due_date'];

$datetime1 = date_create($date);
$datetime2 = date_create($due_date);

// Calculates the difference between DateTime objects
$interval = date_diff($datetime1, $datetime2);
$compare =  $interval->format('%d');
if($compare <= 7 and $compare !=0){
	echo $compare." day/s left to submit a form.";
}else{
	echo 'N';
}