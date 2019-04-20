<?php
require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

//Recoge vista a imprimir
ob_start();
require_once 'html_para_pdf.html';
$html = ob_get_clean();

$html2pdf->writeHTML($html);
$html2pdf->output(date('U') . '_pdf_generado.pdf');