<?php
include "index.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang, Bagian Edit Data</title>
    <style>
        .ukuran{
            width: 600px;
        }
        h2{
            text-align: center;
            color: #d45769;
        }
    </style>
</head>

<body>
    <div class="container ukuran">
    <h2 class="mb-4">Edit Data Barang</h2>
    <form action="update_barang.php" method="POST">
        <?php
        include 'koneksi.php';
        $id_barang = $_GET['nama_barang'];
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang='$id_barang'");
        while ($data = mysqli_fetch_array($query)) {
        ?>

            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">ID</span>
                <input type="text" name="id_barang" value="<?php echo $data['id_barang'] ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Nama</span>
                <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Harga</span>
                <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Stok</span>
                <input type="text" name="stok" value="<?php echo $data['stok'] ?>" class="form-control" aria-describedby="basic-addon1">
                <button class="btn btn-secondary" type="submit">Update</button>
            </div>
            <div class="input-group mb-4">
                <img src="gambar/<?php echo $data['foto'] ?>" width="70" height="80">
            </div>
            

        <?php } ?>
    </form>
    </div>
</body>

</html>