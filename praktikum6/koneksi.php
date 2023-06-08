<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "perkuliahan";

/* membuat koneksi */
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("cannot connect" . mysqli_connect_error());
}
