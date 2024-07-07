<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    foreach ($_SESSION['peminjaman'] as $key => $peminjaman) {
        if ($peminjaman['id'] == $id_buku) {
            unset($_SESSION['peminjaman'][$key]);
        }
    }
}

header("Location: perpustakaan.php");
exit();
