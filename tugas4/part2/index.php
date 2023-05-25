<?php
// Mendefinisikan array asosiatif dari $bandara_asal
$bandara_asal = [
    "Soekarno-Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rahman Saleh" => 40000,
    "Juanda" => 30000
];

// Mengurutkan Eleman Array Asosiatif secara Asceding order berdasarkan kunci (key)
ksort ($bandara_asal);

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwantan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

// Mengurutkan Eleman Array Asosiatif secara Asceding order berdasarkan kunci (key)
ksort($bandara_tujuan);

// Membuat fungsi pajak_asal tujuan untuk menghitung harga pajak asal
function pajak_asal($bandara_asal, $asal)
{
    $harga_pajak = $bandara_asal [$asal];
    return $harga_pajak;
}

// Membuat fungsi pajak tujuan untuk menghitung harga pajak tujuan
function pajak_tujuan ($bandara_tujuan, $tujuan)
{
    $harga_pajak = $bandara_tujuan [$tujuan];
    return $harga_pajak;
}

// Membuat fungsi hitung_total_pajak untuk menghitung total pajak
function hitung_total_pajak ($bandara_asal, $asal, $bandara_tujuan,$tujuan)
{
    $harga_pajak_asal = pajak_Asal ($bandara_asal, $asal);
    $harga_pajak_tujuan = pajak_tujuan ($bandara_tujuan, $tujuan);
    $total_pajak = $harga_pajak_asal + $harga_pajak_tujuan;
    return $total_pajak;
}

// membuat fungsi hitung_total_harga_tiket untuk menghitung total harga dari tiket
function hitung_total_harga_tiket ($harga_tiket, $total_pajak)
{
    $total_harga_tiket = $harga_tiket + $total_pajak;
    return $total_harga_tiket;
}

// membuat fungsi untuk mengonversikan angka ke rupiah
function rupiah ($angka)
{
    $hasil = "Rp " . number_format ($angka,0,',','.');
    return $hasil;
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-
    1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
    <title>Pendaftaran Rute Pesawat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-light shadow" style="background-color: #1C315E;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="s-airbus.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                <span style="color: #FFFFFF; margin-left: 3px;">Super Airbus</span>
            </a>
        </div>
    </nav>
    <div class="container">
        <h1 class="my-5 text-center">Pendaftaran Rute Penerbangan</h1>
    <div class="form-group">

    <!-- Membuat Form dengan mengunakan method POST -->
    <form class="box" action="" method="POST" >
    <!-- Membuat Kolom Input tanggal bertipe hidden, dan menginput php untuk membuat tanggal ketika data penerbangan diinput -->
    <input type="hidden" name="tanggal" value="<?php echo date ("d-m-y"); ?>" class="form-control">
    <label for="nama_maskapai"><strong>Nama Maskapai</strong></label>
    <!-- Membuat Kolom Input nama_maskapai bertipe text -->
    <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control m-2" >
    <label for="bandara_asal"><strong>Bandara Asal</strong></label>
    <!-- Memakai Select untuk menapilkan list pilihan yang dapat dipilih oleh user -->
    <select name="bandara_asal" id="bandara_asal" class="form-control m-2">
        <!-- Membuat dropdown bandara asal memakai foreach -->
        <?php
        foreach ($bandara_asal as $asal => $pajak_asal){
        ?>
        <option class="m-2" value="<?= $asal; ?>"><?= $asal;?> </option>
        <?php
        }
        ?>
    </select>
    <label for="bandara_tujuan"><strong>Bandara Tujuan</strong></label>
    <!-- membuat select untuk menampilkan list pilihan yang dapat dipilih oleh user -->
    <select name="bandara_tujuan" id="bandara_tujuan" class="form-control m-2">
        <!-- membuat dropdown bandara tujuan memakai foreach -->
        <?php
        foreach ($bandara_tujuan as $tujuan => $pajak_tujuan){
        ?>
        <option class="m-2" value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
        <?php
        }
        ?>
    </select>
    <label for="harga_tiket"><strong>Harga Tiket</strong></label>
    <!-- Membuat Kolom Input harga_tiket bertipe number -->
    <input type="number" name="harga_tiket" id="harga_tiket" class="form-control m-2">

    <!-- membuat kolom input daftar bertipe submit -->
    <div class="row">
        <div class="col-md-1">
            <input type="submit" value="Daftar" name="daftar" class="btn m-3" style="background-color:#1C315E; color: #FFFFFF;">
        </div>
        <div class="col-md-3">
            <!-- Button modal untuk melihat hasil tiket -->
            <button type="button" class="btn m-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:#1C315E; color: #FFFFFF;">
            Lihat Tiket
            </button>
        </div>
    </div>
    <style>
    /* Efek hover untuk tombol "Daftar" */
    input[type="submit"]:hover {
        background-color: #FFFFFF;
        color: #850000;
    }

    /* Efek hover untuk tombol "Lihat Tiket" */
    button:hover {
        background-color: #FFFFFF;
        color: #850000;
    }
    </style>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- membuat class bernama container 1 -->
                    <div class="container1">
                        <!-- membuat label dengan 400px dan tinggi 363px -->
                        <table width="400px" height ="363px">
                            <!-- Menginput PHP dan memakai fungdi isset() untuk membuktikan bahwa sebuah variable telah didefinisikan -->
                            <?php
                            if (isset ($_POST ['daftar'])){
                                $tanggal = $_POST ['tanggal'];
                                $maskapai = $_POST ['nama_maskapai'];
                                $asal = $_POST ['bandara_asal'];
                                $tujuan = $_POST ['bandara_tujuan'];
                                $harga_tiket = $_POST ['harga_tiket'];
                                $pajak = hitung_total_pajak ($bandara_asal, $asal,
                                $bandara_tujuan, $tujuan);
                                $total_harga_tiket = hitung_total_harga_tiket
                                ($_POST['harga_tiket'],$pajak);
                            }
                            ?>
                            <tr>
                                <!-- menampilkan output tanggal dan nilainya berisi tanggal ketika data penerbangan diinput -->
                                <td><strong><?php echo "Tanggal"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "$tanggal"?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan output nama maskapai dan nilainya saat data di input -->
                                <td><strong><?php echo "Nama Maskapai"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "$maskapai"?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan outpu asal penerbangan dan nilainya saat data diinput -->
                                <td><strong><?php echo "Asal Penerbangan"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "$asal"?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan output tujuan penerbangan dan nilainya saat data diinput -->
                                <td><strong><?php echo "Tujuan Penerbangan"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "$tujuan"?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan output harga tiket (dalam bentuk rupiah) dan nilainya saat data diinput -->
                                <td><strong><?php echo "Harga Tiket"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "" .rupiah($harga_tiket)?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan output pajak (dalam bentuk rupiah) dan nilainya saat data diinput -->
                                <td><strong><?php echo "Pajak"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "" .rupiah($pajak)?></td>
                            </tr>
                            <tr>
                                <!-- menampilkan output total harga tiket (dalam bentuk rupiah) dan nilainya saat data diinput -->
                                <td><strong><?php echo "Harga Tiket"?> </strong></td>
                                <td>:</td>
                                <td><?php echo "" .rupiah($total_harga_tiket)?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>