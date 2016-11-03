<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 30, 20, 10, 5);

$mpdf->SetTitle("Generating PDF with PHP + HTML + CSS");
$mpdf->showWatermarkText  = true;
$mpdf->SetWatermarkText('PHP <3', 0.15);

// Config Header
$mpdf->DefHeaderByName('_default', array(
  'L' => array(
    'content'   => '<img src="./ex1/tux.png" width="30" />'
  ),
  'C' => array(
    'content'   => file_get_contents('./ex1/header.html'),
    'font-size' => 30.5
  ),
));
$mpdf->SetHeaderByName('_default', 'O', true);

// Config Footer
$mpdf->SetHTMLFooter(file_get_contents('./ex1/footer.html'), 'O');

// WriteHTML($string [, $type])
// $type: 0 - whole document
//        1 - only css style
//        2 - only html
$mpdf->WriteHTML(file_get_contents('ex1/master.css'), 1);
$mpdf->WriteHTML(file_get_contents('ex1/index.html'), 2);

// Output a PDF file directly to the browser
$mpdf->Output();
