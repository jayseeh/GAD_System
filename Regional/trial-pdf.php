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
$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED'  AND gad_form.form_number LIKE '%GAD%' ORDER BY gad_form.form_number"); 
//$this->Cell(280,10,'CLIENT FOCUSED',1,0,'L');
//$this->Ln();
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
//AND gad_table_entry_value.category_focused='CLIENT'
	/*$this->Cell(28,10,$row['col1'],1,0,'C');
	$this->Cell(28,10,$row['col2'],1,0,'C');
	$this->Cell(28,10,$row['col3'],1,0,'C');
	$this->Cell(28,10,$row['col4'],1,0,'C');
	$this->Cell(28,10,$row['col5'],1,0,'C');
	$this->Cell(28,10,$row['col6'],1,0,'C');
	$this->Cell(28,10,$row['col7'],1,0,'C');
	$this->Cell(28,10,$row['col8'],1,0,'C');
	$this->Cell(28,10,$row['col9'],1,0,'C');
	$this->Cell(28,10,$row['col10'],1,0,'C');
	$this->Ln();
}
$query1 = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='ORGANIZATION' AND gad_form.form_number LIKE '%GAD%' ORDER BY gad_form.form_number"); 
$this->Cell(280,10,'ORGANIZATION FOCUSED',1,0,'L');
$this->Ln();
while($row1=mysqli_fetch_assoc($query1)){
	$this->Cell(28,10,$row1['col1'],1,0,'C');
	$this->Cell(28,10,$row1['col2'],1,0,'C');
	$this->Cell(28,10,$row1['col3'],1,0,'C');
	$this->Cell(28,10,$row1['col4'],1,0,'C');
	$this->Cell(28,10,$row1['col5'],1,0,'C');
	$this->Cell(28,10,$row1['col6'],1,0,'C');
	$this->Cell(28,10,$row1['col7'],1,0,'C');
	$this->Cell(28,10,$row1['col8'],1,0,'C');
	$this->Cell(28,10,$row1['col9'],1,0,'C');
	$this->Cell(28,10,$row1['col10'],1,0,'C');
	$this->Ln();
}*/
$pdf->Output();