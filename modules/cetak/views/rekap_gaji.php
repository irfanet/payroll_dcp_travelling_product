<?php
set_time_limit(0);
ini_set('memory_limit', '-1');

// create new PDF document
$pdf = new TCPDF('L', 'mm', 'F4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Fardhani');
$pdf->SetTitle('Rekap Gaji');
$pdf->SetSubject('Rekap Gaji Pegawai');
$pdf->SetKeywords('');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(3, 3, 3);
$pdf->SetHeaderMargin(20);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 3);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();

$tbl = '
<table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td><b>DCP TRAVELLING PRODUCT</b></td>
    </tr>
    <tr width="100%">
      <td><b>REKAP GAJI PERIODE: ' . $gaji[0]["kd_periode"] . '</b></td>
    </tr>
</table>';

$pdf->writeHTML($tbl, true, false, true, false, '');

$tbl = '';
$header = '<table cellspacing="0" cellpadding="1" border="1">
<tr width="100%">
  <th width="2%">No</th>
  <th>NIK</th>
  <th>Nama</th>
  <th>Departemen</th>
  <th>Jabatan</th>
  <th>Line</th>
  <th>Gaji Pokok</th>
  <th>Tunj. Jabatan</th>
  <th>Tunj. Kinerja</th>
  <th>Bonus</th>
  <th>Insentif</th>
  <th>PPH 21</th>
  <th>Norek</th>
  <th>Kehadiran</th>
  <th>Lemburan</th>
  <th>Menit Terlambat</th>
  <th>BPJS</th>
  <th>Potongan</th>
  <th>Ketidakhadiran</th>
  <th>Total Gaji</th>
</tr>';
for ($i = 0, $j = 1; $i < sizeof($gaji); $i++, $j++) :
  if ($i == 0) {
    $tbl = $tbl . '
          <table>
            <tr width="100%">
              <td><b>DEPARTEMEN : ' . $gaji[$i]["kd_departemen"] . '</b><br></td>
            </tr>
          </table>' . $header;
  } else if ($gaji[$i]["kd_departemen"] != $gaji[$i - 1]["kd_departemen"]) {
    $j = 1;
    $tbl = $tbl . '</table><br pagebreak="true"/>
          <table>
            <tr width="100%">
              <td><b>DEPARTEMEN : ' . $gaji[$i]["kd_departemen"] . '</b><br></td>
            </tr>
          </table>' . $header;
  }
  $tbl = $tbl . '
    <tr width="100%">
      <td>' . $j . '</td>
      <td>' . $gaji[$i]["nik"] . '</td>
      <td>' . $gaji[$i]["nama"] . '</td>
      <td>' . $gaji[$i]["nama_departemen"] . '</td>
      <td>' . $gaji[$i]["nama_jabatan"] . '</td>
      <td>' . $gaji[$i]["nama_line"] . '</td>
      <td>' . nominal($gaji[$i]["gaji_pokok"]) . '</td>
      <td>' . nominal($gaji[$i]["tunj_jabatan"]) . '</td>
      <td>' . nominal($gaji[$i]["tunj_kinerja"]) . '</td>
      <td>' . nominal($gaji[$i]["bonus"]) . '</td>
      <td>' . nominal($gaji[$i]["insentif"]) . '</td>
      <td>' . nominal($gaji[$i]["pph21"]) . '</td>
      <td>' . ($gaji[$i]["norek"]) . '</td>
      <td>Hari: ' . $gaji[$i]["hari_kerja"] . '<br>
      I: ' . $gaji[$i]["izin"] . '<br>
      A: ' . $gaji[$i]["absen"] . '<br>
      S: ' . $gaji[$i]["sakit"] . '<br>
      IR: ' . $gaji[$i]["izin_resmi"] . '<br>
      C: ' . $gaji[$i]["cuti"] . '</td>
      <td>' . ($gaji[$i]["lemburan"]) . ' jam<br>
      ' . nominal($gaji[$i]["honor_lembur"]) . '</td>
      <td>' . $gaji[$i]["menit_terlambat"] . '</td>
      <td>TK JHT: ' . nominal($gaji[$i]["bpjs_tk_jht"]) . '<br>
      TK JP: ' . nominal($gaji[$i]["bpjs_tk_jp"]) . '<br>
      KES' . nominal($gaji[$i]["bpjs_kes"]) . '</td>
      <td>' . nominal($gaji[$i]["potongan"]) . '</td>
      <td>' . nominal($gaji[$i]["ketidakhadiran"]) . '</td>
      <td>' . nominal($gaji[$i]["total_gaji"]) . '</td>
    </tr>';
endfor;

$pdf->writeHTML($tbl, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('REKAP_GAJI_' . $gaji[0]["kd_periode"] . '.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
