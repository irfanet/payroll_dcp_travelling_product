<?php

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Irfan');
$pdf->SetTitle('Slip Gaji');
$pdf->SetSubject('Slip Gaji Pegawai');
$pdf->SetKeywords('');

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(20, 20, 20);
$pdf->SetHeaderMargin(20);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr width='100%'>
      <td colspan="5" align="center"><b>TRANSFER BANK GAJI PEGAWAI</b></td>
    </tr>
    <tr width='100%'>
      <td colspan="5"><b>DIVISI : divisi</b></td>
    </tr>
    <tr width='100%'>
      <td><b>NPP</b></td>
      <td><b>Nama</b></td>
      <td><b>Jabatan</b></td>
      <td><b>Total Gaji</b></td>
      <td><b>No Rekening</b></td>
    </tr>
    <tr width='100%'>
      <td>NPP</td>
      <td>Nama</td>
      <td>Jabatan</td>
      <td>Total Gaji</td>
      <td>No Rekening</td>
    </tr>
    <tr width='100%'>
      <td>NPP</td>
      <td>Nama</td>
      <td>Jabatan</td>
      <td>Total Gaji</td>
      <td>No Rekening</td>
    </tr>
    <tr width='100%'>
      <td>NPP</td>
      <td>Nama</td>
      <td>Jabatan</td>
      <td>Total Gaji</td>
      <td>No Rekening</td>
    </tr>
    <tr width='100%'>
      <td>NPP</td>
      <td>Nama</td>
      <td>Jabatan</td>
      <td>Total Gaji</td>
      <td>No Rekening</td>
    </tr>
    <tr width='100%'>
      <td>NPP</td>
      <td>Nama</td>
      <td>Jabatan</td>
      <td>Total Gaji</td>
      <td>No Rekening</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('transfer_bank.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
