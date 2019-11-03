<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Login BeliBooks.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="../css/style2.css" />
		<script src="../js/cufon-yui.js" type="text/javascript"></script>
		<script src="../js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
		<script>
			function validateForm(){
				var x = document.forms["formLogin"]["fusername"].value;
				var y = document.forms["formLogin"]["fpassword"].value;
				if(x == "" && y == ""){
					alert("Username dan Password harus diisi");
					return false;
				}if(x == ""){
					alert("Username harus diisi");
					return false;
				}if(y == ""){
					alert("Password harus diisi");
					return false;
				}if(validlogin(x,y)){
					alert("Username dan Password salah");
					return false;
				}
			}
		</script>

	<?php //untuk cek notifikasi
	session_start();
	$db_host='localhost';
	$db_database='belibooks';
	$db_username='root';
	$db_password='';
	// Connect //==> ini juga diganti
	$con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
	if (mysqli_connect_errno()){
		die ("Could not connect to the database: <br />". mysqli_connect_error( ));
	}

	//Asign a query

	if(isset($_POST['submit'])){
		$username=$_POST['fusername'];
		$password=$_POST['fpassword'];
		$query = mysqli_query($con," SELECT * FROM penjual ");
		
		while ($row = mysqli_fetch_array($query)){
			if($username==$row['username'] && $password==$row['password'])
				{
					$_SESSION['customerid'] = $row['customerid'];
					$_SESSION['login'] = true;
					header("location:index.php");
				}
				else if($username!=$row['username'])
				{
					echo "<script>alert('Username salah');</script>";
				}
				else if($password!=$row['password'])
				{
					echo "<script>alert('Password salah');</script>";
				}
		}
	}
	// ===============
	if (isset($_POST['submit2'])) {
				$username = $_POST['fusername'];
				$email = $_POST['femail'];
				$nama = $_POST['fname'];
				$no_hp = $_POST['fno_hp'];
				$alamat = $_POST['falamat'];
				$password = $_POST['fpassword'];
				$status = "1";

				$query2 = "INSERT INTO penjual (id_penjual,username,email,nama,no_hp,alamat,password,status) VALUES ('','$username','$email', '$nama', '$no_hp', '$alamat', '$password', '$status')";

					if ($con->query($query2) === TRUE) {
						echo "<script>alert('Berhasil Ditambahkan');</script>";
					} else {
						echo "<script>alert('Gagal');</script>";
					}
			}

	?>
    </head>
    <body>
		<div class="wrapper">
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register" method="post" action="">
						<h3>Registrasi</h3>
						<div class="column">
							<div>
								<label>Username:</label>
								<input type="text" name="fusername" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Full Name (maximum 50 characters)" pattern="[a-zA-Z ]{3,50}" title="Only letters and white space allowed" required>
								<!-- <span class="error">This is an error</span> -->
							</div>
							<div>
								<label>Email:</label>
								<input type="text" name="femail" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Please fill your email with the right format" required>
								<!-- <span class="error">This is an error</span> -->
							</div>
							<div>
								<label>Nama:</label>
								<input type="text" name="fname" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Full Name (maximum 50 characters)" pattern="[a-zA-Z ]{3,50}" title="Only letters and white space allowed" required>
								<!-- <span class="error">This is an error</span> -->
							</div>
						</div>
						<div class="column">
							<div>
								<label>Alamat:</label>
								<input type="text" name="falamat" rows="5" cols="40" class="form-control form-control-user" placeholder="Address" pattern="[a-zA-Z0-9_.,:-]{3,200}" title="Please fill your address with the right format" required></input>
								<!-- <span class="error">This is an error</span> -->
							</div>
							<div>
								<label>No HP:</label>
								<input type="text" name="fno_hp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nomor HP" pattern="*[0-9]" title="Please fill your phone number with the right format" required>
								<!-- <span class="error">This is an error</span> -->
							</div>
							<div>
								<label>Password:</label>
								<input type="password" name="fpassword" id="password" class="form-control form-control-user" placeholder="Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Please fill your password with must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								<span class="error">This is an error</span>
							</div>
							<div>
								<label>Konfirmasi Password:</label>
								<input type="password" name="fpassword" id="password" class="form-control form-control-user" placeholder="Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Please fill your password with must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								<span class="error">This is an error</span>
							</div>
						</div>
						<button type="submit" name="submit2">Register</button>
						<div class="bottom">
							<div class="remember">
								<input type="checkbox" />
								<span>Send me updates</span>
							</div>
							<!-- <input type="submit" value="Register" /> -->
							<a href="login.php" rel="login" class="linkform">You have an account already? Log in here</a>
							<div class="clear"></div>
						</div>
					</form>
					<!-- login ===========================================================-->
					<form id="login" class="login active" onsubmit="return validateForm()" name="formLogin"  method="post" action="" >
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="fusername" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
							<!-- <span class="error">This is an error</span> -->
						</div>
						<div>
							<label>Password: 
								<!-- <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Forgot your password?</a> -->
							</label>
							<input type="password" name="fpassword" id="password1" class="form-control form-control-user" placeholder="Password">
							<!-- <span class="error">This is an error</span> -->
						</div>
						<button type="submit" name="submit">Login</button>
						<!-- <input type="submit" name="submit" value="Login" > -->
						<div class="bottom">
							<!-- <div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div> -->
							<a href="registrasi.php" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
					<!-- ================================================================ -->
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" name="login"value="Send reminder"></input>
							<a href="login.php" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="registrasi.php" rel="register" class="linkform">You don't have an account? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
					//the form wrapper (includes all forms)
				var $form_wrapper	= $('#form_wrapper'),
					//the current form is the one with class active
					$currentForm	= $form_wrapper.children('form.active'),
					//the change form links
					$linkform		= $form_wrapper.find('.linkform');
						
				//get width and height of each form and store them for later						
				$form_wrapper.children('form').each(function(i){
					var $theForm	= $(this);
					//solve the inline display none problem when using fadeIn fadeOut
					if(!$theForm.hasClass('active'))
						$theForm.hide();
					$theForm.data({
						width	: $theForm.width(),
						height	: $theForm.height()
					});
				});
				
				//set width and height of wrapper (same of current form)
				setWrapperWidth();
				
				/*
				clicking a link (change form event) in the form
				makes the current form hide.
				The wrapper animates its width and height to the 
				width and height of the new current form.
				After the animation, the new form is shown
				*/
				$linkform.bind('click',function(e){
					var $link	= $(this);
					var target	= $link.attr('rel');
					$currentForm.fadeOut(400,function(){
						//remove class active from current form
						$currentForm.removeClass('active');
						//new current form
						$currentForm= $form_wrapper.children('form.'+target);
						//animate the wrapper
						$form_wrapper.stop()
									 .animate({
										width	: $currentForm.data('width') + 'px',
										height	: $currentForm.data('height') + 'px'
									 },500,function(){
										//new form gets class active
										$currentForm.addClass('active');
										//show the new form
										$currentForm.fadeIn(400);
									 });
					});
					e.preventDefault();
				});
				
				function setWrapperWidth(){
					$form_wrapper.css({
						width	: $currentForm.data('width') + 'px',
						height	: $currentForm.data('height') + 'px'
					});
				}
				
				/*
				for the demo we disabled the submit buttons
				if you submit the form, you need to check the 
				which form was submited, and give the class active 
				to the form you want to show
				*/
				$form_wrapper.find('input[type="submit"]')
							 .click(function(e){
								e.preventDefault();
							 });	
			});
        </script>
    </body>
</html>