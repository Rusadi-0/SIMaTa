<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


////////////// pagination //////////////////////////////////
//konfigurasi
$jumlahDataPerHalaman = $jmlpagi;
$jumlahData = count(query("SELECT * FROM tb_tamu"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




$tamu = query("SELECT * FROM tb_tamu ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

// "SELECT * FROM mahasiswa ORDER BY id DESC

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $tamu = cari($_POST["keyword"]);
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" href="favicon.ico">


    <title>SIMBT | Data</title>
</head>

<body>
    <!-- awal navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded fixed-top">
        <a class="navbar-brand ml-3 py-0 mr-5" href="SIMBT-torial.php"><b><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                    <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                </svg> SIMBT</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="home.php"><b> - Home - </b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="daftar_buku_tamu.php"><b> - Data - </b><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="user.php"><b> - User - </b></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="kepuasan.php"><b> - Kepuasan - </b></a>
                </li>
            </ul>
            <button type="button" class="btn btn-danger my-2 my-sm-0 mb-3" data-toggle="modal" data-target="#logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>

                Logout</button>
        </div>
    </nav>
    <!-- akhir navbar -->

    <div class="container-sm op  ">
        <div class="page mb-5">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-white rounded">
                <h5 class="card-header animate__animated animate__fadeIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg>

                    Daftar Buku Tamu
                </h5>

                <div class="card-body">
                    <form class="form-inline my-2 my-lg-0" action="" method="post">
                        <div class="input-group mb-3">
                            <input type="search" class="animate__animated animate__fadeIn form-control" placeholder="Cari" required aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" autocomplete="off" id="keyword">
                            <div class="input-group-append">
                                <button class="animate__animated animate__fadeIn btn btn-outline-secondary" type="submit" name="cari" id="tombol-cari"><svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="cetak.php" class="animate__animated animate__fadeIn btn btn-primary mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                        </svg>
                        Cetak
                    </a>

                    <div class="table-responsive ">
                        <table class="table kecil table-bordered table-hover">
                            <thead class="animate__animated animate__fadeIn">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Instansi / @Nama Tamu</th>
                                    <th scope="col">Alamat/Kota/kab</th>
                                    <th scope="col">Pihak yang ditemui</th>
                                    <th scope="col">Keperluan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Jam Keluar</th>
                                    <!-- <th scope="col">Gambar</th> -->
                                </tr>
                            </thead>
                            <?php $i = $awalData + 1; ?>
                            <?php foreach ($tamu as $row) : ?>
                                <tbody>
                                    <tr data-toggle="modal" data-target="#view<?= $row["id"]; ?>">
                                        <div class="modal fade" id="view<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Gambar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href="img/<?= $row["gambar"]; ?>">
                                                            <img href="" class="img-fluid" src="img/<?= $row["gambar"]; ?>">
                                                        </a>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button> -->
                                                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <tr> -->
                                        <th class="animate__animated animate__fadeIn" scope="row"><?= $i; ?></th>
                                        <td class="animate__animated animate__fadeIn"><?= $row["nama"]; ?></a></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["alamat"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["ditemui"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["keperluan"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["tanggal"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["telepon"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["masuk"]; ?></td>
                                        <td class="animate__animated animate__fadeIn"><?= $row["keluar"]; ?></td>
                                        <!-- <td> -->
                                        <!-- <a class="btn kecil btn-primary" href="img/<?= $row["gambar"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg></a> -->
                                        <!-- <img src="img/<?= $row["gambar"]; ?>" width="50"> -->
                                        <!-- <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                                                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin di hapus??');">hapus</a> -->
                                        <!-- </td> -->
                                    </tr>
                                </tbody>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>


                    <!-- disabled -->
                    <nav class="animate__animated animate__fadeIn" aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-1">
                            <?php if ($halamanAktif > 1) :  ?>
                                <li class="page-item ">
                                    <a class="page-link " href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">
                                        Previous
                                    </a>
                                </li>
                            <?php elseif ($halamanAktif > 0) : ?>
                                <li class="page-item disabled">
                                    <a class="page-link " href="" tabindex="-1" aria-disabled="true">
                                        Previous
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($halamanAktif < $jumlahHalaman) :  ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                                </li>
                            <?php elseif ($halamanAktif < $jumlahHalaman + 1) : ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal awal logout -->
    <?= $logout; ?>
    <!-- modal akhir logout -->




    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>