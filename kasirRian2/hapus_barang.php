<?php
include 'koneksi.php';

//mengambil nis yang ada di url
$id_barang =  $_GET['id_barang'];

//query menghapus data
mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'");

//alihkan halaman ke barang.php
header("location:tampilbarang.php");
