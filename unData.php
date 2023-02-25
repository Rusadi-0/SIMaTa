<?php

unlink("./img/" . $_POST["hapusGmr"]);

require '../functions.php';

$query = "SELECT * FROM `tb_tamu`";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <script>
        document.location.href ="";
    </script>
</body>
</html>