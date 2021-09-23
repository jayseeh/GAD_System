<?php
session_start();
include "../connect.php";

$date_submitted = $_POST['date_sub'];
$totalrows=$_POST['numberOfRows'];
$user = $_SESSION['uid'];
$form_id = $_POST['form_id'];
$count=1;
$form_type= $_POST['form_type'];
while ( $totalrows > 0) {

	$col1= $_POST["val1-".$count];
	$col2= $_POST["val2-".$count];
	$col3= $_POST["val3-".$count];
	$col4= $_POST["val4-".$count];
	$col5= $_POST["val5-".$count];
	$col6= $_POST["val6-".$count];
	$col7= $_POST["val7-".$count];
	$col8= $_POST["val8-".$count];
	$col9= $_POST["val9-".$count];
	$category= $_POST["cat-".$count];
	if($form_type=='GAD'){
		$col10= $_POST["val10-".$count];
		mysqli_query($conn, "INSERT INTO gad_table_entry_value (form_number,col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,requestor_id,date_requested,row_number,category_focused) VALUES ('$form_id','$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$col10','$user','$date_submitted','$count','$category')");	
	}else{
		mysqli_query($conn, "INSERT INTO gad_table_entry_value (form_number,col1,col2,col3,col4,col5,col6,col7,col8,col9,requestor_id,date_requested,row_number,category_focused) VALUES ('$form_id','$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$user','$date_submitted','$count','$category')");
	}
	$totalrows= $totalrows-1; 
	$count++;
}
if(mysqli_query($conn, "INSERT INTO gad_form (form_number,requestor_id,form_status,date_submitted) VALUES ('$form_id','$user','PENDING','$date_submitted')")){
	echo "<script>alert('Successfully create a form'); window.location = 'gpb.php';</script>";
}else{
	echo "Error updating records!" . mysqli_error($conn);
}