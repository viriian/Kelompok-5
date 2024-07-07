<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
        /* CSS */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 50px;
            text-align: center;
            width: 80%;
            margin: 20px auto;
        }

        .container h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 40px;
        }

        .container form {
            text-align: left;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .container input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #444;
        }

        .book-details img {
            width: 100%;
            height: 200px;
            background-color: #e0e0e0;
            margin-bottom: 10px;
        }

        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

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

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        if (!isset($_SESSION['peminjaman'])) {
            $_SESSION['peminjaman'] = [];
        }
        $_SESSION['peminjaman'][] = [
            'id' => $_POST['id_buku'],
            'judul' => $_POST['judul_buku'],
            'penulis' => $penulis,
            'deskripsi' => $deskripsi
        ];
    }
    ?>

</body>
</html>
