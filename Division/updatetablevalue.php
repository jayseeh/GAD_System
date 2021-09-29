<?php
//echo $_POST['numberOfRows'];
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
	$rownum = strval($count);
	//echo $rownum;
	if($form_type=='GAD'){
		$col10= $_POST["val10-".$count];
		//,col2='$col2',col3='$col3',col4='$col4',col5='$col5',col6='$col6',col7='$col7',col8='$col8',col9='$col9',col0='$col10',category_focused='$category'
		mysqli_query($conn, "UPDATE gad_table_entry_value SET col1='$col1',col2='$col2',col3='$col3',col4='$col4',col5='$col5',col6='$col6',col7='$col7',col8='$col8',col9='$col9',col10='$col10',category_focused='$category' WHERE form_number='$form_id' AND row_number='$rownum'");	
		echo "<script>alert('Successfully updated GAD the form'); window.location = 'gadpendingform.php';</script>";
	}else{
		mysqli_query($conn, "UPDATE gad_table_entry_value SET col1='$col1',col2='$col2',col3='$col3',col4='$col4',col5='$col5',col6='$col6',col7='$col7',col8='$col8',col9='$col9',category_focused='$category' WHERE form_number='$form_id' AND row_number='$count'");
		echo "<script>alert('Successfully updated GPB the form'); window.location = 'pendingform.php';</script>";
	}
	$totalrows= $totalrows-1; 
	$count++;
}

/*if(mysqli_query($conn, "INSERT INTO gad_form (form_number,requestor_id,form_status,date_submitted) VALUES ('$form_id','$user','PENDING','$date_submitted')")){
	if($form_type=='GAD'){
		echo "<script>alert('Successfully create a form'); window.location = 'gadar.php';</script>";
	}else{
		echo "<script>alert('Successfully create a form'); window.location = 'gpb.php';</script>";
	}
}else{
	echo "Error updating records!" . mysqli_error($conn);
}*/