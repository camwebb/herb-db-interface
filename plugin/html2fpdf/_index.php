<?php 
require_once('html2pdf.class.php');

$html2pdf = new HTML2PDF('P', 'A4', 'en');

$html2pdf->writeHTML("<h2>test</h2>");
$html2pdf->Output('random.pdf');
?>