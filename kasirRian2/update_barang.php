<?php
include 'koneksi.php';

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

//query mengupdate data siswa
mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', stok='$stok' WHERE id_barang='$id_barang' ");

//alihkan halaman ke barang.php
header("location:barang.php");
