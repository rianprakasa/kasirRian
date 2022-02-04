<?php

include 'koneksi.php';

//menangkap dari yang dikirim di barang.php
$username = $_POST['username'];
$password = $_POST['password'];
$filename = $_FILES['foto']['name'];

//pindahkan gambar ke folder gambar
move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar_user/' . $filename);

mysqli_query($koneksi, "INSERT INTO user VALUES('$username','$password','$filename')");

header("location:login.php");
