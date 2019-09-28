<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('My Title');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;">
    <tr width="100%">
        <td width="50%" style="height:243px; border-right: solid 1px #000; border-bottom: solid 1px #000;">asdf</td>
        <td width="50%" style="height:243px; border-bottom: solid 1px #000;"></td>
    </tr>
    <tr width="100%">
        <td width="50%" style="height:243px; border-right: solid 1px #000; border-bottom: solid 1px #000;">asdf</td>
        <td width="50%" style="height:243px; border-bottom: solid 1px #000;">asdf</td>
    </tr>
    <tr width="100%">
        <td width="50%" style="height:243px; border-right: solid 1px #000;">asdf</td>
        <td width="50%" style="height:243px;>asdf</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('My-File-Name.pdf', 'I'); 

$this->load->template('home');
?>