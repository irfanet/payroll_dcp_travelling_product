<?php
set_time_limit(0);
ini_set('memory_limit', '-1');
// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Fardhani');
$pdf->SetAuthor('Fardhani');
$pdf->SetTitle('Slip Gaji');
$pdf->SetSubject('Slip Gaji Pegawai');
$pdf->SetKeywords('');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);
// add a page
$pdf->AddPage();
$tbl = '';
for ($i = 0; $i < sizeof($gaji); $i = $i + 1) :
  $isi = '<table border="0">
  <tr>
    <td align="center" colspan="3"><h2><b>DCP Travelling Product</b></h2></td>
  </tr>
  <tr>
    <td colspan="3"><h2><b>Periode: ' . $gaji[$i]["kd_periode"] . '</b></h2><hr></td>
  </tr>
  <tr>
    <td width="40%">NIK</td>
    <td width="2%">: </td>
    <td width="58%">' . $gaji[$i]["nik"] . '</td>
  </tr>
  <tr>
    <td><h2><b>Nama</b></h2></td>
    <td><h2>:</h2></td>
    <td><h2>' . $gaji[$i]["nama"] . '</h2></td>
  </tr>
  <tr>
    <td>Departemen</td>
    <td>: </td>
    <td>' . $gaji[$i]["nama_departemen"] . '</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>: </td>
    <td>' . $gaji[$i]["nama_jabatan"] . '</td>
  </tr>
  <tr>
    <td>Gaji Pokok</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["gaji_pokok"]) . '</td>
  </tr>
  <tr>
    <td>Tunjangan Jabatan</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["tunj_jabatan"]) . '</td>
  </tr>
  <tr>
    <td>Tunjangan Kinerja</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["tunj_kinerja"]) . '</td>
  </tr>
  <tr>
    <td>Premi Lembur</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["honor_lembur"]) . '</td>
  </tr>
  <tr>
    <td>Tunjangan Kehadiran</td>
    <td>: </td>
    <td>-</td>
  </tr>
  <tr>
    <td>Insentif</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["insentif"]) . '</td>
  </tr>
  <tr>
    <td>Bonus<br></td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["bonus"]) . '</td>
  </tr>
  <tr>
    <td>Pengurangan</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["potongan"]) . '</td>
  </tr>
  <tr>
    <td>BPJS TK JHT</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["bpjs_tk_jht"]) . '</td>
  </tr>
  <tr>
    <td>BPJS TK JP</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["bpjs_tk_jp"]) . '</td>
  </tr>
  <tr>
    <td>BPJS Kes</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["bpjs_kes"]) . '</td>
  </tr>
  <tr>
    <td>PPH 21</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["pph21"]) . '</td>
  </tr>
  <tr>
    <td>Terlambat/ Pulang Awal</td>
    <td>: </td>
    <td>-</td>
  </tr>
  <tr>
    <td>Ketidakhadiran<br></td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["ketidakhadiran"]) . '</td>
  </tr>
  <tr>
    <td rowspan="6">Jumlah Hari</td>
    <td>: </td>
    <td>' . $gaji[$i]["hari_kerja"] . ' Masuk</td>
  </tr>
  <tr>
    <td>: </td>
    <td>' . $gaji[$i]["izin"] . ' Izin</td>
  </tr>
  <tr>
    <td>: </td>
    <td>' . $gaji[$i]["absen"] . ' Absen</td>
  </tr>
  <tr>
    <td>: </td>
    <td>' . $gaji[$i]["sakit"] . ' Sakit</td>
  </tr>
  <tr>
    <td>: </td>
    <td>' . $gaji[$i]["izin_resmi"] . ' Izin Resmi</td>
  </tr>
  <tr>
    <td>: </td>
    <td>' . $gaji[$i]["cuti"] . ' Cuti</td>
  </tr>
  <tr>
    <td>Jam Lembur<br></td>
    <td>: </td>
    <td>' . $gaji[$i]["lemburan"] . '</td>
  </tr>
  <tr>
    <td>Gaji diterima</td>
    <td>: </td>
    <td>' . nominal($gaji[$i]["total_gaji"]) . '</td>
  </tr>
</table>';
  if ($i % 4 == 0) {
    $tbl = $tbl . '<table cellspacing="0" cellpadding="1" border="1">';
    $tbl = $tbl . '<tr width="100%">
                  <td width="50%" style="max-height: 399px; height: 399px;">' . $isi . '</td>';
    if ($i + 1 == sizeof($gaji)) {
      $tbl = $tbl . '</tr>';
      $tbl = $tbl . '</table>';
    }
  } else if ($i % 4 == 1) {
    $tbl = $tbl . '<td>' . $isi . '</td>
              </tr>';
    if ($i + 1 == sizeof($gaji)) {
      $tbl = $tbl . '</table>';
    }
  } else if ($i % 4 == 2) {
    $tbl = $tbl . '<tr>
                  <td width="50%" style="max-height: 399px; height: 399px;">' . $isi . '</td>';
    if ($i + 1 == sizeof($gaji)) {
      $tbl = $tbl . '</tr>';
      $tbl = $tbl . '</table>';
    }
  } else if ($i % 4 == 3) {
    $tbl = $tbl . '<td>' . $isi . '</td>
              </tr>';
    $tbl = $tbl . '</table><br pagebreak="true"/>';
  }
endfor;

$pdf->writeHTML($tbl, true, false, true, false, '');

//Close and output PDF document
$pdf->Output("SLIP_GAJI.pdf", "D");

//============================================================+
// END OF FILE
//============================================================+
