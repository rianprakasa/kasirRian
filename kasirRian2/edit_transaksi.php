<?php
include "index.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Transaksi, Bagian Edit Data</title>
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
    <h2 class="mb-4"> Edit Data Transaksi</h2>
    
    <form action="update_transaksi.php" method="POST">
        <?php
            include 'koneksi.php';
            $id_barang = $_GET['id_transaksi'];
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_barang'");
            while ($data = mysqli_fetch_array($query)) {
            ?>


            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">ID Transaksi</span>
                <input type="text" name="id_transaksi"  value="<?php echo $data['id_transaksi'] ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Tanggal</span>
                <input type="text" name="tanggal" value="<?php echo $data['tanggal'] ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Nama Barang</span>
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
                <span class="input-group-text">Jumlah</span>
                <input type="text" name="jumlah" id="jumlah" value="<?php echo $data['jumlah'] ?>" onkeyup="hitung();" class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1">Total</span>
                <input type="text" name="total" id="total" value="<?php echo $data['total'] ?>" class="form-control" aria-describedby="basic-addon1">
                <button class="btn btn-secondary" type="submit" name="update">Simpan</button>

            </div>
            
            
            



                
        <?php } ?>
    </form>
    
    </div>

   
</body>

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

</html>

