<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';


// Pagination
// Konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif =  (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = $jumlahDataPerHalaman * ($halamanAktif-1); 

$mhs = query("SELECT * FROM buku");



// jika tombol cari ditekan
if (isset($_POST["cari"])){
	$mhs = cari($_POST["keyword"]);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Keluar</a>

<h1>Daftar Buku</h1>
<a href="tambah.php">Tambah Data Buku</a>
<br><br>



<form action="" method="post">
	<input type="text" name="keyword" size="50" autofocus="" placeholder="masukkan keyword pencarian" autocomplete="off">
	<button type="submit" name="cari">Cari</button>
</form>


<!-- navigasi --><!-- 
<?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
	<a href=""><?= $i; ?></a>
<?php endfor; ?> -->
<br>



<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Judul</th>
		<th>Pengarang</th>
		<th>Penerbit</th>
		<th>Tahun Terbit</th>
		<th>harga</th>
		<th>stok</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach($mhs as $row) : ?><tr>
		<td><?= $i?></td>
		<td>
			<a href="ubah.php?id= <?= $row["id"] ?>">Ubah</a> |
			<a href="hapus.php?id= <?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]?>" width=80px height=80px alt="gambar kosong"></td>
		<td><?= $row["judul"] ?></td>
		<td><?= $row["pengarang"] ?></td>
		<td><?= $row["penerbit"] ?></td>
		<td><?= $row["tahun_terbit"] ?></td>
		<td><?= $row["harga"] ?></td>
		<td><?= $row["stok"] ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>

</table>

</body>
</html>