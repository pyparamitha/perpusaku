<?php  
include "php/init.php";
conn();

// ambil buku dengan id
if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
	$hasil = get($id);
}else {
	header("Location: dashboard.php");
}


// jika tombol ubah diklik
if( isset($_POST['ubahBuku']) ){
	ubahBuku($id, $_POST['nama'], $_POST['deskripsi'], $_POST['pengarang'], $_POST['tahun'] );
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
			<input type="text" name="nama" id="nama" value="<?= $hasil['nama']; ?>">
		</div>

		<!-- deskripsi -->
		<div class="input-group">
			<label for="deskripsi">Deskripsi</label>
			<input type="text" name="deskripsi" id="deskripsi" value="<?= $hasil['deskripsi']; ?>">
		</div>

		<!-- pengarang -->
		<div class="input-group">
			<label for="pengarang">Pengarang</label>
			<input type="text" value="<?= $hasil['pengarang']; ?>" name="pengarang" id="pengarang">
		</div>

		<!-- thaun -->
		<div class="input-group">
			<label for="tahun">Tahun Terbit</label>
			<input type="date" name="tahun" id="tahun" value="<?= $hasil['tahun_terbit']; ?>">
		</div>

		<!-- tombol tambah -->
		<div class="input-group">
			<button name="ubahBuku" class="btn btn-success">Update</button>
		</div>

	</div>
</form>
<footer class="page-footer pink">
		<div class="footer-copyright">
			<div class="container center">
			&copy; 2022 Pyparamitha
			</div>
		</div>
	</footer>
</body>
</html>