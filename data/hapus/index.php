<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../");
  exit;
}

$url = $_SERVER['DOCUMENT_ROOT'];

unlink($url . "/img/" . $_POST["hapusGmr"]);

require  $url . '/functions.php';

$id = $_GET["id"];

$query = "DELETE FROM `tb_tamu` WHERE `tb_tamu`.`id` = $id";

mysqli_query($conn, $query);

mysqli_close($conn);


header('Location: ../'); 