<?php
require('../connect.php');

include('PHPExcel/Classes/PHPExcel/IOFactory.php');

$obj = PHPExcel_IOFactory::load("UploadedFile/GAD_AR_Trained_Personnel_Template.xlsx");
foreach ($obj->getWorksheetIterator() as $worksheet) {
	$highRow = $worksheet->getHighestRow();
	for( $row=13; $row<=$highRow; $row++){
		$name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
		$position = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
		$gender = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
		echo $name." ".$position."<br>";
	} 
}
