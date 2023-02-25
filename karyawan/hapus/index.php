<?php

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../");
  exit;
}

$url = $_SERVER['DOCUMENT_ROOT'];
require  $url . '/functions.php';

$id = $_GET["id"];

$query = "DELETE FROM `tb_user` WHERE `tb_user`.`id` = $id";

mysqli_query($conn, $query);

mysqli_close($conn);

header('Location: ../'); 