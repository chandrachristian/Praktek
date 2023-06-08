<?php
include 'config.php';

$query_mahasiswa = "SELECT * FROM mahasiswa";
$result_mahasiswa = mysqli_query($conn, $query_mahasiswa);
$data_mahasiswa = mysqli_fetch_all($result_mahasiswa, MYSQLI_ASSOC);

$query_matakuliah = "SELECT * FROM matakuliah";
$result_matakuliah = mysqli_query($conn, $query_matakuliah);
$data_matakuliah = mysqli_fetch_all($result_matakuliah, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mhs_npm = $_POST['mhs_npm'];
    $mk_kodemk = $_POST['mk_kodemk'];

    $query = "INSERT INTO krs (mhs_npm, mk_kodemk) VALUES ('$mhs_npm', '$mk_kodemk')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambahkan data KRS: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KRS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah KRS</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="mhs_npm" class="form-label">NPM Mahasiswa</label>
                <select class="form-select" id="mhs_npm" name="mhs_npm">
                    <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                        <option value="<?php echo $mahasiswa['npm']; ?>"><?php echo $mahasiswa['npm']; ?> - <?php echo $mahasiswa['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="mk_kodemk" class="form-label">Kode MK</label>
                <select class="form-select" id="mk_kodemk" name="mk_kodemk">
                    <?php foreach ($data_matakuliah as $matakuliah) : ?>
                        <option value="<?php echo $matakuliah['kodemk']; ?>"><?php echo $matakuliah['kodemk']; ?> - <?php echo $matakuliah['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>