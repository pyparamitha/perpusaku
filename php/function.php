<?php 
// global variable
$conn;

// function to connect to database
function conn(){
    global $conn;
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "perpus";

    $conn = mysqli_connect($host, $user, $pass, $db);
    return $conn;
}

// user login ke halaman dashboard
function login($username, $password){
    global $conn;
    $result = query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($result);
    if( $cek > 0 ){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    }
}

// query ke database kembali 1 data
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

// logout 
function logout(){
    session_destroy();
    unset($_SESSION['username']);   
    header("Location: index.php");
}


// CRUD Buku

// CREATE
function tambahBuku($nama, $deskripsi, $pengarang, $tahun_terbit){
    query("INSERT INTO `buku` (`id`, `nama`, `deskripsi`, `pengarang`, `tahun_terbit`) VALUES (NULL, '$nama', '$deskripsi', '$pengarang', '$tahun_terbit');");
}

// READ
function get($id){
    $data = query("SELECT * FROM `buku` WHERE `id` = $id");
    return mysqli_fetch_assoc($data);
}
function getAllBuku(){
    $hasil = [];
    $query = "SELECT * FROM `buku`";
    $result = query($query);
    while( $row = mysqli_fetch_assoc($result) ){
        $hasil[] = $row;
    }
    return $hasil;
}

// UPDATE
function ubahBuku($id, $nama, $deskripsi, $pengarang, $tahun){
    query("UPDATE `buku` SET `nama` = '$nama', `deskripsi` = '$deskripsi', `pengarang` = '$pengarang', `tahun_terbit` = '$tahun' WHERE `buku`.`id` = $id;");
}

// DELETE
function hapusBuku($id){
    query("DELETE FROM `buku` WHERE `buku`.`id` = $id");
}