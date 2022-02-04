<?php
// include "index.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang, Bagian Edit Data</title>
</head>

<body>
    <h2>Edit Data Barang</h2>
    <br>
    <form action="update_user.php" method="POST">
        <?php
        include 'koneksi.php';
        $username = $_GET['username'];
        $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <table>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" value="<?php echo $data['username'] ?>"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" value="<?php echo $data['password'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?php echo $data['foto'] ?>" width="70" height="80"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        <?php } ?>
    </form>
</body>

</html>