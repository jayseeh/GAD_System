<?php
include "try-pdf.php";

$pdf = new PDF_MC_Table();

//Add page and font
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','',8);

//set width for each column
$pdf->SetWidths(Array(28,28,28,28,28,28,28,28,28,28));

//set line height
$pdf->SetLineHeight(5);

//load data
include '../connect.php';
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='CLIENT'  AND gad_form.form_number LIKE '%GAD%' ORDER BY gad_form.form_number"); 
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
	'Variance/ Remarks'
));
$pdf->setFont('Arial','',8);
$pdf->Cell(280,5,'CLIENT FOCUSED',1,0,'L');
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
		$row['col10']
	));
}
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='ORGANIZATION'  AND gad_form.form_number LIKE '%GAD%' ORDER BY gad_form.form_number"); 
$pdf->Cell(280,5,'ORGANIZATION FOCUSED',1,0,'L');
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
		$row['col10']
	));
}


$pdf->Output();