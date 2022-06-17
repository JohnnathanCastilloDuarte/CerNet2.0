<?php
include "pdf/PDFMerger.php";

$pdf = new PDFMerger;

$pdf->addPDF("M.pdf", "1, 3, 4")
->addPDF("P.pdf", "1-2")
->merge("download", "TEST2.pdf");

//REPLACE "file" WITH "browser", "download", "string", or "file" for output options
//You do not need to give a file path for browser, string, or download - just the name.
?>