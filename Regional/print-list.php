<?php
include "try-pdf.php";
session_start(); 
$form_type = $_GET['id'];
$pdf = new PDF_MC_Table();

//Add page and font
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',8);

//set width for each column
$pdf->SetWidths(Array(56,56,56,56,56,56));

//set line height
$pdf->SetLineHeight(5);

//set form type title
$pdf->getHeader("FORM LIST OF ".$form_type);

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
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN caps ON gad_form.approver_id=caps.id WHERE form_status='APPROVED' and form_number LIKE '%".$form_type."%' AND gad_form.date_submitted >= '$fiscal_start' and gad_form.date_submitted <= '$fiscal_end'ORDER BY date_submitted"); 
//
//$this->Ln();
$pdf->setFont('Times','B',10);
$pdf->Row(Array(
	'Requestor Name',
	'Division',
	'Date Submitted',
	'Approver',
	'Date Approved'
));
$pdf->setFont('Arial','',8);

while($row=mysqli_fetch_assoc($query)){
	$req_user = $row['requestor_id'];
    $sql_req_name = mysqli_query($conn,"SELECT * FROM caps WHERE id ='$req_user'");
    $fetch_req_user = mysqli_fetch_assoc($sql_req_name);
	$pdf->Row(Array(
		$fetch_req_user['firstname']." ".$fetch_req_user['lastname'],
		$fetch_req_user['location'],
		$row['date_submitted'],
		$row['firstname']." ".$row['lastname'],
		$row['date_approved']
	));
}


$pdf->Output();