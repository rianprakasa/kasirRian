


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foto user</title>
</head>
<body>
<h2>CRUD Data User</h2>

<form action="simpan_foto.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>upload foto</td>
            <td><input type="file" name="foto"></td>
        </tr>
        <tr>
            <td><input type="submit" value="simpan"></td>
        </tr>
    </table>

    <table border="1">
        <tr>
            <td>username</td>
            <td>password</td>
            <td>foto</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $data['username'] ?> </td>
                <td> <?php echo $data['password'] ?> </td>
                <td> <img src="gambar_user/<?php echo $data['foto'] ?>" width="70px" height="80px"></td>
                <td><a href="edit_user.php?username=<?php echo $data['username'] ?>">Edit</td>
                <td><a href="hapus_user.php?username=<?php echo $data['username'] ?>">Hapus</td>

            </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>