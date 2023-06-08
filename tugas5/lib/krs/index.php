<?php
include 'config.php';

$query = "SELECT krs.id, mhs.npm as mhs_npm, mk.kodemk, mhs.nama as mhs_nama, mk.nama as mk_nama, mk.jumlah_sks
          FROM krs
          INNER JOIN mahasiswa mhs ON krs.mhs_npm = mhs.npm
          INNER JOIN matakuliah mk ON krs.mk_kodemk = mk.kodemk";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Data KRS</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah KRS</a>
        <a href="../mhs/index.php" class="btn btn-warning mb-3">Mahasiswa</a>
        <a href="../mk/index.php" class="btn btn-warning mb-3">Mata Kuliah</a>
        <a href="../../index.php" class="btn btn-danger mb-3">Home</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kode MK</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['mhs_npm']; ?></td>
                        <td><?php echo $row['mhs_nama']; ?></td>
                        <td><?php echo $row['kodemk']; ?></td>
                        <td>
                            <span style="color: red;"><?php echo $row['mhs_nama']; ?></span> mengambil matakuliah <span style="color: red;"><?php echo $row['mk_nama']; ?></span> - <?php echo $row['jumlah_sks']; ?> SKS
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $row['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="hapusModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="hapusModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel<?php echo $row['id']; ?>">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>