<?php
session_start();

// Inisialisasi atau simulasi data jika belum ada
if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [
        ['id' => 1, 'judul' => 'Buku A', 'penulis' => 'Penulis A', 'deskripsi' => 'Deskripsi Buku A', 'gambar' => 'buku_a.jpg', 'rating' => 0, 'reviews' => []],
        ['id' => 2, 'judul' => 'Buku B', 'penulis' => 'Penulis B', 'deskripsi' => 'Deskripsi Buku B', 'gambar' => 'buku_b.jpg', 'rating' => 0, 'reviews' => []],
        ['id' => 3, 'judul' => 'Buku C', 'penulis' => 'Penulis C', 'deskripsi' => 'Deskripsi Buku C', 'gambar' => 'buku_c.jpg', 'rating' => 0, 'reviews' => []]
        // Tambahkan buku lainnya sesuai kebutuhan
    ];
}

// Proses pengembalian buku
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'return') {
        $id_buku = $_POST['id_buku'];

        // Tandai buku sebagai dikembalikan (misalnya, dihapus dari session books)
        foreach ($_SESSION['books'] as $key => $book) {
            if ($book['id'] == $id_buku) {
                unset($_SESSION['books'][$key]);
                break;
            }
        }

        // Simpan status pengembalian untuk ditampilkan di Homepage.php
        $_SESSION['return_status'] = [
            'id' => $id_buku,
            'status' => 'returned'
        ];

        // Redirect ke Homepage.php setelah pengembalian
        header('Location: Homepage.php');
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'rating') {
        $id_buku = $_POST['id_buku'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        // Simpan rating pada buku (misalnya, dalam file terpisah atau database)
        // Simulasi penyimpanan rating ke dalam session (contoh sederhana)
        $_SESSION['books'][$id_buku - 1]['rating'] = $rating;
        $_SESSION['books'][$id_buku - 1]['reviews'][] = ['nama' => 'User', 'rating' => $rating, 'komentar' => $review];
    }
}
?>
