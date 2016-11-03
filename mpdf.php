<?php

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Create an instance of the class:
$mpdf = new mPDF();


$mpdf->showWatermarkText  = true;
$mpdf->showWatermarkImage = true;
$mpdf->SetWatermarkText('PHP <3', 0.15);
$mpdf->SetWatermarkImage("./ex1/tux.png", 1, [14.41,16.66], [5,5]);
$mpdf->setFooter('{PAGENO}');



// WriteHTML($string [, $type])
// $type: 0 - whole document
//        1 - only css style
//        2 - only html
$mpdf->WriteHTML(file_get_contents('ex1/master.css'), 1);
$mpdf->WriteHTML(file_get_contents('ex1/index.html'), 0);

// Output a PDF file directly to the browser
$mpdf->Output();
