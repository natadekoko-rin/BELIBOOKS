<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('Data Berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
		
		<ul>
			<li>
			 	<label for="nama">nama</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
			</li>
			<li>
			 	<label for="nim">NIM</label>
				<input type="text" name="nim" id="nim"  value="<?= $mhs["nim"] ?>">
			</li>
			 	<label for="jurusan">jurusan</label>
				<input type="text" name="jurusan" id="jurusan"  value="<?= $mhs["jurusan"] ?>">
			</li>
			<li>
			 	<label for="nohp">nohp</label>
				<input type="text" name="nohp" id="nohp" value="<?= $mhs["nohp"] ?>">
			</li>
				<li>
			 	<label for="gambar">gambar</label>
			 	<img src="img/<?= $mhs['gambar'];  ?>" width="50"> <br>
				<input type="file" name="gambar" id="gambar"  ?>
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
			</li>
		</ul>
		
	</form>