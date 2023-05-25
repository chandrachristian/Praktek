<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH DATA</title>
</head>

<body>
    <h2>INPUT DATA</h2>
    <form action="tambah.php" method="post">
        <table>
            <tr>
                <td>NPM</td>
                <td><input type="textfield" name="npm"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="textfield" name="nama"></td>
            </tr>
            <tr>
                <td>PRODI</td>
                <td><input type="textfield" name="prodi"></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="textfield" name="alamat"></td>
            </tr>
            <tr>
                <td> <input type="submit" name="simpan" value="Simpan"> </td>
            </tr>
        </table>
    </form>

    <?php
    include 'koneksi.php';


    if (isset($_POST['simpan'])) {

        // $sql = "INSERT INTO mhs SET
        // npm = '$_POST[npm]';
        // nama = '$_POST[nama]';
        // prodi = '$_POST[prodi]';
        // alamat = '$_POST[alamat]'";

        // mysqli_query($conn, $sql);

        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO mhs (npm, nama, prodi, alamat) VALUES ('$npm', '$nama', '$prodi', '$alamat')";
$result = mysqli_query($conn, $query);

        echo "Data Berhasil diinput";
    }
    ?>



</body>

</html>