<?php 
    include "db/connection.php";

    $id_buku = $_GET['id_buku'];
	$detail = mysqli_query($connection, "SELECT * FROM buku join penjual on buku.id_penjual=penjual.id_penjual WHERE id_buku=$id_buku");
	$data = mysqli_fetch_array($detail);

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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom2.css">
    <link rel="stylesheet" href="css/plugin.css">

	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
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
                    <!--<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
						<option>¥ JPY</option>
						<option>$ USD</option>
						<option>€ EUR</option>
					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>-->
                    <div class="our-link">
                        <ul>
                            <li><a href="penjual/login.php">Login/Daftar</a></li>
                            <li><a href="penjual/tambah.php"><i class="fas fa-camera"></i> Jual Buku</a></li>
                            <li><a href="#kontak"><i class="fas fa-question"></i> Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/belibooks022.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home <i class="fas fa-home"></i></a></li>
                        <li class="Aboutbelibooks"><a class="nav-link" href="#belibooks">Tentang BeliBooks</a></li>
                       <li class="dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Buku <i class="fas fa-book"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#if">Informatika</a></li>
                                <li><a href="#bio">Biologi</a></li>
                                <li><a href="#bio">Kimia</a></li>
                                <li><a href="#math">Matematika</a></li>
                                <li><a href="#stat">Statistika</a></li>
                                <li><a href="#fis">Fisika</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <!-- <form>
                            <input type="search" name="search">
                        </form> -->
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

		<!-- main -->
		<!-- Start Bradcaump area -->
	            <div class="container">
	                <div class="row mt-5 mb-5">
	                    <div class="col-lg-12 text-center">
	                        	<h2 class="bradcaump-title">Detail Buku</h2>
	                    </div>
	                </div>
	            </div>
	        <!-- End Bradcaump area -->
	        <!-- Start main Content -->
        					<div class="row justify-content-center mb-5">
        						<div class="col-lg-3 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="1.jpg"><img src="images/<?=$data['gambar'] ?>" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1><?=$data['judul'] ?></h1>
        								<div class="product-reviews-summary d-flex">
        									<ul class="rating-summary d-flex">
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
        									</ul>
        								</div>
        								<div class="price-box">
        									<span>Rp <?=$data['harga'] ?></span>
        								</div>
										<div class="product__overview">
											<table>

												<tr>
													<td>Kategori</td>
													<td>:</td>
													<td><?=$data['kategori'] ?></td>
												</tr>
												<tr>
													<td>Pengarang</td>
													<td>:</td>
													<td><?=$data['pengarang'] ?></td>
												</tr>
												<tr>
													<td>Penerbit</td>
													<td>:</td>
													<td><?=$data['penerbit'] ?></td>
												</tr>
												<tr>
													<td>Tahun terbit</td>
													<td>:</td>
													<td><?=$data['tahun_terbit'] ?></td>
												</tr>
												<tr>
													<td>Stok</td>
													<td>:</td>
													<td><?=$data['stok'] ?></td>
												</tr>
											</table>
        								</div>
        								<div class="box-tocart d-flex">
        									<div class="addtocart__actions">
        										<a href=" https://api.whatsapp.com/send?phone=<?=$data['no_hp'] ?>"><button class="tocart" type="submit" title="Add to Cart">Hubungi Penjual</button></a>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				

	         <!-- end -->

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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/plugins.js"></script>
	<script src="js/active.js"></script>
</body>
</html>