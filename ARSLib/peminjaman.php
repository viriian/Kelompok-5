<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['peminjaman'])) {
        $_SESSION['peminjaman'] = [];
    }
    $_SESSION['peminjaman'][] = [
        'id' => $_POST['id_buku'],
        'judul' => $_POST['judul_buku'],
        'penulis' => $_GET['penulis'], // Mengambil dari URL
        'deskripsi' => $_GET['deskripsi'] // Mengambil dari URL
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="search-container">
        <input type="text" id="sidebarSearchInput" placeholder="Temukan...">
        <button type="submit" onclick="searchBooksSidebar()">🔍</button>
    </div>
    <a href="homepage.php">Beranda</a>
    <a href="profil.php">Profil</a>
    <a href="perpustakaan.php">Perpustakaan</a>
    <a href="logout.php">Keluar</a>
</div>

<!-- Main Content -->
<div class="container">
    <h1>Peminjaman Buku</h1>
    <div class="book-details">
        <?php
        // Ambil data buku dari URL
        $id = $_GET['id'];
        $judul = $_GET['judul'];
        $penulis = $_GET['penulis'];
        $deskripsi = $_GET['deskripsi'];
        ?>

        <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
        <h2><?php echo $judul; ?></h2>
        <p>Penulis: <?php echo $penulis; ?></p>
        <p><?php echo $deskripsi; ?></p>
    </div>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div class="message">
            Buku telah terpinjam. Selamat membaca, semoga bermanfaat!
        </div>
    <?php else: ?>
        <form method="POST" action="peminjaman.php?id=<?php echo $id; ?>&judul=<?php echo $judul; ?>&penulis=<?php echo $penulis; ?>&deskripsi=<?php echo $deskripsi; ?>">
            <label for="nama_anggota">Nama Anggota:</label>
            <input type="text" id="nama_anggota" name="nama_anggota" required>

            <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $id; ?>">
            <input type="hidden" id="judul_buku" name="judul_buku" value="<?php echo $judul; ?>">

            <button type="submit">Pinjam Buku</button>
        </form>
    <?php endif; ?>
</div>

<script src="script.js"></script>

</body>
</html>
