<?php
set_time_limit(0);
ini_set('memory_limit', '-1');

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator("Fardhani");
$pdf->SetAuthor('Fardhani');
$pdf->SetTitle('Transfer Bank Gaji');
$pdf->SetSubject('Transfer Bank Gaji Pegawai');
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
$pdf->SetAutoPageBreak(TRUE, 10);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

$tbl = '
<table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td><b>DCP TRAVELLING PRODUCT</b></td>
    </tr>
    <tr width="100%">
      <td><b>PERIODE: ' . $gaji[0]["kd_periode"] . '</b></td>
    </tr>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = '';
for ($i = 0, $j = 1; $i < sizeof($gaji); $i = $i + 1, $j++) :
  if($i == 0){
    $tbl = $tbl . '
    <table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td colspan="6" align="center"><b>TRANSFER BANK GAJI PEGAWAI</b></td>
    </tr>
    <tr width="100%">
      <td colspan="6"><b>DEPARTEMEN : '. $gaji[$i]["nama_departemen"] .'</b><br></td>
    </tr>
    <tr width="100%">
      <td style="border-bottom: 1pt solid black;" width="5%"><b>No</b></td>
      <td style="border-bottom: 1pt solid black;" width="20%"><b>NIK</b></td>
      <td style="border-bottom: 1pt solid black;" width="30%"><b>Nama</b></td>
      <td style="border-bottom: 1pt solid black;" width="10%"><b>Jabatan</b></td>
      <td style="border-bottom: 1pt solid black;" width="20%"><b>Total Gaji</b></td>
      <td style="border-bottom: 1pt solid black;" width="15%"><b>No Rekening</b></td>
    </tr>';
  }
  else if($gaji[$i]["nama_departemen"] != $gaji[$i-1]["nama_departemen"] && $i != 0){
    $j=1;
    $tbl = $tbl . '
    </table><br pagebreak="true"/><table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td colspan="6" align="center"><b>TRANSFER BANK GAJI PEGAWAI</b></td>
    </tr>
    <tr width="100%">
      <td colspan="6"><b>DEPARTEMEN : '. $gaji[$i]["nama_departemen"] .'</b><br></td>
    </tr>
    <tr width="100%">
      <td style="border-bottom: 1pt solid black;" width="5%"><b>No</b></td>
      <td style="border-bottom: 1pt solid black;" width="20%"><b>NIK</b></td>
      <td style="border-bottom: 1pt solid black;" width="30%"><b>Nama</b></td>
      <td style="border-bottom: 1pt solid black;" width="10%"><b>Jabatan</b></td>
      <td style="border-bottom: 1pt solid black;" width="20%"><b>Total Gaji</b></td>
      <td style="border-bottom: 1pt solid black;" width="15%"><b>No Rekening</b></td>
    </tr>';
  }
  $tbl = $tbl . '
    <tr width="100%">
      <td style="border-bottom: 1pt solid black;">' . $j . '</td>
      <td style="border-bottom: 1pt solid black;">' . $gaji[$i]["nik"] . '</td>
      <td style="border-bottom: 1pt solid black;">' . $gaji[$i]["nama"] . '</td>
      <td style="border-bottom: 1pt solid black;">' . $gaji[$i]["nama_jabatan"] . '</td>
      <td style="border-bottom: 1pt solid black;">IDR ' . nominal($gaji[$i]["total_gaji"]) . '</td>
      <td style="border-bottom: 1pt solid black;">' . $gaji[$i]["norek"] . '</td>
    </tr>';
endfor;

$pdf->writeHTML($tbl, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('TRANSFER_BANK.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
