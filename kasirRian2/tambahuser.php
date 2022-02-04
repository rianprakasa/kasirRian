<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
</head>

<body>
    <h2>CRUD Data User</h2>

    <form action="simpan_user.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID User</td>
                <td><input type="text" name="id_user"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="user_name"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <table border="1">
        <tr>
            <td>ID Barang</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Foto</td>
            <td colspan="2">Aksi</td>
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
                <td><a href="edit_barang.php?id_barang=<?php echo $data['id_barang'] ?>">Edit</td>
                <td><a href="hapus_barang.php?id_barang=<?php echo $data['id_barang'] ?>">Hapus</td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>