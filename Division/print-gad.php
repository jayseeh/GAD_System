<?php
session_start();
include "try-pdf.php";
$user = $_SESSION['uid'];
$pdf = new PDF_MC_Table();

//Add page and font
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',8);

//set width for each column
$pdf->SetWidths(Array(25,25,25,25,25,25,25,25,25,25,25));

//set line height
$pdf->SetLineHeight(5);

//set form type title
$pdf->getHeader("ANNUAL GENDER AND DEVELOPMENT (GAD) ACCOMPLISHMENT REPORT");

//load data
include '../connect.php';
date_default_timezone_set("Asia/Singapore");
$nowYear = date('Y');
$fetch_fiscal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM fiscal_year WHERE status='ACTIVE'"));
$code = $fetch_fiscal['code'];
$fiscal_start = $fetch_fiscal['start_date'];
$fiscal_end = $fetch_fiscal['end_date'];
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_table_entry_value.category_focused='CLIENT' AND gad_form.form_number LIKE '%GAD%' AND gad_form.date_submitted >= '$fiscal_start' and gad_form.date_submitted <= '$fiscal_end' and gad_form.requestor_id='$user' ORDER BY gad_form.form_number"); 
//
//$this->Ln();
$pdf->setFont('Times','B',10);
$pdf->Row(Array(
	'Gender Issue/GAD Mandate',
	'Cause of the Gender Issue',
	'GAD Result Statement/GAD Objective',
	'Relevant Organization MFO/PAP',
	'GAD Activity',
	'Performance Indicator',
	'Actual Result (Outputs/Outcomes)',
	'Total Agency Approved Budget',
	'Actual Cost/ Expenditure',
	'Variance/ Remarks',
	'FORM STATUS'
));
$pdf->setFont('Arial','',8);
$pdf->Cell(275,5,'CLIENT FOCUSED',1,0,'L');
$pdf->Ln();
while($row=mysqli_fetch_assoc($query)){
	$pdf->Row(Array(
		$row['col1'],
		$row['col2'],
		$row['col3'],
		$row['col4'],
		$row['col5'],
		$row['col6'],
		$row['col7'],
		$row['col8'],
		$row['col9'],
		$row['col10'],
		$row['form_status']
	));
}
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_table_entry_value.category_focused='ORGANIZATION' AND gad_form.form_number LIKE '%GAD%' AND gad_form.date_submitted >= '$fiscal_start' and gad_form.date_submitted <= '$fiscal_end' and gad_form.requestor_id='$user' ORDER BY gad_form.form_number");  
$pdf->Cell(275,5,'ORGANIZATION FOCUSED',1,0,'L');
$pdf->Ln();
while($row=mysqli_fetch_assoc($query)){
	$pdf->Row(Array(
		$row['col1'],
		$row['col2'],
		$row['col3'],
		$row['col4'],
		$row['col5'],
		$row['col6'],
		$row['col7'],
		$row['col8'],
		$row['col9'],
		$row['col10'],
		$row['form_status']
	));
}


$pdf->Output();