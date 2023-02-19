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
  header("Location: ./home");
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

      header("Location: ./home");
      exit;
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./bakso/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>SIMaTa | Log In</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./bakso/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="./bakso/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="./bakso/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./bakso/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./bakso/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./bakso/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="./bakso/assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="./bakso/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./bakso/assets/js/config.js"></script>

  <style>
    .notifikasi {
      /* width: 41vh; */
      /* height: 13vh; */
      /* position: fixed; */
      /* bottom: 50%; */
      /* right: 50%; */
      z-index: 9999999999;
      text-align: center;


    }
  </style>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner"> <?php if (isset($error)) : ?>
          <div class="">


            <div class="position-sticky d-block notifikasi alert alert-danger alert-dismissible" role="alert">
              <b>Username atau Password Salah</b>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

          </div>

        <?php endif; ?>
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!--  Logo -->
            <div class="app-brand justify-content-center">
            </div>
            <!-- /Logo -->
            <!-- <span class="app-brand-text demo text-body fw-bolder">SIMa<span class="text-primary">Ta</span></span> -->
            <img class="mt-4" style="  display: block;
            margin-left: auto;
            margin-right: auto;
            width: 120;" src="./bakso/assets/img/illustrations/undraw_online_payments_re_y8f2.svg" src="./bakso/assets/img/illustrations/logo-2021-full.png" height="120" alt="View Badge User" />
            <h2 class="text-center mt-3"><strong>SIMa<span class="text-primary">Ta</span></strong></h2>

            <h5 class="text-center pb-0 mb-0">Sistem Informasi Manajemen <span class="text-primary">Ta</span>mu</h5>
            <!-- <p class="text-center pt-0 mt-0">Badan Pendapatan Daerah Kabupaten Tabalong</p> -->
            <!-- <h4 class="mb-2">Welcome to Sneat! 👋</h4> -->
            <!-- <p class="mb-4">Please sign-in to your account and start the adventure</p> -->


            <form id="formAuthentication" class="mb-3 mt-4" action="" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="username" placeholder="Enter your username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="login" type="submit">Log In</button>
              </div>
            </form>


            <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> -->
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->
  <!-- ERROR -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="./bakso/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./bakso/assets/vendor/libs/popper/popper.js"></script>
  <script src="./bakso/assets/vendor/js/bootstrap.js"></script>
  <script src="./bakso/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="./bakso/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="./bakso/assets/js/main.js"></script>

  <!-- Page JS -->
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(300, 0).slideUp(300, function() {
        $(this).remove();
      });
    }, 7000);
  </script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>