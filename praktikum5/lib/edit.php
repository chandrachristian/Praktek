<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <h2>Edit Data</h2>

    <?php
    include "koneksi.php";

    $npm = $_GET['npm'];
    $query = mysqli_query($conn, "SELECT * FROM mhs WHERE npm = '$npm'");
    while ($data = mysqli_fetch_array($query)) {
    ?>

        <form action="" method="post">

            <table>
                <tr>
                    <td>NPM</td>
                    <td><input type="textfield" name="npm" id="" value="<?php echo $data['npm'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="textfield" name="nama" id="" value="<?php echo $data['nama'] ?>"></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td><input type="textfield" name="prodi" id="" value="<?php echo $data['prodi'] ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="textfield" name="alamat" id="" value="<?php echo $data['alamat'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="simpan" id="" value="Simpan"></td>
                </tr>
            </table>

        </form>

    <?php
    }
    ?>


</body>

</html>