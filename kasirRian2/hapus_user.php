<?php
include 'koneksi.php';

//mengambil nis yang ada di url
$id_user =  $_GET['username'];

//query menghapus data
mysqli_query($koneksi, "DELETE FROM user WHERE username='$id_user'");

//alihkan halaman ke user.php
header("location:login.php");
