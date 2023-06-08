<?php
include 'config.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $query = "SELECT * FROM mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm = $_POST['npm'];

    $query = "DELETE FROM mahasiswa WHERE npm='$npm'";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Konfirmasi Hapus Data</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" value="<?php echo $data['npm']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly><?php echo $data['alamat']; ?></textarea>
            </div>
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>