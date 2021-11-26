<?php
require('../connect.php');
date_default_timezone_set("Asia/Singapore");
$date = date('Y-m-d H:i:s');
$form_type = $_POST['form_type'];
$query = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE' and due_date >='$date' ");
$fetch = mysqli_query($conn,"SELECT * FROM due_dates WHERE form_type='$form_type' and status='ACTIVE'");
$row = mysqli_fetch_assoc($fetch);
$due_date = $row['due_date'];
if(mysqli_num_rows($query)>0){
	echo "N";
}else{
	echo $due_date;
}