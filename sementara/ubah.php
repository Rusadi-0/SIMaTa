<?php



session_start();


if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}






// // koneksi ke DBMS tanpa functions
// $conn = mysqli_connect("localhost","root", "","phpdasar");

//menghubungkan function
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
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'daftar_buku_tamu.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'daftar_buku_tamu.php';
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
<html>

<head>
	<title>ubah data mahasiswa</title>
</head>

<body>
	<h1>ubah data mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" name="id" value="<?= $mhs["id"]; ?>">

		<!-- <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>"> -->
		<ul>
			<li>
				<label for="nama">nama </label>
				<input type="text" name="nama" value="<?= $mhs["nama"]; ?>">
				
			</li>
			<li>
				<label for="alamat">alamat </label>
				<input type="text" name="alamat" value="<?= $mhs["alamat"]; ?>">
			</li>
			<li>
				<label for="ditemui">ditemui : </label>
				<input type="text" name="ditemui" value="<?= $mhs["ditemui"]; ?>">
			</li>
			<li>
				<label for="keperluan">keperluan : </label>
				<input type="text" name="keperluan" value="<?= $mhs["keperluan"]; ?>">
			</li>
			<li>
				<label for="tanggal">tanggal : </label>
				<input type="text" name="tanggal" value="<?= $mhs["tanggal"]; ?>">
			</li>
			<li>
				<label for="masuk">masuk : </label>
				<input type="text" name="masuk" value="<?= $mhs["masuk"]; ?>">
			</li>
			<li>
				<label for="keluar">keluar : </label>
				<input type="text" name="keluar" value="<?= $mhs["keluar"]; ?>">
			</li>
			<li>
				<label for="gambar">gambar : </label>
				<input type="text" name="gambar" value="<?= $mhs["gambar"]; ?>">
			</li>
			<li>
				<label for="telepon">telepon : </label>
				<input type="text" name="telepon" value="<?= $mhs["telepon"]; ?>">
			</li>
			<li>
				<label for="nilai">nilai : </label>
				<input type="text" name="nilai" value="<?= $mhs["nilai"]; ?>">
			</li>
			<!-- <li>
				<label for="gambar">Gambar : </label><br>
				<img src="img/<?= $mhs["gambar"]; ?>" width="40"><br>
				<input type="file" name="gambar" id="gambar">
			</li> -->
			<li>
				<button type="submit" name="submit">ubah data!</button>
			</li>
		</ul>
	</form>

</body>

</html>