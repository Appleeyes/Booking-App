<?php
require_once('tcpdf/tcpdf.php');

// Start the session
session_start();

// Retrieve the table content from the session
$content = isset($_POST['table_content']) ? urldecode($_POST['table_content']) : '';

// Create a new PDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Information PDF');
$pdf->SetSubject('Information');
$pdf->SetKeywords('Information, PDF, Download');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Write the table structure
$pdf->writeHTML('<table border="1">' . $content . '</table>', true, false, true, false, '');

// Clear any existing output buffers
ob_clean();

// Output the PDF as a download
$pdf->Output('information.pdf', 'D');
