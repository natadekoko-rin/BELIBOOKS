
<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

$id_penjual = $_SESSION['id_penjual'];

// Pagination
// Konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif =  (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = $jumlahDataPerHalaman * ($halamanAktif-1); 

$buku = query("SELECT * FROM buku WHERE id_penjual = $id_penjual");



// jika tombol cari ditekan
if (isset($_POST["cari"])){
	$buku = cari2($_POST["keyword"], $id_penjual);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>BeliBooks</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>

	<!-- Start Main Top -->
	<div class="main-top">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	                <div class="text-slid-box">
	                    <div id="offer-box" class="carouselTicker">
	                        <ul class="offer-box">
	                            <li>
	                                <i class="fab fa-opencart"></i> Menyediakan Modul Perkuliahan
	                            </li>
	                            <li>
	                                <i class="fab fa-opencart"></i> Menyediakan Buku Perkuliahan
	                            </li>
	                            <li>
	                                <i class="fab fa-opencart"></i> Menyediakan Diktat Perkuliahan
	                            </li>
	                            <li>
	                                <i class="fab fa-opencart"></i> Solusi Terbaik Menjual Buku Bekas 
	                            </li>
	                            <li>
	                                <i class="fab fa-opencart"></i> Jenis Buku Apapun Tersedia
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	                <div class="our-link">
	                    <ul>
                            <li><a href="../index.php"><img src="../images/belibooks011.png" class="logo" alt=""></a></li>
	                    	<li><a class="btn btn-danger btn-sm" href="tambah.php">Tambah Data Buku &raquo;</a></li>
	                        <li><a class="btn btn-danger btn-sm" href="logout.php">Logout</a></li>   
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<br>
    <h1 align="center"><b>Daftar Buku</b></h1>

	<div class="col-sm-50 col-xl-11">
	    <form action="" method="post">
			<input type="text" name="keyword" size="50" autofocus="" placeholder="Masukan keyword pencarian" autocomplete="off">
            <!-- <button type="submit" name="cari">Cari</button> -->
            <button type="submit" name="cari"><a href="#"><i class="fa fa-search"></i></a></button>
        </form>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-12 col-xl-12">
	
	<!-- navigasi --><!-- 
	<?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
		<a href=""><?= $i; ?></a>
	<?php endfor; ?> -->
	<br>

	<div text->
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
            <th>Kategori</th>
			<th>Harga</th>
			<th>Stok</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach($buku as $row) : ?><tr>

			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id_buku"] ?>"><i class="fas fa-edit"></i></a> 
				<a href="hapus.php?id=<?= $row["id_buku"]; ?>" onclick="return confirm('yakin?');"><i class="fas fa-trash-alt"></i></a>
			</td>
			<td><img src="../images/<?= $row['gambar'] ?>" width=80px height=80px></td>
			<td><?= $row["judul"] ?></td>
			<td><?= $row["pengarang"] ?></td>
			<td><?= $row["penerbit"] ?></td>
			<td><?= $row["tahun_terbit"] ?></td>
            <td><?= $row["kategori"] ?></td>
			<td><?= $row["harga"] ?></td>
			<td><?= $row["stok"] ?></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>

	</table>
    </div>
    <br>
	</div>
	<br>
	<!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About BeliBooks</h4>
                            <p>Aplikasi BeliBooks adalah sebuah aplikasi yang dapat digunakan sebagai sarana jual beli buku antara penjual dan pembeli. Buku yang dijual dalam aplikasi ini merupakan buku-buku ilmiah yang digunakan untuk referensi mata kuliah ataupun modul perkuliahan. Kondisi buku yang dijual berupa buku baru maupun buku bekas yang masih layak pakai.
                            </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-address-card"></i> Tentang BeliBooks</a></li>
                                <li><a href="#"><i class="fas fa-clipboard-list"></i> &nbsp; Terms &amp; Conditions</a></li>
                                <li><a href="#"><i class="fas fa-user-shield"></i> Privacy Policy</a></li>
                                <li><a href="#"><i class="fas fa-truck"></i> Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><a href="https://www.google.co.id/maps/place/Makam+timoho/@-7.0605915,110.4443699,20.59z/data=!4m5!3m4!1s0x2e708faf40e3bdd1:0x13d5aeb5a3f116fb!8m2!3d-7.0606277!4d110.4443691">
                                        <i class="fas fa-map-marker-alt">
                                        </i>Address: Makam Timoho 
                                        <br>Jl.Timoho Raya,
                                        <br>No 50277
                                    </p>
                                </li>
                                
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href=" https://api.whatsapp.com/send?phone=6282225907462"><span class="c-icon"><i class="fa fa-whatsapp" aria-hidden="true"></i></span> <span class="c-info">+62822 2590 7462</span></a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2019 <a href="index.php">BeliBooks</a>
    </div>
    <!-- End copyright  -->

    <a href="index.php" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/jquery.superslides.min.js"></script>
    <script src="../js/bootstrap-select.js"></script>
    <script src="../js/inewsticker.js"></script>
    <script src="../js/bootsnav.js."></script>
    <script src="../js/images-loded.min.js"></script>
    <script src="../js/isotope.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/baguetteBox.min.js"></script>
    <script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>