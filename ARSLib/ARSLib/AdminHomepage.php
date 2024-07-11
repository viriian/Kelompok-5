<?php
session_start();

// Fungsi untuk membaca data dari file JSON
$file = 'books.json';
$books = [];
if (file_exists($file)) {
    $books = json_decode(file_get_contents($file), true);
}

// Proses form untuk mengunggah buku baru
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'upload') {
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $deskripsi = $_POST['deskripsi'];

        // Proses upload gambar buku
        $gambar = '';
        if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['gambar']['name'];
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($file_ext, $allowed_ext)) {
                $gambar = 'uploads/' . uniqid() . '.' . $file_ext;
                move_uploaded_file($file_tmp, $gambar);
            }
        }

        // Proses upload file PDF buku
        $pdf = '';
        if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['pdf']['name'];
            $file_tmp = $_FILES['pdf']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_ext = array('pdf');

            if (in_array($file_ext, $allowed_ext)) {
                $pdf = 'uploads/' . uniqid() . '.' . $file_ext;
                move_uploaded_file($file_tmp, $pdf);
            }
        }

        // Simpan data buku ke dalam array
        $new_book = [
            'id' => $id_buku,
            'judul' => $judul,
            'penulis' => $penulis,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar,
            'pdf' => $pdf
        ];

        // Tambahkan buku baru ke array books
        $books[] = $new_book;

        // Simpan kembali data buku ke dalam file JSON
        file_put_contents($file, json_encode($books));

        // Tampilkan pesan buku berhasil diunggah
        $_SESSION['message'] = 'Buku berhasil diunggah.';
        $_SESSION['success'] = true;
        header('Location: AdminHomepage.php');
        exit;
    }
}
?>
