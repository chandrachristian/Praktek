<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit();
} elseif (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $query = "SELECT * FROM mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Data Mahasiswa</h2>
        <form method="POST" action="">
            <input type="hidden" name="npm" value="<?php echo $data['npm']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan" required>
                    <option value="Informatika" <?php if ($data['jurusan'] === 'Informatika') echo 'selected'; ?>>
                        Informatika</option>
                    <option value="Sistem Informasi" <?php if ($data['jurusan'] === 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>

        </form>
    </div>
</body>

</html>