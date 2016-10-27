<?php

// create new PDF document
//tcpdf loaded via Composer from https://packagist.org/packages/tecnick.com/tcpdf
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true);

// set document header information. This appears at the top of each page of the PDF document
$pdf->SetHeaderData('', '',"Visit", '');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 20));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED,'', 12);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

$pdf->Ln();

$pdf->SetFillColor(114, 155, 120);

//Column titles
$header = array('Name', 'Date', 'Start_time', 'End_time');

$table= $this->PDF->ColouredTable($header, $visits);

$pdf->writeHTML($table, true, true, true,true,'');
ob_clean();

//Close and output PDF document
$pdf->Output('visits.pdf', 'D');
//echo $table;
//print_r($visits);
exit();
?>
