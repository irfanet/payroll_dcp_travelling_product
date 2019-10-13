<?php

// create new PDF document
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

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
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr width="100%">
      <td><b>DCP TRAVELLING PRODUCT</b></td>
    </tr>
    <tr width="100%">
      <td><b>REKAP GAJI PERIODE: </b></td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
<table>
  <tr width="100%">
    <td><b>DEPARTEMEN : departemen</b><br></td>
  </tr>
</table>
<table cellspacing="0" cellpadding="1" border="1">
    <tr width="100%">
      <th width="2%">No</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Nama Departemen</th>
      <th>Nama Jabatan</th>
      <th>Nama Line</th>
      <th>Gaji Pokok</th>
      <th>Tunj. Jabatan</th>
      <th>Tunj. Kinerja</th>
      <th>Bonus</th>
      <th>Insentif</th>
      <th>PPH 21</th>
      <th>Norek</th>
      <th>Jumlah</th>
      <th>Hari Kerja</th>
      <th>Izin</th>
      <th>Absen</th>
      <th>Sakit</th>
      <th>Izin Resmi</th>
      <th>Cuti</th>
      <th>Lemburan</th>
      <th>Menit Terlambat</th>
      <th>Hari Terlambat</th>
      <th>BPJS TK JHT</th>
      <th>BPJS TK JP</th>
      <th>BPJS KES</th>
      <th>Honor Lembur</th>
      <th>Potongan</th>
      <th>Ketidakhadiran</th>
      <th>Total Gaji</th>
    </tr>
    <tr width="100%">
      <td>No</td>
      <td>NIK</td>
      <td>Nama</td>
      <td>Nama Departemen</td>
      <td>Nama Jabatan</td>
      <td>Nama Line</td>
      <td>Gaji Pokok</td>
      <td>Tunj. Jabatan</td>
      <td>Tunj. Kinerja</td>
      <td>Bonus</td>
      <td>Insentif</td>
      <td>PPH 21</td>
      <td>Norek</td>
      <td>Jumlah</td>
      <td>Hari Kerja</td>
      <td>Izin</td>
      <td>Absen</td>
      <td>Sakit</td>
      <td>Izin Resmi</td>
      <td>Cuti</td>
      <td>Lemburan</td>
      <td>Menit Terlambat</td>
      <td>Hari Terlambat</td>
      <td>BPJS TK JHT</td>
      <td>BPJS TK JP</td>
      <td>BPJS KES</td>
      <td>Honor Lembur</td>
      <td>Potongan</td>
      <td>Ketidakhadiran</td>
      <td>Total Gaji</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('REKAP_GAJI.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
