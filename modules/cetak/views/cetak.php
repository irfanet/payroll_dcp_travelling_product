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
$pdf->SetMargins(5, 5, 5);
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
      <td width='50%' style="max-height: 266px; height: 266px;">
        <table border="0">
          <tr>
            <td align="center" colspan="3">DCP Travelling Product</td>
          </tr>
          <tr>
            <td colspan="3"><b>Periode: </b></td>
          </tr>
          <tr>
            <td>NPP</td>
            <td width="2%">: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Divisi</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Gaji Pokok</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Tetap</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunj. Tidak Tetap</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus Target</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pend. Lain-lain</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Potongan Target</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pot. Terlambat</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pot. Izin</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pot. BPJS</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td rowspan="3">Jumlah Hari</td>
            <td>: </td>
            <td>masuk</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin</td>
          </tr>
          <tr>
            <td>: </td>
            <td>cuti</td>
          </tr>
          <tr>
            <td>Jam Lembur</td>
            <td>: </td>
            <td>lembur</td>
          </tr>
          <tr>
            <td>Gaji diterima</td>
            <td>: </td>
            <td>gaji</td>
          </tr>
        </table>
      </td>
      <td></td>
    </tr>
    <tr>
      <td style="max-height: 266px; height: 266px;"></td>
      <td></td>
    </tr>
    <tr>
      <td style="max-height: 266px; height: 266px;"></td>
      <td></td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('slip_gaji.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
