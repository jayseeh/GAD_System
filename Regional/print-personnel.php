<?php
include "try-pdf.php";
session_start(); 
//$form_type = $_GET['id'];
$pdf = new PDF_MC_Table();

//Add page and font
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',8);

//set width for each column
$pdf->SetWidths(Array(56,56,56,56,56,56));

//set line height
$pdf->SetLineHeight(5);

//set form type title
$pdf->getHeader("Attendees");

//load data
include '../connect.php';
date_default_timezone_set("Asia/Singapore");

if(isset($_SESSION['code'])){
  $code = $_SESSION['code'];
}else{
  $code = date('Y');
}
$nowYear = date('Y');
$fetch_fiscal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM fiscal_year WHERE code='$code'"));
$fiscal_start = $fetch_fiscal['start_date'];
$fiscal_end = $fetch_fiscal['end_date'];
$query = mysqli_query($conn,"SELECT * FROM attendees ORDER BY id"); 
//
//$this->Ln();
$pdf->setFont('Times','B',10);
$pdf->Row(Array(
	'Name',
	'Position',
	'Gender',
	'Division',
	'Mandate'
));
$pdf->setFont('Arial','',8);

while($row=mysqli_fetch_assoc($query)){
	$pdf->Row(Array(
		$row['name'],
		$row['position'],
		$row['gender'],
		$row['division'],
		$row['mandate']
	));
}


$pdf->Output();