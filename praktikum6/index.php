<?php
include 'koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>CRUD</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" style="font-weight: bolder;" href="#">Data Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrasi.php">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="pt-3 text-center">Menampilkan Data Mahasiswa dari Database</h2>
        <a href="input.php" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data <br></a>

        <?php
        include 'koneksi.php';

        $query = "SELECT * FROM mhs order by npm";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
        ?>
            <table class="table table-striped">
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $npm = $row['npm'];
                    $nama = $row['nama'];
                    $prodi = $row['prodi'];
                    $alamat = $row['alamat'];
                ?>
                    <tr>
                        <td><?php echo $npm; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $prodi; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td>
                            <a class="btn btn-primary" href="edit.php?npm=<?php echo $npm; ?>">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a class="btn btn-danger delete" href="delete.php?npm=<?php echo $npm; ?>">
                                <i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        } else {
            echo "<p>Tidak ada data mahasiswa.</p>";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </div>
</body>

</html>