<?php
// date time untuk jakarta indonesia
date_default_timezone_set('Asia/Jakarta');
// list pajak untuk bandara asal
$list_pajak_bandara_asal = [
  'Soekarno Hatta' => 65000,
  'Husein Sastranegara' => 50000,
  'Abdul Rachman Saleh' => 40000,
  'Juanda' => 30000
];
// list pajak untuk bandara tujuan
$list_pajak_bandara_tujuan = [
  'Ngurah Rai' => 85000,
  'Hasanuddin' => 70000,
  'Inanwatan' => 90000,
  'Sultan Iskandar Muda' => 60000
];
// apabila ada post yang dikirim
if ($_POST) {
  // deklarasi variabel untuk setiap input
  $waktu_submit     = time();
  $nama_maskapai    = $_POST['nama_maskapai'];
  $bandara_asal     = $_POST['bandara_asal'];
  $bandara_tujuan   = $_POST['bandara_tujuan'];
  // cek pajak untuk setiap bandara asal dan tujuan
  $pajak_bandara_asal     = $list_pajak_bandara_asal[$bandara_asal];
  $pajak_bandara_tujuan   = $list_pajak_bandara_tujuan[$bandara_tujuan];
  // total pajak, harga tiket dan total harga tiket
  $pajak_total  = $pajak_bandara_asal + $pajak_bandara_tujuan;
  $harga_tiket  = isset($_POST['harga_tiket']) ? ($_POST['harga_tiket'] != '' ? $_POST['harga_tiket'] : 0) : 0;
  $total_harga_tiket  = $harga_tiket + $pajak_total;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!--font link-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Pemesanan Tiket Pesawat</title>
</head>

<body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark text-light">
    <div class="container">
      <a class="navbar-brand text-white" href="#header">
        <img src="../assets/images/logo.png" width="50" height="auto" class="d-inline-block align-top" alt="">
        CHANDRA AIRLINES
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto">
          <a class="nav-link active" href="#">HOME</a>
          <a class="nav-link active" href="#">BUY</a>
          <a class="nav-link active" href="#">HARGA</a>
          <a class="nav-link active" href="#">DESTINASI</a>
        </ul>
      </div>
  </nav>

  <header id="header" class="jumbotron">
    <div class="container py-5">
      <h1 class="text-center" style="color: white;">Selamat datang di E-Ticketing CHANDRA AIRLINES</h1>
        <section id="tiket" class="tiket">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card">
                <div class="card-body">
                  <form method="POST">
                    <div class="mb-3">
                      <h5 class="fw-dark text-center">Berikut Pengisian Data Untuk Pembelian Tiket :</h1><br>
                        <label for="input-nama-maskapai" class="form-label">Nama Maskapai</label>
                        <!-- <input name="nama_maskapai" type="text" class="form-control" id="input-nama-maskapai" placeholder="Nama Maskapai" required> -->
                        <select id="input-nama-maskapai" name="nama_maskapai" class="form-select" required>
                          <option value="" selected>Pilih Bandara</option>
                          <option value="Garuda Indonesia">Garuda Indonesia</option>
                          <option value="Lion Air">Lion Air</option>
                          <option value="Batik Air">Batik Air</option>
                          <option value="Air Asia">Air Asia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-asal" class="form-label">Bandara Asal</label>
                      <select id="input-bandara-asal" name="bandara_asal" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_asal as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-tujuan" class="form-label">Bandara Tujuan</label>
                      <select id="input-bandara-tujuan" name="bandara_tujuan" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_tujuan as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="input-harga-tiket" class="form-label">Harga Tiket</label>
                      <input name="harga_tiket" type="number" class="form-control" id="input-harga-tiket" placeholder="Harga Tiket" required>
                    </div>
                    <button class="btn btn-warning w-100">Pesan</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-3">
              <div class="card h-100">
                <div class="card-body">
                  <table class="table table-borderless table-hover my-5">
                    <tbody>
                      <h5 class="fw-dark text-center">Hasil Pembelian Tiket :</h1>
                        <tr>
                          <th scope="row">Tanggal</th>
                          <td>:</td>
                          <td><?= isset($waktu_submit) ? date('d M Y - H:i', $waktu_submit) : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nama Maskapai</th>
                          <td>:</td>
                          <td><?= isset($nama_maskapai) ? $nama_maskapai : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Asal Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_asal) ? $bandara_asal : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tujuan Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_tujuan) ? $bandara_tujuan : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($harga_tiket) ? 'Rp ' . number_format($harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Pajak</th>
                          <td>:</td>
                          <td><?= isset($pajak_total) ? 'Rp ' . number_format($pajak_total) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr class="border-top">
                          <th scope="row">Total Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($total_harga_tiket) ? 'Rp ' . number_format($total_harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>