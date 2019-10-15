<?php
set_time_limit(0);
ini_set('memory_limit', '-1');

// create new PDF document
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator("Fardhani");
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

$lebar = sizeof($kalender_detail) * 21;
$header = '
<table cellspacing="0" cellpadding="1" border="1">
  <tr width="100%">
    <td rowspan="2" colspan="2" width="15%">NIK dan Nama</td>
    <td rowspan="2" style="width: 30px;"></td>
    <td colspan="' . sizeof($kalender_detail) . '" align="center" style="width: ' . $lebar . 'px;">Tanggal</td>
  </tr>
  <tr>';
$tbl = $header;
for ($i = 0; $i < sizeof($kalender_detail); $i++) :
  $header = $header . '<td style="width: 21px;">' . $kalender_detail[$i]["hari"] . ' (' . $kalender_detail[$i]["status"] . ')</td>';
  $tbl = $tbl . '<td style="width: 21px;">' . $kalender_detail[$i]["hari"] . ' (' . $kalender_detail[$i]["status"] . ')</td>';
endfor;
$header = $header . '</tr>';
$tbl = $tbl . '</tr>';

for ($i = 0, $j = 1; $i < sizeof($gaji); $i++, $j++) :
  $col1 = '';
  $col2 = '';
  $col4 = '';
  $col5 = '';
  for ($k = 0; $k < sizeof($kalender_detail); $k++) :
    for ($l = 0; $l < sizeof($log_absensi); $l++) :
      if ($gaji[$i]["nik"] == $log_absensi[$l]["nik"] && $kalender_detail[$k]["tgl"] == $log_absensi[$l]["tgl_absensi"]) {
        $col1 = $col1 . '<td>'.$log_absensi[$l]["jam_datang"].'</td>';
        $col2 = $col2 . '<td>'.$log_absensi[$l]["jam_pulang"].'</td>';
        $col4 = $col4 . '<td rowspan="3">'.$log_absensi[$l]["kd_status"].'</td>';
        $col5 = $col5 . '<td>'.$log_absensi[$l]["lembur"].'</td>';
        break;
      }
    endfor;
    for ($l = 0; $l < sizeof($absensi); $l++) :
      if ($gaji[$i]["nik"] == $absensi[$l]["nik"] && $kalender_detail[$k]["tgl"] == $absensi[$l]["tgl_absensi"]) {
        $col1 = $col1 . '<td>'.$absensi[$l]["jam_datang"].'</td>';
        $col2 = $col2 . '<td>'.$absensi[$l]["jam_pulang"].'</td>';
        $col4 = $col4 . '<td rowspan="3">'.$absensi[$l]["kd_status"].'</td>';
        $col5 = $col5 . '<td>'.$absensi[$l]["lembur"].'</td>';
        break;
      } elseif ($gaji[$i]["nik"] != $absensi[$l]["nik"] && $l == sizeof($absensi) - 1) {
        $col1 = $col1 . '<td>-</td>';
        $col2 = $col2 . '<td>-</td>';
        $col4 = $col4 . '<td rowspan="3">-</td>';
        $col5 = $col5 . '<td>-</td>';
      }
    endfor;
  endfor;
  $tbl = $tbl . '<tr>
    <td colspan="2" rowspan="2">' . $j . ' - ' . $gaji[$i]["nik"] . '<br/>' . $gaji[$i]["nama"] . '</td>
    
    <td>Datang</td>
    ' . $col1 . '
  </tr>
  <tr>
    
    
    <td>Pulang</td>
    ' . $col2 . '
  </tr>
  <tr>
    <td>Terlambat: ' . $gaji[$i]["hari_terlambat"] . '</td>
    <td>Sakit: ' . $gaji[$i]["sakit"] . '</td>
    <td rowspan="3">Status</td>
    ' . $col4 . '
  </tr>
  <tr>
    <td>Izin: ' . $gaji[$i]["izin"] . '</td>
    <td>Izin Resmi: ' . $gaji[$i]["izin_resmi"] . '</td>
  </tr>
  <tr>
    <td>Absen: ' . $gaji[$i]["absen"] . '</td>
    <td>Cuti: ' . $gaji[$i]["cuti"] . '</td>
  </tr>
  <tr>
    <td colspan="2">Lembur: ' . $gaji[$i]["lemburan"] . '</td>
    <td>Lembur</td>
    ' . $col5 . '
  </tr>';
  if ($i % 4 == 0 && $i != 0) {
    $tbl = $tbl . '</table><br pagebreak="true"/>' . $header;
  }
endfor;
$tbl = $tbl . '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('ABSENSI.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
