
<?php 


require "penjual/functions.php";
    $db_host='localhost';
    $db_database='belibooks';
    $db_username='root';
    $db_password='';
    // Connect //==> ini juga diganti
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    if (mysqli_connect_errno()){
        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
    }

$kode = $_GET['kd'];
$email = $_GET['email'];

$query = mysqli_query($con, "SELECT token from aktivasi where email='$email'");
$result = mysqli_fetch_array($query);

if ($kode == $result['token']) {
    if($con->query("UPDATE penjual set status=1 WHERE email='$email' ") === TRUE) {
        $notif = "  <h4 class='h4 mt-3'>Aktivasi akun berhasil</h4>
                    <p>Silahkan login untuk masuk</p>";
        $alert = "alert alert-success text-center";
    } else {
        $notif = " <h4 class='h4 mt-3'>Aktivasi akun tidak berhasil</h4>
                <p>Silahkan minta kirim ulang token aktivasi</p>";
        $alert = "alert alert-danger text-center";
    }
} else {
    $notif = " <h4 class='h4 mt-3'>Token aktivasi invalid</h4>
                <p>Silahkan minta kirim ulang token aktivasi</p>";
    $alert = "alert alert-danger text-center";
}




if (isset($_POST['kirimUlang'])) {
    require 'penjual/PHPMailer/PHPMailerAutoload.php';
    $gmail = $_POST['email'];
    $token = base64_encode(random_bytes(32));

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.googlemail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'haanf.free@gmail.com';
    $mail->Password = '0Free???';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $kode = rand_string(32);
    $mail->setFrom('haanf.free@gmail.com', 'Belibooks');
    $mail->addReplyTo('noReply', 'Belibooks');

    // Menambahkan penerima
    $mail->addAddress($gmail);

    // Subjek email
    $mail->Subject = 'Aktivasi Akun';

    // Mengatur format email ke HTML
    $mail->isHTML(true);

    // Konten/isi email
    $mailContent = "<h1>Akun anda perlu diaktifkan</h1>
        <p>Klik link di bawah ini untuk mengaktifkan akun anda.</p>
        <a href='http://localhost/ppl/BV3/verifikasi.php?kd=$kode&email=$gmail'><button>Aktivasi akun</button></a>";

    $mail->Body = $mailContent;
    $query3 = "UPDATE aktivasi set token='$kode' WHERE email='$gmail'";
    $con->query($query3);
    // Kirim email
    if(!$mail->send()){
        echo 'Token aktivasi tidak terkirim.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
        echo "
        <script>
            alert('Token aktivasi telah terkirim! cek email anda untuk aktivasi akun');
            </script>
        ";
    }
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


<div class="row justify-content-center mt-5 mb-5">
<div class="col-lg-9 col-md-7 justify-content-center">
    
    <div class="<?=$alert ?>" role="alert">
     <!--  <h4>Aktivasi akun berhasil</h4>
      <p>Silahkan login untuk masuk</p> -->
      <?php if(isset($notif)) echo $notif?>

      <div>
        <form action="" method="post"> 
            <input type="hidden" name="email" value="<?= $email ?>">
            <button type="submit" class="btn btn-info mt-4 mb-3" name="kirimUlang">Kirm ulang token aktivasi</button>
        </form>
      </div>

        <div>
        <a href="penjual/login.php"><button type="button" class="btn btn-primary">Login</button></a>    
      </div>
    </div>
</div>
</div>



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
