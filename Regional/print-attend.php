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
		$this->Cell(276,10,'ATTENDEES',0,0,'C');
		$this->Ln(20);
	}

	function footer(){
		$this->SetY(-15);
		$this->SetFont('Times','',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->setFont('Times','B',8);
		$this->Cell(70,15,'Name',1,0,'C');
		$this->Cell(70,15,'Position',1,0,'C');
		$this->Cell(70,15,'Gender',1,0,'C');
		$this->Cell(70,15,'Division',1,0,'C');
		$this->Ln();
	}
	function viewTable(){
		$this->setFont('Times','',8);
		include '../connect.php';
		$query = mysqli_query($conn,"SELECT * FROM attendees"); 
		while($row=mysqli_fetch_assoc($query)){
			$this->Cell(70,10,$row['name'],1,0,'C');
			$this->Cell(70,10,$row['position'],1,0,'C');
			$this->Cell(70,10,$row['gender'],1,0,'C');
			$this->Cell(70,10,$row['division'],1,0,'C');
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