<?php
include 'config.php';

$query = "SELECT * FROM matakuliah";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Data Mata Kuliah</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
        <a href="../mhs/index.php" class="btn btn-warning mb-3">Mahasiswa</a>
        <a href="../krs/index.php" class="btn btn-warning mb-3">KRS</a>
        <a href="../../index.php" class="btn btn-danger mb-3">Home</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama</th>
                    <th>Jumlah SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['kodemk']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['jumlah_sks']; ?></td>
                        <td>
                            <a href="edit.php?kodemk=<?php echo $row['kodemk']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal" data-kodemk="<?php echo $row['kodemk']; ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a id="hapusLink" href="#" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script>
        var hapusModal = document.getElementById('hapusModal');
        hapusModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var kodemk = button.getAttribute('data-kodemk');
            var hapusLink = document.getElementById('hapusLink');
            hapusLink.href = 'hapus.php?kodemk=' + kodemk;
        })
    </script>
</body>

</html>