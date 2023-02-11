<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$tamu = query("SELECT * FROM tb_tamu");
$tahun = date("Y");
$tanggal = date("d - M - Y");
$user = query("SELECT * FROM tb_user");



$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    // <title>Daftar Tamu</title>
    <link rel="stylesheet" href="css/print.css">
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
   <h2>Daftar Tamu BPPRD Tahun '. $tahun. '</h2>
   <p>Petugas Cetak : ________________</p>
   <p>Tanggal Cetak : ' . $tanggal . '</p>
   <table border="1" cellpadding="9" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Instasi / Nama Tamu</th>
            <th>Alamat / Kota / Kab</th>
            <th>Pihak yang ditemui</th>
            <th>Keperluan</th>
            <th>Tanggal</th >
        </tr>';

     $i = 1;
     foreach( $tamu as $row ) {
        $html .= '<tr>
            <td>'. $i++ .'</td>
            <td>'. $row["nama"] .'</td>
            <td>'. $row["alamat"] .'</td>
            <td>'. $row["ditemui"] .'</td>
            <td>'. $row["keperluan"] . '</td>
            <td>' . $row["tanggal"] . '</td>
        </tr>';
     }   

$html .= '</table>    

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', 'I');

?>