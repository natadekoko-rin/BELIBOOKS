<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id");

if (mysqli_affected_rows($conn) > 0) {
	header("Location:index.php");
}


 ?>