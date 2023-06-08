<?php
include 'config.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    $query = "SELECT * FROM matakuliah WHERE kodemk='$kodemk'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodemk = $_POST['kodemk'];

    $query = "DELETE FROM matakuliah WHERE kodemk='$kodemk'";
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
                <label for="kodemk" class="form-label">Kode MK</label>
                <input type="text" class="form-control" id="kodemk" name="kodemk" value="<?php echo $data['kodemk']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" value="<?php echo $data['jumlah_sks']; ?>" readonly>
            </div>
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>