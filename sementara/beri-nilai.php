<?php

require 'functions.php';


////////////// pagination //////////////////////////////////
//konfigurasi
$jumlahDataPerHalaman = 1;
$jumlahData = count(query("SELECT * FROM tb_tamu"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




$tamu = query("SELECT * FROM tb_tamu ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

// "SELECT * FROM mahasiswa ORDER BY id DESC

// tombol cari ditekan

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


    <title>SIMBT | Data</title>
</head>

<body>
    <div class="container">
        <div class="page mt-5">
            <div class="card  shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <?php $i = $awalData + 1; ?>
                            <?php foreach ($tamu as $row) : ?>
                                <form action="nilai.php?id=<?= $row["id"]; ?>">
                                    <h1>Tamu Keluar</h1>
                                    <h4><?= $row["nama"]; ?></h4>
                                    <h4><?= $row["alamat"]; ?></h4>
                                    <br>
                                    <br>
                                    <button type="submit" value="<?= $row["id"]; ?>" name="id" class="btn btn-primary">beri nilai</button>
                                </form>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>