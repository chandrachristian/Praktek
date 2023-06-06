<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    // Periksa apakah `kodemk` sudah ada di database
    $queryCheck = "SELECT * FROM matakuliah WHERE kodemk='$kodemk'";
    $resultCheck = mysqli_query($conn, $queryCheck);
    if (mysqli_num_rows($resultCheck) > 0) {
        // Tampilkan modal jika `kodemk` terduplikat
        echo "
        <script>
            alert('Kode MK sudah ada. Mohon masukkan kode MK yang unik.');
            window.location.href = 'tambah.php';
        </script>";
        exit();
    }

    $query = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Mata Kuliah</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="kodemk" class="form-label">Kode MK</label>
                <input type="text" class="form-control" id="kodemk" name="kodemk" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Modal untuk kode MK terduplikat -->
    <div class="modal fade" id="duplicateModal" tabindex="-1" aria-labelledby="duplicateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="duplicateModalLabel">Kode MK Terduplikat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Kode MK sudah ada. Mohon masukkan kode MK yang unik.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

    <?php
    // Tampilkan modal jika ada parameter 'duplicate' di URL
    if (isset($_GET['duplicate']) && $_GET['duplicate'] === 'true') {
        echo "<script>$('#duplicateModal').modal('show');</script>";
    }
    ?>
</body>

</html>