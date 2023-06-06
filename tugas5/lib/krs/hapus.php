<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT krs.id, mhs.npm as mhs_npm, mk.kodemk, mhs.nama as mhs_nama, mk.nama as mk_nama
              FROM krs
              INNER JOIN mahasiswa mhs ON krs.mhs_npm = mhs.npm
              INNER JOIN matakuliah mk ON krs.mk_kodemk = mk.kodemk
              WHERE krs.id = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM krs WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data KRS: " . mysqli_error($conn);
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
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" value="<?php echo $data['mhs_npm']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['mhs_nama']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="kodemk" class="form-label">Kode MK</label>
                <input type="text" class="form-control" id="kodemk" name="kodemk" value="<?php echo $data['kodemk']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="mk_nama" class="form-label">Nama Matakuliah</label>
                <input type="text" class="form-control" id="mk_nama" name="mk_nama" value="<?php echo $data['mk_nama']; ?>" readonly>
            </div>
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>