<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "tugas5";

/* membuat koneksi */
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("cannot connect" . mysqli_connect_error());
}
