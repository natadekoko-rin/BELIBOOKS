<?php 

require 'functions.php';

if (isset($_POST["register"])) {

	if (registrasi($_POST) > 0) {
		echo "
			<script>
				alert('user baru berhasil ditambahkan');
				</script>
		";
	} else {
		echo mysqli_error($conn);
	}
}






 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>

<h1>halaman registrasi</h1>

<form action="" method="post">
	<ul>
		<li>
			<label for="username"> username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="email"> email :</label>
			<input type="text" name="email" id="email">
		</li>
		<li>
			<label for="nama"> Nama :</label>
			<input type="text" name="nama" id="nama">
		</li>
		<li>
			<label for="alamat"> alamat :</label>
			<input type="text" name="alamat" id="alamat">
		</li>
		<li>
			<label for="nohp"> nohp :</label>
			<input type="text" name="nohp" id="nohp">
		</li>
		<li>
			<label for="password"> password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2"> konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Daftar</button>
		</li>
	</ul>
	
</form>







</body>
</html>