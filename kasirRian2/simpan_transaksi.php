<?php
//koneksi database
include 'koneksi.php';

//menangkap data dari form yang dikirim
$id_transaksi = $_POST['id_transaksi'];
$tanggal = $_POST['tanggal'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

//menginput data ke database
mysqli_query($koneksi, "insert into transaksi 
values('$id_transaksi','$tanggal','$id_barang','$jumlah','$total')");

//mengalihkan halaman kembali ke tampil.php
header("location:transaksi.php");

