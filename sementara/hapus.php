<?php 


session_start();


  	if (!isset($_SESSION["login"])) {
  		header("Location: login.php");
  		exit;

  	}




require 'functions.php';

$id = $_GET["id"];

if (hapusUser($id) > 0){
	echo "
			<script>
				document.location.href = 'user.php';
			</script>
		";
	} else {
	echo "
			<script>
				alert('user gagal dihapus!');
				document.location.href = 'user.php';
			</script>
		";
	}

 ?>