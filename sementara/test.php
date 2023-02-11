<?php
require 'functions.php';
$sql = "SELECT nilai FROM tb_tamu WHERE nilai='sangat bagus'";
$result = mysqli_query($conn, $sql);

$row = mysqli_affected_rows($conn);

echo $row;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
</body>
</html>