<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <style>
        .container{
            width: 600px;
            /* background-color: salmon; */
            /* margin-left: 20px; */
        }

        #judul {
            color: #d45769;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
   

    <div class="container">
     <h2 id="judul">CRUD Data User</h2>

    <form action="simpan_barang.php" method="POST" enctype="multipart/form-data">

    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1">ID</span>
        <input type="text" name="id_barang" class="form-control" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1">Nama</span>
        <input type="text" name="nama_barang" class="form-control" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1">Harga</span>
        <input type="text" name="harga" class="form-control" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-4">
        <span class="input-group-text" id="basic-addon1">Stok</span>
        <input type="text" name="stok" class="form-control" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-4">
        <input type="file" name="foto" class="form-control">
        <button class="btn btn-secondary" type="submit">Simpan</button>
    </div>



    <div class="container">
    <table border="1" class="table table-striped table-bordered table-hover">
        <tr>
            <td class="table-dark">ID Barang</td>
            <td class="table-dark">Nama Barang</td>
            <td class="table-dark">Harga</td>
            <td class="table-dark">Stok</td>
            <td class="table-dark">Foto</td>
            <td class="table-dark" colspan="2">Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $data['id_barang'] ?> </td>
                <td> <?php echo $data['nama_barang'] ?> </td>
                <td> <?php echo $data['harga'] ?> </td>
                <td> <?php echo $data['stok'] ?></td>
                <td> <img src="gambar/<?php echo $data['foto'] ?>" width="70px" height="80px"></td>
                <td><a class="btn btn-outline-dark me-4" href="edit_barang.php?nama_barang=<?php echo $data['nama_barang'] ?>">Edit
                <a class="btn btn-outline-danger" href="hapus_barang.php?id_barang=<?php echo $data['id_barang'] ?>">Hapus</td>
            </tr>
        <?php } ?>
    </table>
    </div>

    

        <!-- <table>
            <tr>
                <td>ID Barang</td>
                <td><input type="text" name="id_barang"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table> -->
    </form>

    </div>
   
</body>

</html>