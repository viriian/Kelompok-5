#admin
<?php
session_start();

// Cek apakah user sudah login sebagai admin (disesuaikan dengan mekanisme login yang Anda miliki)
// Contoh sederhana, sesuaikan dengan kebutuhan aplikasi Anda
$adminLoggedIn = true; // Ganti dengan logika autentikasi admin yang sesuai

if (!$adminLoggedIn) {
    // Jika tidak login sebagai admin, redirect atau tampilkan pesan sesuai kebijakan Anda
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Library</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            max-width: 90%; /* Lebar maksimum konten */
            width: 1200px; /* Lebar konten */
            margin: 20px;
        }

        .container h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
        }

        .books-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .book {
            display: flex;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .book img {
            width: 200px;
            height: auto;
            border-radius: 10px 0 0 10px;
        }

        .book-info {
            flex: 1;
            padding: 20px;
        }

        .book h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .book p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .book-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-top: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 0 0 10px 10px;
        }

        .book-actions form {
            display: inline;
        }

        .book-actions button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .book-actions button:hover {
            background-color: #444;
        }

        .book-actions button.delete {
            background-color: red;
        }

        .book-actions button.delete:hover {
            background-color: darkred;
        }

        @media (max-width: 1024px) {
            .container {
                max-width: 95%;
            }

            .books-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .book {
                flex-direction: column;
            }

            .book img {
                border-radius: 10px 10px 0 0;
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Admin Library</h1>
        <div class="books-container">
            <?php foreach ($books as $book): ?>
                <div class="book">
                    <?php if ($book['gambar']): ?>
                        <img src="<?php echo $book['gambar']; ?>" alt="Book Cover">
                    <?php endif; ?>
                    <div class="book-info">
                        <h2><?php echo $book['judul']; ?></h2>
                        <p><strong>ID Buku:</strong> <?php echo $book['id']; ?></p>
                        <p><strong>Penulis:</strong> <?php echo $book['penulis']; ?></p>
                        <p><?php echo $book['deskripsi']; ?></p>
                    </div>
                    <div class="book-actions">
                        <form method="POST" action="AdminHomepage.php" style="display:inline;">
                            <input type="hidden" name="id_buku" value="<?php echo $book['id']; ?>">
                            <button type="submit">Edit</button>
                        </form>
                        <form method="POST" action="AdminLibrary.php" style="display:inline;">
                            <input type="hidden" name="id_buku" value="<?php echo $book['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="delete">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
