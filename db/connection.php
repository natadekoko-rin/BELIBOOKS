<?php
$db_host='localhost';
$db_database='belibooks';
$db_username='root';
$db_password='';
$connection = mysqli_connect($db_host,$db_username,$db_password,$db_database);
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>