<?php
include "koneksi.php";

$npm = $_GET['npm'];
$query = "DELETE FROM mhs WHERE npm='$npm'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

header('location: index.php');
