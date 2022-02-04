<?php
include 'index.php';
include 'koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$tanggal = $_POST['tanggal'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

//query mengupdate data siswa
mysqli_query($koneksi, "UPDATE transaksi SET tanggal='$tanggal', id_barang='$id_barang', jumlah='$jumlah', total='$total' WHERE id_transaksi='$id_transaksi' ");




//alihkan halaman ke barang.php
header("location:transaksi.php");
