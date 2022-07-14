<?php  
include "php/init.php";
conn();

if ( isset($_GET['id']) ) {
	$id = $_GET['id'];
	$buku = get($id);

}else {
	header("Location: index.php");
}

// logika pinjam
if ( isset($_POST['pinjam']) ) {
	$date = date("Y-m-d");
	query("
		INSERT INTO `pinjam` (`id`, `buku_id`, `created_at`) VALUES (NULL, '$id', '$date');
		");

	$nama = $buku['nama'];

	echo '
		<script type="text/javascript">
			alert("Selamat, Buku ' . $nama . ' Telah Berhasil Dipinjam. Enjoy~");
			window.location.href = "index.php";
		</script>
	';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Google Materalize fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="wrp">
        <!-- header -->
        <header>
            <nav class="pink">
                <a href="index.php" class="brand-logo left"><i class="material-icons left">home</i> Its All About Kpop </a>
                <ul class="right">
                    <li class="active"> <a href="login.php"> Login </a>
                </ul>
            </nav>
        </header>
		<div class="content">
			<div class="card">
				<div class="card-body">

					<h1><?= $buku['nama'] ?></h1>
					<p><?= $buku['deskripsi'] ?></p>

					<hr>

					<table>
						<tr>
							<th>Pengarang</th>
							<td>: <?= $buku['pengarang'] ?></td>
						</tr>
						<tr>
							<th>Tahun Terbit</th>
							<td>: <?= $buku	['tahun_terbit'] ?></td>
						</tr>
					</table>

				</div>
			</div>


			<div class="card">
				<div class="card-body">
					<form method="post">
						<button name="pinjam" class="btn btn-sm btn-success">Pinjam Buku</button>
					</form>
				</div>
			</div>


		</div>
	</div>
	<footer class="page-footer pink">
		<div class="footer-copyright">
			<div class="container center">
			&copy; 2022 Pyparamitha
			</div>
		</div>
	</footer>
	<script src="js/app.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>