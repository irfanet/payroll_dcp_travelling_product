<?php

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
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
$pdf->SetHeaderMargin(20);
$pdf->SetFooterMargin(10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr width='100%'>
      <td width='50%' style="max-height: 399px; height: 399px;">
        <table border="0">
          <tr>
            <td align="center" colspan="3"><h2><b>DCP Travelling Product</b></h2></td>
          </tr>
          <tr>
            <td colspan="3"><h2><b>Periode: </b></h2><hr></td>
          </tr>
          <tr>
            <td width="40%">NIK</td>
            <td width="2%">: </td>
            <td width="58%">contoh</td>
          </tr>
          <tr>
            <td><h2><b>Nama</b></h2></td>
            <td><h2>:</h2></td>
            <td><h2>contoh</h2></td>
          </tr>
          <tr>
            <td>Departemen</td>
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
            <td>Tunjangan Jabatan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kinerja</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Premi Lembur</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kehadiran</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Insentif</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pengurangan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JHT</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JP</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS Kes</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>PPH 21</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Terlambat/ Pulang Awal</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Ketidakhadiran<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td rowspan="6">Jumlah Hari</td>
            <td>: </td>
            <td>masuk</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin</td>
          </tr>
          <tr>
            <td>: </td>
            <td>absen</td>
          </tr>
          <tr>
            <td>: </td>
            <td>sakit</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin resmi</td>
          </tr>
          <tr>
            <td>: </td>
            <td>cuti</td>
          </tr>
          <tr>
            <td>Jam Lembur<br></td>
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
      <td>
        <table border="0">
          <tr>
            <td align="center" colspan="3"><h2><b>DCP Travelling Product</b></h2></td>
          </tr>
          <tr>
            <td colspan="3"><h2><b>Periode: </b></h2><hr></td>
          </tr>
          <tr>
            <td width="40%">NIK</td>
            <td width="2%">: </td>
            <td width="58%">contoh</td>
          </tr>
          <tr>
            <td><h2><b>Nama</b></h2></td>
            <td><h2>:</h2></td>
            <td><h2>contoh</h2></td>
          </tr>
          <tr>
            <td>Departemen</td>
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
            <td>Tunjangan Jabatan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kinerja</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Premi Lembur</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kehadiran</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Insentif</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pengurangan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JHT</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JP</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS Kes</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>PPH 21</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Terlambat/ Pulang Awal</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Ketidakhadiran<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td rowspan="6">Jumlah Hari</td>
            <td>: </td>
            <td>masuk</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin</td>
          </tr>
          <tr>
            <td>: </td>
            <td>absen</td>
          </tr>
          <tr>
            <td>: </td>
            <td>sakit</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin resmi</td>
          </tr>
          <tr>
            <td>: </td>
            <td>cuti</td>
          </tr>
          <tr>
            <td>Jam Lembur<br></td>
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
    </tr>
    <tr>
      <td style="max-height: 399px; height: 399px;">
        <table border="0">
          <tr>
            <td align="center" colspan="3"><h2><b>DCP Travelling Product</b></h2></td>
          </tr>
          <tr>
            <td colspan="3"><h2><b>Periode: </b></h2><hr></td>
          </tr>
          <tr>
            <td width="40%">NIK</td>
            <td width="2%">: </td>
            <td width="58%">contoh</td>
          </tr>
          <tr>
            <td><h2><b>Nama</b></h2></td>
            <td><h2>:</h2></td>
            <td><h2>contoh</h2></td>
          </tr>
          <tr>
            <td>Departemen</td>
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
            <td>Tunjangan Jabatan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kinerja</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Premi Lembur</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kehadiran</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Insentif</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pengurangan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JHT</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JP</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS Kes</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>PPH 21</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Terlambat/ Pulang Awal</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Ketidakhadiran<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td rowspan="6">Jumlah Hari</td>
            <td>: </td>
            <td>masuk</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin</td>
          </tr>
          <tr>
            <td>: </td>
            <td>absen</td>
          </tr>
          <tr>
            <td>: </td>
            <td>sakit</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin resmi</td>
          </tr>
          <tr>
            <td>: </td>
            <td>cuti</td>
          </tr>
          <tr>
            <td>Jam Lembur<br></td>
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
      <td>
        <table border="0">
          <tr>
            <td align="center" colspan="3"><h2><b>DCP Travelling Product</b></h2></td>
          </tr>
          <tr>
            <td colspan="3"><h2><b>Periode: </b></h2><hr></td>
          </tr>
          <tr>
            <td width="40%">NIK</td>
            <td width="2%">: </td>
            <td width="58%">contoh</td>
          </tr>
          <tr>
            <td><h2><b>Nama</b></h2></td>
            <td><h2>:</h2></td>
            <td><h2>contoh</h2></td>
          </tr>
          <tr>
            <td>Departemen</td>
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
            <td>Tunjangan Jabatan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kinerja</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Premi Lembur</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Tunjangan Kehadiran</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Insentif</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Bonus<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Pengurangan</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JHT</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS TK JP</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>BPJS Kes</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>PPH 21</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Terlambat/ Pulang Awal</td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td>Ketidakhadiran<br></td>
            <td>: </td>
            <td>contoh</td>
          </tr>
          <tr>
            <td rowspan="6">Jumlah Hari</td>
            <td>: </td>
            <td>masuk</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin</td>
          </tr>
          <tr>
            <td>: </td>
            <td>absen</td>
          </tr>
          <tr>
            <td>: </td>
            <td>sakit</td>
          </tr>
          <tr>
            <td>: </td>
            <td>izin resmi</td>
          </tr>
          <tr>
            <td>: </td>
            <td>cuti</td>
          </tr>
          <tr>
            <td>Jam Lembur<br></td>
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
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('SLIP_GAJI.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
