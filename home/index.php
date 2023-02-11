<?php
$home = "active";
$rekam = "";
$data = "";
$bukuTamu = "";

require '../functions.php';
require '../layouts/header.php';
require '../layouts/menu.php';
require '../layouts/topbar.php';
require '../layouts/footer.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ./home/");
  exit;
}
echo $layoutHeader;
echo $layoutMenu;
echo $layoutTopbar;
?>
<!-- Start Content -->
<h1>ok</h1>
<!-- End Content -->

<?php
echo $layoutFooter;
?>