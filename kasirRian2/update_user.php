<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
// $foto = $_POST['foto'];
// $stok = $_POST['stok'];

//query mengupdate data siswa
mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', WHERE username='$username' ");

//alihkan halaman ke barang.php
header("location:login.php");
