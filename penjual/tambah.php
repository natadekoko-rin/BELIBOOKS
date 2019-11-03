<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';
if (isset($_POST["submit"])) {
	tambah($_POST);
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('Berhasil!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Gagal!');
				document.location.href = 'index.php';
			</script>
		";
	}

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Buku</title>
</head>
<body>
	<h1>Tambah Data Buku</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
			 	<label for="judul">Judul</label>
				<input type="text" name="judul" id="judul">
			</li>
			<li>
			 	<label for="pengarang">Pengarang</label>
				<input type="text" name="pengarang" id="pengarang">
			</li>
			<li>
			 	<label for="penerbit">Penerbit</label>
				<input type="text" name="penerbit" id="penerbit">
			</li>
			<li>
			 	<label for="tahun_terbit">Tahun Terbit</label>
				<input type="text" name="tahun_terbit" id="tahun_terbit">
			</li>
			<li>
			 	<label for="harga">Harga</label>
				<input type="text" name="harga" id="harga">
			</li>
			<li>
			 	<label for="stok">Stok</label>
				<input type="text" name="stok" id="stok">
			</li>
				<li>
			 	<label for="gambar">gambar</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah</button>
			</li>
		</ul>
		
	</form>