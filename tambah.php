<?php  
include "php/init.php";

// jika user tidak login redirect ke home
if( !isset($_SESSION['username']) ){
    header("Location: index.php");
}

// jika tombol logout ditekan
if( isset($_POST['logout']) ){
    logout();
}

// koneksi database
conn();

// tambah buku
if ( isset($_POST['tambah']) ) {
	tambahBuku($_POST['nama'], $_POST['deskripsi'], $_POST['pengarang'], $_POST['tahun']);
	header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Buku</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
    	.wrp {
    		width: 50vw; /* view width */
    		padding-left: 90px;
    	}
    </style>
</head>
<body>

<form method="post">
	<div class="wrp">
		<!-- nama -->
		<div class="input-group">
			<label for="nama">Nama Buku</label>
			<input type="text" name="nama" id="nama">
		</div>

		<!-- deskripsi -->
		<div class="input-group">
			<label for="deskripsi">Deskripsi</label>
			<input type="text" name="deskripsi" id="deskripsi">
		</div>

		<!-- pengarang -->
		<div class="input-group">
			<label for="pengarang">Pengarang</label>
			<input type="text" name="pengarang" id="pengarang">
		</div>

		<!-- thaun -->
		<div class="input-group">
			<label for="tahun">Tahun Terbit</label>
			<input type="date" name="tahun" id="tahun">
		</div>

		<!-- tombol tambah -->
		<div class="input-group">
			<button name="tambah" class="btn btn-success">Tambah</button>
		</div>

	</div>
</form>

</body>
</html>