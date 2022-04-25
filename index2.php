<?php 
    include "db/connection.php";
    $kategori=$_GET['kategori'];

    $jumlahDataPerHalaman = 8;
    $jumlahData = count(mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM buku where kategori like '%$kategori%'")));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif =  (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    $awalData = $jumlahDataPerHalaman * ($halamanAktif-1); 

    $sql = mysqli_query($connection, "SELECT * FROM buku where kategori like '%$kategori%' limit $awalData,$jumlahDataPerHalaman");
    if (isset($_POST["cari"])){
        require 'penjual/functions.php';
        $sql = cari3($_POST["keyword"], $kategori);
    }
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">



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
                        <form action="" method="post">
                            <input type="text" name="keyword" size="30" autofocus="" placeholder="Cari..." autocomplete="off">
                            <!-- <button type="submit" name="cari">Cari</button> -->
                            <button type="submit" name="cari"><a href="#"><i class="fa fa-search"></i></a></button>
                        </form>
                        <!-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> -->
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/banner_1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> Change your life now</strong></h1>
                            <p class="m-b-40"> <br> A room without books is like a body without a soul. Life without books is like a dark room without light.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner_2.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> BELIBOOKS</strong></h1>
                            <p class="m-b-40">GACHA <br> I cannot live without books because books are a mirror of the soul.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="images/banner_3.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> BELIBOOKS</strong></h1>
                            <p class="m-b-40">Open your book now <br> A classic book is a book that never finishes saying what needs to be said.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Buku</h1>
                        <p>Segala jenis buku tersedia</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top Book</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <?php               
                    while($data = mysqli_fetch_array($sql)){
                ?>

                <div class="col-lg-3 col-md-6 special-grid best-seller" style="height: 450px">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Belibooks</p>
                            </div>
                            <img src="images/<?php echo $data['gambar'] ?>" class="img-fluid" alt="Image" style="height: 300px">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="detail.php?id_buku=<?=$data['id_buku']?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </div> 
                        </div>
                        <div class="why-text">
                            <h4><?php echo $data['judul'] ?></h4>
                            <h5> Rp <?php echo $data['harga'] ?></h5>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                 ?>
            </div>

                 <!-- navigasi -->
             <div class="row justify-content-center">
                <nav aria-label="..." class="text-center">
                    <ul class="pagination">
                        <?php if ($halamanAktif>1) : ?>
                            <li class="page-item">
                              <a class="page-link" href="?kategori=<?=$kategori ?>&halaman=<?= $halamanAktif-1 ?>">Previous</a>
                            </li>
                        <?php endif ?>
                    
                        <?php for($i=1; $i<=$jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active" aria-current="page">
                                  <span class="page-link"><?=$i ?><span class="sr-only">(current)</span></span>
                                </li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="?kategori=<?=$kategori ?>&halaman=<?=$i ?>"><?=$i ?></a></li>
                            <?php  endif?>
                        <?php endfor; ?>

                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li class="page-item">
                              <a class="page-link" href="?kategori=<?=$kategori ?>&halaman=<?= $halamanAktif+1 ?>">Next</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
             </div>
        </div>
    </div>
   
    <!-- Start Instagram Feed  -->
    
    <div class="instagram-box">
        <p id="if"><a class="btn hvr-hover" href="index2.php?kategori=informatika">INFORMATIKA</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
             $sql1 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%informatika%'");
                foreach ($sql1 as $key) { 
            ?>
            
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
            
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <div class="instagram-box">
        <p id="bio"><a class="btn hvr-hover" href="index2.php?kategori=biologi">BIOLOGI</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $sql2 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%biologi%'");
                foreach ($sql2 as $key) { 
            ?>
            
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>

    <div class="instagram-box">
        <p id="kimia"><a class="btn hvr-hover" href="index2.php?kategori=kimia">KIMIA</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $sql3 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%kimia%'");
                foreach ($sql3 as $key) { 
            ?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>

    <div class="instagram-box">
        <p id="math"><a class="btn hvr-hover" href="index2.php?kategori=matematika">MATEMATIKA</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $sql4 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%matematika%'");
                foreach ($sql4 as $key) { 
            ?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>

    <div class="instagram-box">
        <p id="stat"><a class="btn hvr-hover" href="index2.php?kategori=statistika">STATISTIKA</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $sql4 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%statistika%'");
                foreach ($sql4 as $key) { 
            ?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>

    <div class="instagram-box">
        <p id="fis"><a class="btn hvr-hover" href="index2.php?kategori=fisika">FISIKA</a></p>
        <div class="main-instagram owl-carousel owl-theme">
            <?php
                $sql5 = mysqli_query($connection, "SELECT * FROM buku where  kategori like '%fisika%'");
                foreach ($sql5 as $key) { 
            ?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/<?= $key['gambar'] ?>" alt="" />
                    <div class="hov-in">
                        <a href="detail.php?id_buku=<?=$key['id_buku'] ?>"><i class="fas fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            ?>
        </div>
    </div>

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4 id="belibooks">About BeliBooks</h4>
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
                                <li>
                                    <p><a href="#"><i class="fas fa-address-card"></i> Tentang BeliBooks</a></p>
                                </li>
                                <li>
                                    <p><a href="#"><i class="fas fa-clipboard-list"></i> &nbsp; Terms &amp; Conditions</a></p>
                                </li>
                                <li>
                                    <p><a href="#"><i class="fas fa-user-shield"></i> Privacy Policy</a></p>
                                </li>
                                <li>
                                    <p><a href="#"><i class="fas fa-truck"></i> Delivery Information</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4 id="kontak">Contact Us</h4>
                            <ul>
                                <li>
                                    <p><a href="https://www.google.co.id/maps/place/Makam+timoho/@-7.0605915,110.4443699,20.59z/data=!4m5!3m4!1s0x2e708faf40e3bdd1:0x13d5aeb5a3f116fb!8m2!3d-7.0606277!4d110.4443691">
                                        <i class="fas fa-map-marker-alt">
                                        </i>Address: Fakultas Sains dan Matematika, 
                                        <br>Universitas Diponegoro, Semarang
                                    </p>
                                </li>
                                
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href=" https://api.whatsapp.com/send?phone=6282225907462"><span class="c-icon"><i class="fa fa-whatsapp" aria-hidden="true"></i></span> <span class="c-info">+62822 2590 7462</span></a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:belibooks@gmail.com">belibooks@gmail.com</a></p>
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
</body>

</html>