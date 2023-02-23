<?php

// animasi css
$animasi = '';

$jmlpagi = 15;
date_default_timezone_set('Asia/Kuala_Lumpur');
$tglSekarang = date("d/m/Y");
$waktuSekarang = date("h:i a");







// koneksi ke database------------------------------------------
$conn = mysqli_connect("localhost", "root", "", "simata");
// -------------------------------------------------------------


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function nilai($data){
	global $conn;

	$id = $data["id"];
	$keluar = htmlspecialchars($data["keluar"]);
	$nilai = htmlspecialchars($data["nilai"]);

	$query = "UPDATE tb_tamu SET
				keluar = '$keluar',
				nilai = '$nilai'
			  WHERE id = $id
			";


	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	

	// --------------------------------
	// global $conn;


	// $keluar = htmlspecialchars($data["keluar"]);
	// $nilai = htmlspecialchars($data["nilai"]);


	// $query = "INSERT INTO tb_tamu
	// 			VALUES
	// 		  ('', '', '', '', '', '', '', '$keluar','','','$nilai')
	// 		";
	// mysqli_query($conn, $query);
	
	// return mysqli_affected_rows($conn);
}

function tambah($data) {
	global $conn;


	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$ditemui = htmlspecialchars($data["ditemui"]);
	$keperluan = htmlspecialchars($data["keperluan"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$masuk = date("h:i:s A",time());
	// $keluar = htmlspecialchars($data["keluar"]);
	$gambar= htmlspecialchars($data["gambar"]);
	$status= 0;
	// $telepon = htmlspecialchars($data["telepon"]);
	// $nilai = htmlspecialchars($data["nilai"]);






	// // upload gambar
	// $gambar = upload();
	// if( !$gambar ) {
	// 	return false;
	// }

	$query = "INSERT INTO `tb_tamu` (`id`, `nama`, `alamat`, `ditemui`, `keperluan`, `tanggal`, `masuk`, `keluar`, `gambar`, `telepon`, `nilai`, `status`) VALUES 
									(NULL, '$nama', '$alamat', '$ditemui', '$keperluan', '$tanggal', '$masuk', NULL, '$gambar', NULL, NULL,'$status');";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


// function upload() {

// 	$namaFile = $_FILES['gambar']['name'];
// 	$ukuranFile = $_FILES['gambar']['size'];
// 	$error = $_FILES['gambar']['error'];
// 	$tmpName = $_FILES['gambar']['tmp_name'];

// 	// cek apakah tidak ada gambar yang diupload
// 	if( $error === 4 ) {
// 		echo "<script>
// 				alert('pilih gambar terlebih dahulu!');
// 			  </script>";
// 		return false;
// 	}

// 	// cek apakah yang diupload adalah gambar
// 	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
// 	$ekstensiGambar = explode('.', $namaFile);
// 	$ekstensiGambar = strtolower(end($ekstensiGambar));
// 	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
// 		echo "<script>
// 				alert('yang anda upload bukan gambar!');
// 			  </script>";
// 		return false;
// 	}

// 	// cek jika ukurannya terlalu besar
// 	if( $ukuranFile > 1000000 ) {
// 		echo "<script>
// 				alert('ukuran gambar terlalu besar!');
// 			  </script>";
// 		return false;
// 	}

// 	// lolos pengecekan, gambar siap diupload
// 	// generate nama gambar baru
// 	$namaFileBaru = uniqid();
// 	$namaFileBaru .= '.';
// 	$namaFileBaru .= $ekstensiGambar;

// 	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

// 	return $namaFileBaru;
// }


function hapusUser($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_tamu WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$ditemui = htmlspecialchars($data["ditemui"]);
	$keperluan = htmlspecialchars($data["keperluan"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$masuk = htmlspecialchars($data["masuk"]);
	$keluar = htmlspecialchars($data["keluar"]);
	$gambar = htmlspecialchars($data["gambar"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$nilai = htmlspecialchars($data["nilai"]);
	
	// cek apakah user pilih gambar baru atau tidak
	// if( $_FILES['gambar']['error'] === 4 ) {
	// 	$gambar = $gambarLama;
	// } else {
	// 	$gambar = upload();
	// }
	

	$query = "UPDATE tb_tamu SET
				nama = '$nama',
				alamat = '$alamat',
				ditemui = '$ditemui',
				keperluan = '$keperluan',
				tanggal = '$tanggal',
				masuk = '$masuk',
				keluar = '$keluar',
				gambar = '$gambar',
				telepon = '$telepon',
				nilai = '$nilai'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword)
{
	
	$query = "SELECT * FROM tb_tamu
				WHERE
			  nama LIKE '%$keyword%' OR
			  alamat LIKE '%$keyword%' OR
			  ditemui LIKE '%$keyword%' OR
			  keperluan LIKE '%$keyword%' OR
			  tanggal LIKE '%$keyword%'OR
			  masuk LIKE '%$keyword%' OR
			  keluar LIKE '%$keyword%' OR
			  gambar LIKE '%$keyword%'OR
			  telepon LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}



?>
