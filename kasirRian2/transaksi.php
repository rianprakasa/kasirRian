<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Transaksi</title>
    <style>
        .ukuran{
            width: 600px;
        }
        h2{
            text-align: center;
            color: #d45769;
        }
        td {
            text-align: center;
        }
        .edit{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container mb-5 ukuran">
    <h2 class="mb-4">CRUD Data Transaksi</h2>
    <form action="simpan_transaksi.php" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">ID Transaksi</span>
            <input type="text" name="id_transaksi" class="form-control" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Tanggal</span>
            <input type="text" name="tanggal" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Barang</span>
            <select type="text" name="id_barang" id="id_barang" onchange="changeValue(this.value)" class="form-select" aria-describedby="basic-addon1">
            <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi, "SELECT * FROM barang");
                $jsArray =  "var dtBrg =  new Array();\n";
                while ($data = mysqli_fetch_array($query)) {
                    echo "<option value = $data[id_barang]> $data[nama_barang] </option>";
                    $jsArray .= "dtBrg['" . $data['id_barang'] . "'] 
                    = {harga:'" . addslashes($data['harga']) . "'};";
                }
                ?>
            </select>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Harga</span>
            <input type="text" name="harga_barang" id="harga_barang" class="form-control" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Jumlah</span>
            <input type="text" name="jumlah" id="jumlah" onkeyup="hitung();" class="form-control" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text" id="basic-addon1">Total</span>
            <input type="text" name="total" id="total" class="form-control" aria-describedby="basic-addon1">
            <button class="btn btn-secondary" type="submit">Simpan</button>
        </div>
    </form>  
    </div>

     <div class="container mb-5">           
    <table border="1" cellpadding="20" class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <td class="table-dark">ID Transaksi</td>
            <td class="table-dark">Tanggal</td>
            <td class="table-dark">Barang</td>
            <td class="table-dark">Jumlah</td>
            <td class="table-dark">Total</td>
            <td class="table-dark">Edit</td>
        </thead>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['id_transaksi'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
                <td><?php echo $data['jumlah'] ?></td>
                <td><?php echo $data['total'] ?></td>
                <td><a class=" btn btn-outline-dark" href="edit_transaksi.php?id_transaksi=<?php echo $data['id_transaksi'] ?>">edit</a></td>
            </tr>
        <?php } ?>
    </table>
    </div>



</body>
</html>




<script>
    <?php echo $jsArray; ?>
    //menampilkan perubahan harga ketika nama barang dirubah klik
    function changeValue(id_barang) {
        document.getElementById('harga_barang').value = dtBrg[id_barang].harga;
    };
    //menghitung total = jumlah * harga
    function hitung() {
        var jumlah = document.getElementById('jumlah').value;
        var harga_barang = document.getElementById('harga_barang').value;
        var result = parseInt(jumlah) * parseInt(harga_barang);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>