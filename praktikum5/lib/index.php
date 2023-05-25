<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CRUD</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>

    <h2>Menampilkan Data Mahasiswa dari Database</h2>
    <a href="input.php">Tambah Data <br></a>

    <?php
    include 'koneksi.php';

    $query = "SELECT * FROM mhs order by npm";
    $result = mysqli_query($conn, $query);

    if ($result) {
    ?>
        <table border="1">
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_row($result)) {
            ?>
                <tr>
                    <?php
                    $npm = $row[0];
                    $nama = $row[1];
                    $prodi = $row[2];
                    $alamat = $row[3]; ?>
                    <td><?php echo $npm; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $prodi; ?></td>
                    <td><?php echo $alamat; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    ?>

</body>

</html>