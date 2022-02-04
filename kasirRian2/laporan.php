<?php
include "index.php";
?>

<!DOCTYPE html>

<head>
    <title>Laporan</title>
</head>

<body>
    <h1>Laporan</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tanggal :</td>
                <td><input type="date" name="tanggal_awal"> - <input type="date" name="tanggal_akhir"></td>
                <td><input type="submit" name="Tampilkan" value="Tampilkan"></td>
            </tr>
        </table>
    </form>
    <table border="2">
        <tr>
            <td>ID Transaksi</td>
            <td>Tanggal</td>
            <td>Barang</td>
            <td>Jumlah</td>
            <td>Total</td>
        </tr>
        <?php
        include 'koneksi.php';
        if (isset($_POST['tampilkan'])) {
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang AND transaksi.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang");
        }
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['id_transaksi'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
                <td><?php echo $data['jumlah'] ?></td>
                <td><?php echo $data['total'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>