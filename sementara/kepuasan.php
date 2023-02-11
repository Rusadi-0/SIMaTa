<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


// diagram nilai sangat bagus
$a = "SELECT nilai FROM tb_tamu WHERE nilai='sangat bagus'";
$result = mysqli_query($conn, $a);
$sb = mysqli_affected_rows($conn);

// diagram nilai cukup bagus
$b = "SELECT nilai FROM tb_tamu WHERE nilai='bagus'";
$result = mysqli_query($conn, $b);
$cb = mysqli_affected_rows($conn);
// digagram nilai biasa saja
$c = "SELECT nilai FROM tb_tamu WHERE nilai='biasa'";
$result = mysqli_query($conn, $c);
$bs = mysqli_affected_rows($conn);








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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


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
                <li class="nav-item ">
                    <a class="nav-link" href="daftar_buku_tamu.php"><b> - Data - </b></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="user.php"><b> - User - </b></a>
                </li>
                <li class="nav-item active ">
                    <a class="nav-link" href=""><b> - Kepuasan - </b><span class="sr-only">(current)</span></a>
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

    <div class="container-sm op ">
        <div class="page mb-5">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-white rounded">
                <h5 class="card-header animate__animated animate__fadeIn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pie-chart" viewBox="0 0 16 16">
                        <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                    </svg>

                    Data Kepuasan Tamu
                </h5>

                <div class="card-body">

                    <center>
                        <canvas class="" id="myChart" style="width:100%;max-width:590px"></canvas>
                    </center>
                    <script>
                        var xValues = ["Sangat Puas", "Cukup Puas", "Tidak Puas"];
                        var yValues = [<?= $sb; ?>, <?= $cb; ?>, <?= $bs; ?>];
                        var barColors = [
                            "#1E90FF",
                            "#FF8C00",
                            "#DC143C",
                        ];

                        new Chart("myChart", {
                            type: "pie",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    // text: "EDIT JUDIL DI SINI"
                                }
                            }
                        });
                    </script>
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