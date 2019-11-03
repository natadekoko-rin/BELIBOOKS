<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","belibooks");

function query ($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
} 


function tambah ($post) {
	global $conn;
	$judul = htmlspecialchars($post["judul"]);
	$pengarang = htmlspecialchars($post["pengarang"]);
	$penerbit = htmlspecialchars($post["penerbit"]);
	$tahun_terbit = htmlspecialchars($post["tahun_terbit"]);
	$harga = htmlspecialchars($post["harga"]);
	$stok = htmlspecialchars($post["stok"]);

	// upload gmabar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}


	$query = "INSERT INTO `buku`(`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `harga`, `stok`, `gambar`, `id_penjual`) VALUES   ('','$judul','$pengarang','$penerbit',$tahun_terbit,$harga,$stok,'$gambar',2)";
	mysqli_query($conn, $query);
	return 	mysqli_affected_rows ($conn);

}


function upload(){

	$namafile = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// cek appakah ada gambar yg diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar dulu broo');
			  </script>";
		return false;
	}

	// cek yang diupload gambar atau bukan
	$gambarvalid = ['jpg','jpeg','png'];
	$extgambar = explode('.',$namafile);
	$extgambar = strtolower(end($extgambar));
	if (!in_array($extgambar, $gambarvalid)) {
		echo "<script>
					alert('gambar bro, jangan yang lain');
				  </script>";
		return false;		  
			
	}

	// cek ukuran file
	if ($ukuran > 500000) {
		echo "<script>
						alert('gambar terlalu besar');
					  </script>";
		return false;
	}

	// lolos pengecekan
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $extgambar;
	move_uploaded_file($tmpname, 'img/'.$namafilebaru);
	
	return $namafilebaru;
}


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
	return mysqli_affected_rows($conn);
}


// function ubah($post) {

// 	global $conn;
// 	$id = $post["id"];
// 	$judul = htmlspecialchars($post["judul"]);
// 	$pengarang = htmlspecialchars($post["pengarang"]);
// 	$penerbit = htmlspecialchars($post["penerbit"]);
// 	$tahun_terbit = htmlspecialchars($post["tahun_terbit"]);
// 	$harga = htmlspecialchars($post["harga"]);
// 	$stok = htmlspecialchars($post["stok"]);
// 	$gambarlama = htmlspecialchars($post["gambarlama"]);

// 	//cek user pilih gambar baru atau tidak
// 	if ($_FILES['gambar']['error'] === 4) {
// 		$gambar = $gambarlama;
// 	} else {
// 		$gambar = upload();
// 	}


// 	$query = "UPDATE buku SET 
// 				judul = '$judul',
// 				pengarang = '$pengarang',
// 				penerbit = '$penerbit',
// 				tahun_terbit = '$tahun_terbit',
// 				harga = '$harga',
// 				stok = '$stok'
// 			WHERE id = $id
// 			";


// 	mysqli_query($conn, $query);
// 	return 	mysqli_affected_rows ($conn);

// }

function cari($keyword) {
	$query = "SELECT * FROM buku WHERE
				judul like '%$keyword%' or 
				pengarang like '%$keyword%' or
				penerbit like '%$keyword%'
			";

	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// cek usernmae sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM penjual WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar');
			</script>";
		return false;
	}


	// cek konfirmasi password
	if ($password !== $password2 ) {
		echo "<script>
				alert('password tidaks sesuai');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// insert ke database
	mysqli_query($conn, "INSERT INTO penjual VALUES('', '$username','','','','', '$password','')");

	return mysqli_affected_rows($conn);

}








?>