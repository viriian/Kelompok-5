<?php
session_start();

// Cek apakah user sudah login sebagai admin (disesuaikan dengan mekanisme login yang Anda miliki)
$adminLoggedIn = true; // Ganti dengan logika autentikasi admin yang sesuai

if (!$adminLoggedIn) {
    echo "Anda tidak memiliki akses untuk mengakses halaman ini.";
    exit;
}

// Ambil data buku dari file JSON
$file = 'books.json';
$books = [];
if (file_exists($file)) {
    $books = json_decode(file_get_contents($file), true);
}

// Proses form untuk menghapus buku
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id_buku = $_POST['id_buku'];

        // Cari indeks buku yang akan dihapus
        $index = array_search($id_buku, array_column($books, 'id'));

        // Hapus buku dari array
        if ($index !== false) {
            unset($books[$index]);
            // Simpan kembali data buku ke dalam file JSON
            file_put_contents($file, json_encode(array_values($books)));
        }
    }
}

include 'AdminLibrary.html';
?>
