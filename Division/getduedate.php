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

//atetime1 = date_create($date);
//$datetime2 = date_create($due_date);

// Calculates the difference between DateTime objects
//$interval = date_diff($datetime1, $datetime2);
//echo $interval->format('%d');
if(mysqli_num_rows($query)>0){
	echo "N";
}else{
	echo $due_date;
}