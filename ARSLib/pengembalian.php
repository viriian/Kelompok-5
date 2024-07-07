<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'return') {
        $id_buku = $_POST['id_buku'];

        // Simulasi pengembalian buku
        $_SESSION['return_status'] = [
            'id' => $id_buku,
            'status' => 'returned'
        ];
    }
}

// Redirect kembali ke halaman perpustakaan
header('Location: perpustakaan.php');
exit();
?>
