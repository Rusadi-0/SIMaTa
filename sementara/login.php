<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                $waktuRemember = 60 * 60 * 24;
                // buat cookie
                setcookie('id', $row['id'], time() + $waktuRemember);
                setcookie('key', hash('sha256', $row['username']), time() + $waktuRemember);
            }

            header("Location: home.php");
            exit;
        }
    }

    $error = true;
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
    <title>SIMBT | Login</title>
</head>

<body class="bg-cuy">
    <div class="container-sm col-sm-4 animate__animated animate__zoomIn">
        <div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="card-body login">
                <!-- <center>
                    <img src="gmr.png" alt="" width="100px">
                </center> -->
                <h2 class="my-4">LOGIN</h2>
                <!-- <h6 class="mb-4">Sistem Informasi Managemen Buku Tamu</h6> -->
                <form action="" method="post" class="">
                    <div class="form-group row">
                        <div class="col-sm-12 mt-3 ">
                            <label class="login" for="username">Username</label>
                            <input type="text" autofocus class="form-control " value="" id="username" required data-msg="Masukan Username" name="username" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 ">
                            <label class="login" for="password">Password</label>
                            <input type="password" value="" class="form-control " id="password" required data-msg="Masukan Password" placeholder="" name="password">
                        </div>
                    </div>
                    <div class="col-sm checkbox">
                        <div class="checkbox form-check form-check-inline mb-4">
                            <input class="form-check-input checkbox" checked type="checkbox" id="remember" name="remember">
                            <label class="form-check-label checkbox" for="remember">Simpan</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                    <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                </svg>

                                Login</button>
                            <?php if (isset($error)) : ?>
                                <div class="text-center form-group">
                                    <div class="bos ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                                            <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg>
                                        </svg><b>LOGIN GAGAL</b>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =========SCRIP============ -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>