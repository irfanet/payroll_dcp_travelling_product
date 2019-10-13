<?php

// create new PDF document
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Fardhani');
$pdf->SetTitle('Absensi');
$pdf->SetSubject('Absensi Pegawai');
$pdf->SetKeywords('');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(20);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
  <tr width="100%">
    <td rowspan="2" colspan="2" width="15%">NIK dan Nama</td>
    <td colspan="3" align="center">Tanggal</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>


  <tr>
    <td colspan="2" rowspan="2">Pegawai</td>
    
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>
  <tr>
    
    
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
    <td>Tanggal</td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('ABSENSI.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
