<?php
require 'fpdf.php';

class myPDF extends FPDF {
	function header(){
		$this->Image('imgreg/deped.png',135,0,25,25);
		$this->Ln(15);
		$this->SetFont('Times','B',12);
		$this->Cell(276,5,'Republic of the Philippines',0,0,'C');
		$this->Ln(5);
		$this->SetFont('Times','B',15);
		$this->Cell(276,10,'Department of Education',0,0,'C');
		$this->Ln(5);
		$this->SetFont('Times','B',10);
		$this->Cell(276,10,'Region I',0,0,'C');
		$this->Ln(10);
		$this->SetFont('Times','B',15);
		$this->Cell(276,10,'ANNUAL GENDER AND DEVELOPMENT (GAD) ACCOMPLISHMENT REPORT',0,0,'C');
		$this->Ln(20);
	}

	function footer(){
		$this->SetY(-15);
		$this->SetFont('Times','',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->setFont('Times','B',8);
		$this->Cell(28,15,'Gender Issue/GAD Mandate',1,0,'C');
		$this->Cell(28,15,'Cause of the Gender Issue',1,0,'C');
		$this->Cell(28,15,'GAD Result Statement/GAD Objective',1,0,'C');
		$this->Cell(28,15,'Relevant Organization MFO/PAP',1,0,'C');
		$this->Cell(28,15,'GAD Activity',1,0,'C');
		$this->Cell(28,15,'Performance Indicator',1,0,'C');
		$this->Cell(28,15,'Actual Result (Outputs/Outcomes)',1,0,'C');
		$this->Cell(28,15,'Total Agency Approved Budget',1,0,'C');
		$this->Cell(28,15,'Actual Cost/ Expenditure',1,0,'C');
		$this->Cell(28,15,'Variance/ Remarks',1,0,'C');
		$this->Ln();
	}
	function viewTable(){
		$this->setFont('Times','',8);
		include '../connect.php';
		$query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='CLIENT' AND gad_form.form_number LIKE '%GAD%' ORDER BY gad_form.form_number"); 
		$this->Cell(280,10,'CLIENT FOCUSED',1,0,'L');
		$this->Ln();
		while($row=mysqli_fetch_assoc($query)){
			$this->Cell(28,10,$row['col1'],1,0,'C');
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
		}
	}
	/*function WordWrap(&$text, $maxwidth)
	{
	    $text = trim($text);
	    if ($text==='')
	        return 0;
	    $space = $this->GetStringWidth(' ');
	    $lines = explode("\n", $text);
	    $text = '';
	    $count = 0;

	    foreach ($lines as $line)
	    {
	        $words = preg_split('/ +/', $line);
	        $width = 0;

	        foreach ($words as $word)
	        {
	            $wordwidth = $this->GetStringWidth($word);
	            if ($wordwidth > $maxwidth)
	            {
	                // Word is too long, we cut it
	                for($i=0; $i<strlen($word); $i++)
	                {
	                    $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
	                    if($width + $wordwidth <= $maxwidth)
	                    {
	                        $width += $wordwidth;
	                        $text .= substr($word, $i, 1);
	                    }
	                    else
	                    {
	                        $width = $wordwidth;
	                        $text = rtrim($text)."\n".substr($word, $i, 1);
	                        $count++;
	                    }
	                }
	            }
	            elseif($width + $wordwidth <= $maxwidth)
	            {
	                $width += $wordwidth + $space;
	                $text .= $word.' ';
	            }
	            else
	            {
	                $width = $wordwidth + $space;
	                $text = rtrim($text)."\n".$word.' ';
	                $count++;
	            }
	        }
	        $text = rtrim($text)."\n";
	        $count++;
	    }
	    $text = rtrim($text);
	    return $count;
	}*/
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output(); 