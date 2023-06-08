<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];

    $query = mysqli_query($conn, "SELECT user FROM daftar WHERE user='$user'");
    $num = mysqli_num_rows($query);


    // cek password dan konfirmasi password
    if ($pass !== $confirmpass) {
        echo "password tidak sesuai.";
        return false;
    }

    //cek registrasi
    if ($num > 1) {
        echo "Registrasi Berhasil";
    } else {
        echo mysqli_error($conn);
    }

    // enkripsi
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO daftar values ('','$user','$pass')");
    header("location:login.php");
    return mysqli_affected_rows($conn);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container position-relative">
        <p class="fs-2 text-center pt-3">Selamat datang di Halaman Registrasi Mahasiswa</p>
        <form action="" method="post">
            <div class="mb-3">
                <label for="user" class="form-label">Username</label>
                <input type="text" class="form-control" id="user" name="user">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="mb-3">
                <label for="confirmpass" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirmpass" name="confirmpass">
            </div>
            <div class="text-center">
                <button type="submit" name="daftar" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>