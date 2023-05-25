<?php

include 'koneksi.php';

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$alamat = $_POST['alamat'];

$query = "INSERT INTO mhs (npm, nama, prodi, alamat) VALUES ('$npm', '$nama', '$prodi', '$alamat')";

if (mysqli_query($conn, $query)) {
    echo "Data disimpan";
} else {
    echo "Error" . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

header("location:index.php");

?>