<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Data Mahasiswa</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <a href="../mk/index.php" class="btn btn-warning mb-3">Mata Kuliah</a>
        <a href="../krs/index.php" class="btn btn-warning mb-3">KRS</a>
        <a href="../../index.php" class="btn btn-danger mb-3">Home</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM mahasiswa";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['npm'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>
                            <a href='edit.php?npm=" . $row['npm'] . "' class='btn btn-primary btn-sm'>Edit</a>
                            <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#hapusModal' data-npm='" . $row['npm'] . "'>Hapus</button>
                          </td>";
                    echo "</tr>";
                }
                ?>
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
            var npm = button.getAttribute('data-npm');
            var hapusLink = document.getElementById('hapusLink');
            hapusLink.href = 'hapus.php?npm=' + npm;
        })
    </script>
</body>

</html>