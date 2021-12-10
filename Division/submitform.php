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

		include('PHPExcel/Classes/PHPExcel/IOFactory.php');
		//TO READ EXCEL FILES
		  $html = "Successfully added";
		  $filen = date('YmdHis');
		  $target_dir = "UploadedFile/".$filen."-";
		  $fileS = "addpersonnel-".$count;
		  $target_file = $target_dir . basename($_FILES[$fileS]["name"]);
		  //$uploadOk = 1;
		  //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		  move_uploaded_file($_FILES[$fileS]["tmp_name"], $target_file);
		  $obj = PHPExcel_IOFactory::load($target_file);
		  
		  foreach ($obj->getWorksheetIterator() as $worksheet) {
		    $highRow = $worksheet->getHighestRow();
		    for( $row=13; $row<=$highRow; $row++){
		      $name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
		      $position = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
		      $gender = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
		      //echo $name." ".$position."<br>";
		      if($name!=""){
		        mysqli_query($conn,"INSERT INTO attendees(name,position,gender,division,mandate) VALUES ('$name','$position','$gender','$loc','$col1')");
		        /*$html = $html.'<tr>
		            <td>'.($row-12).'</td>
		            <td>'.$name.'</td>
		            <td>'.$position.'</td>
		             <td>'.$gender.'</td>                 
		          </tr>';*/
		      }
		      
		    } 
		  }

	}else{
		mysqli_query($conn, "INSERT INTO gad_table_entry_value (form_number,col1,col2,col3,col4,col5,col6,col7,col8,col9,requestor_id,date_requested,row_number,category_focused) VALUES ('$form_id','$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$user','$date_submitted','$count','$category')");
	}
	$totalrows= $totalrows-1; 
	$count++;
}
if(mysqli_query($conn, "INSERT INTO gad_form (form_number,requestor_id,form_status,date_submitted) VALUES ('$form_id','$user','PENDING','$date_submitted')")){
	if($form_type=='GAD'){
		echo "<script>window.location = 'gadar.php?upload_gadar';</script>";
	}else{
		echo "<script>window.location = 'gpb.php?upload_gpb';</script>";
	}
}else{
	echo "Error updating records!" . mysqli_error($conn);
}