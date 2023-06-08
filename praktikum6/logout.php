<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hapus sesi
session_destroy();

// Redirect ke halaman login atau halaman lainnya
header("Location: login.php");
exit;
