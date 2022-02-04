<?php

include 'koneksi.php';

//menangkap dari yang dikirim di barang.php
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$filename = $_FILES['foto']['name'];

//pindahkan gambar ke folder gambar
move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $filename);

mysqli_query($koneksi, "INSERT INTO barang VALUES('$id_barang','$nama_barang',
'$harga','$stok','$filename')");

header("location:barang.php");
