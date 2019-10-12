<?php

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Irfan');
$pdf->SetTitle('Slip Gaji');
$pdf->SetSubject('Slip Gaji Pegawai');
$pdf->SetKeywords('');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td><b>DCP TRAVELLING PRODUCT</b></td>
    </tr>
    <tr width="100%">
      <td><b>PERIODE: </b></td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td colspan="6" align="center"><b>TRANSFER BANK GAJI PEGAWAI</b></td>
    </tr>
    <tr width="100%">
      <td colspan="6"><b>DEPARTEMEN : departemen</b><br></td>
    </tr>
    <tr width="100%">
      <td style="border-bottom: 1pt solid black;"><b>No</b></td>
      <td style="border-bottom: 1pt solid black;"><b>NIK</b></td>
      <td style="border-bottom: 1pt solid black;"><b>Nama</b></td>
      <td style="border-bottom: 1pt solid black;"><b>Jabatan</b></td>
      <td style="border-bottom: 1pt solid black;"><b>Total Gaji</b></td>
      <td style="border-bottom: 1pt solid black;"><b>No Rekening</b></td>
    </tr>
    <tr width="100%">
      <td style="border-bottom: 1pt solid black;">No</td>
      <td style="border-bottom: 1pt solid black;">NIK</td>
      <td style="border-bottom: 1pt solid black;">Nama</td>
      <td style="border-bottom: 1pt solid black;">Jabatan</td>
      <td style="border-bottom: 1pt solid black;">Total Gaji</td>
      <td style="border-bottom: 1pt solid black;">No Rekening</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('TRANSFER_BANK.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
