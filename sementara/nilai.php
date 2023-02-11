<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarjan id
$mhs = query("SELECT * FROM tb_tamu WHERE id = $id")[0];




//cek apakah tombol submit sudah di tekan atau belum


if (isset($_POST["submit"])) {
    // var_dump($_POST);

    //



    // // mencek berhasil atau tidak menggunakn functions
    if (nilai($_POST) > 0) {
        echo "
    <script>
    document.location.href = 'terima-kasih.php';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('gagal diberi nilai!');
    document.location.href = 'beri-nilai.php';
    </script>
    ";
    }




    // //// cek berhasil atau tidak
    // // var_dump(mysqli_affected_rows($conn));

    // if (mysqli_affected_rows($conn) > 0){
    // 	echo "berhasil";
    // } else {
    // 	echo "gagal";
    // 	echo "<br>";
    // 	echo mysqli_error($conn);
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Document</title>
</head>

<body>
    <div class="container text-center">
        <div class="page mt-5">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h1 style="font-size: 40px;" class="mb-5">Beri penilaian anda </h1>
                    <div class="row ">
                        <div class="col mt-5">
                            <center>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                                    <input type="hidden" name="nilai" id="satu">
                                    <input type="hidden" name="keluar" id="keluar1" placeholder="">
                                    <button onclick="sangatBagus()" name="submit" type="submit" class="btn shadow-lg animate__animated animate__bounceIn btn-warning satu bulat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z" />
                                        </svg>
                                    </button>
                                </form>
                                <h5 class="mt-3 animate__animated animate__bounceIn">Sangat Puas</h5>
                        </div>
                        <div class="col mt-5">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                                <input type="hidden" name="nilai" id="dua">
                                <input type="hidden" name="keluar" id="keluar2" placeholder="">
                                <button onclick="bagus()" name="submit" type="submit" class="btn shadow-lg animate__animated animate__bounceIn btn-warning dua bulat"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                                    </svg>
                                </button>
                            </form>
                            <h5 class="mt-3 animate__animated animate__bounceIn">Cukup Puas</h5>
                        </div>
                        <div class="col mt-5">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                                <input type="hidden" name="nilai" id="tiga">
                                <input type="hidden" name="keluar" id="keluar3" placeholder="">
                                <button onclick="biasa()" name="submit" type="submit" class="btn shadow-lg animate__animated animate__bounceIn btn-warning tiga bulat"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-emoji-neutral" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z" />
                                    </svg>
                                </button>
                            </form>
                            <h5 class="mt-3 animate__animated animate__bounceIn">Tidak Puas</h5>
                        </div>
                        <!-- <div class="col mt-5">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                                <input type="hidden" name="nilai" id="empat">
                                <input type="hidden" name="keluar" id="keluar4" placeholder="">
                                <button onclick="tidakBagus()" name="submit" type="submit" class="btn shadow-lg animate__animated animate__bounceIn btn-warning empat bulat"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-emoji-expressionless" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm5 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </button>
                            </form>
                            <h1 class="mt-3 animate__animated animate__bounceIn">Tidak Berguna</h1>
                        </div> -->
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sangatBagus() {
            document.getElementById("satu").value = "Sangat Bagus";
            document.getElementById("keluar1").value = "<?= $waktuSekarang; ?>";
        }

        function bagus() {
            document.getElementById("dua").value = "Bagus";
            document.getElementById("keluar2").value = "<?= $waktuSekarang; ?>";
        }

        function biasa() {
            document.getElementById("tiga").value = "Biasa";
            document.getElementById("keluar3").value = "<?= $waktuSekarang; ?>";
        }

        function tidakBagus() {
            document.getElementById("empat").value = "Tidak Bagus";
            document.getElementById("keluar4").value = "<?= $waktuSekarang; ?>";
        }
        alert('user ' + $user["user"] + 'berhasil ditambahkan!');
        document.location.href = 'user.php';
    </script>
</body>

</html>