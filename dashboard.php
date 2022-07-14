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

// ambil semua buku di database
$buku = getAllBuku();

// hapus buku
if( isset($_POST['hapusBuku']) ){
    hapusBuku($_POST['idBuku']);
    echo "<script>alert('Data Buku Berhasil Terhapus~')</script>";
    header("Refresh:0");
}

// ambil pinjam buku
$pinjam = query("SELECT * FROM pinjam");


// jika buku diterima hapus data pinjam
if ( isset($_POST['terima']) ) {
    $id = $_POST['id_pinjam'];
    query("DELETE FROM `pinjam` WHERE `pinjam`.`id` = $id");
    echo "<script>alert('Buku Telah Berhasil Dipinjam~')</script>";
    header("Refresh: 0");
}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card {
            width: 60vw;
        }
    </style>
</head>
<body>

    <div class="wrp-login">
        <div class="dashboard-wrp">
            <!-- welcome card -->
            <div class="card">
                <div class="card-title">
                    <h1>Hi, Welcome Back <?= $_SESSION['username']?></h1>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <form method="post">
                            <button class="btn btn-danger" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- buku list card -->
            <div class="card">
                <div class="card-title">
                    <h1>List Buku : </h1>
                </div>
                <div class="card-body">
                    <div class="d-grid">
                        <div class="input-group">
                            <a href="tambah.php" class="btn btn-success">Tambah Buku</a>
                        </div>
                    </div>
                    <br>
                    <div class="scroll">
                        <table class="table" cellspacing="0">
                            <tr>
                                <th>No Id</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Aksi</th>
                            </tr>

                            <!-- Menampilkan Buku dari database -->
                            <?php foreach ($buku as $key => $row) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['deskripsi'] ?></td>
                                    <td><?= $row['pengarang'] ?></td>
                                    <td><?= $row['tahun_terbit'] ?></td>
                                    <td>
                                        <form method="post">
                                            <div class="d-flex">
                                                <a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-primary">Update Buku</a> |
                                                <input name="idBuku" hidden value="<?= $row['id'] ?>">
                                                <button name="hapusBuku" class="btn btn-danger">Hapus Buku</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
                    </div>
                </div>
            </div>

            <!-- request buku pinjam -->
            <div class="card">
                <div class="title">
                    <h1>Request dari pengunjung </h1>
                </div>
                <div class="card-body scroll">
                    <table class="table">
                        <tr>
                            <th>No Id</th>
                            <th>Judul Buku</th>
                            <th>Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($buku as $rowBuku) : ?>
                            <?php foreach( $pinjam as $rowPinjam ) : ?>
                                <?php if ( $rowBuku['id'] == $rowPinjam['buku_id'] ) : ?>
                                    <tr>
                                        <td><?= $rowPinjam['id'] ?></td>
                                        <td><?= $rowBuku['nama'] ?></td>
                                        <td>anonymous</td>
                                        <td><?= $rowPinjam['created_at'] ?></td>
                                        <td>
                                            <form method="post">
                                                <input hidden name="id_pinjam" value="<?= $rowPinjam['id'] ?>">
                                                <button name="terima" class="btn btn-sm btn-success">Terima</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>