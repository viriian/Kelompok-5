<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
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
        <h1>Perpustakaan</h1>
        <div class="book-details">
            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_buku = $_POST['id_buku'];
                $judul_buku = $_POST['judul_buku'];
                $_SESSION['peminjaman'][] = [
                    'id' => $id_buku,
                    'judul' => $judul_buku
                ];
            }
            ?>

            <h2>Buku yang Dipinjam</h2>
            <ul>
                <?php if (!empty($_SESSION['peminjaman'])): ?>
                    <?php foreach ($_SESSION['peminjaman'] as $peminjaman): ?>
                        <li>
                            <strong><?php echo $peminjaman['judul']; ?></strong>
                            <form method="POST" action="pengembalian.php" style="display:inline;">
                                <input type="hidden" name="id_buku" value="<?php echo $peminjaman['id']; ?>">
                                <button type="submit">Kembalikan Buku</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada buku yang dipinjam.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</body>
</html>
