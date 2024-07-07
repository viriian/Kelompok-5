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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
        /* CSS untuk tampilan perpustakaan */
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
            width: 80%;
            margin: 20px auto;
        }

        .container h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-align: center;
        }

        .books-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin-top: 20px;
        }

        .book {
            width: 400px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .book img {
            width: 100px;
            height: auto;
            border-radius: 5px;
            margin-right: 20px;
        }

        .book-info {
            flex: 1;
        }

        .book h2 {
            font-size: 20px;
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
            margin-top: 10px;
        }

        .rating-form {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
        }

        .rating-form select {
            display: none; /* Hide the actual select element */
        }

        .rating-form .stars {
            display: flex;
            align-items: center;
        }

        .rating-form .stars label {
            font-size: 24px;
            color: #ddd; /* Grey color for empty star */
            cursor: pointer;
        }

        .rating-form .stars label:hover,
        .rating-form .stars label:hover ~ label,
        .rating-form .stars input:checked ~ label {
            color: gold; /* Gold color for filled star */
        }

        .rating-form .stars input {
            display: none; /* Hide radio inputs */
        }

        .rating-form textarea {
            padding: 5px;
            font-size: 14px;
            margin-top: 10px;
            resize: vertical;
        }

        .rating-form button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
        }

        .rating-form button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Perpustakaan</h1>
        <div class="books-container">
            <?php foreach ($_SESSION['books'] as $book): ?>
                <div class="book">
                    <div style="display: flex;">
                        <?php if ($book['gambar']): ?>
                            <img src="<?php echo $book['gambar']; ?>" alt="Book Cover">
                        <?php endif; ?>
                        <div class="book-info">
                            <h2><?php echo $book['judul']; ?></h2>
                            <p><strong>Penulis:</strong> <?php echo $book['penulis']; ?></p>
                            <p><?php echo $book['deskripsi']; ?></p>
                            <div class="book-actions">
                                <!-- Form untuk memberi rating -->
                                <form method="POST" action="perpustakaan.php" class="rating-form">
                                    <input type="hidden" name="id_buku" value="<?php echo $book['id']; ?>">
                                    <div class="stars">
                                        <input type="radio" id="star5_<?php echo $book['id']; ?>" name="rating" value="5"><label for="star5_<?php echo $book['id']; ?>">&#9733;</label>
                                        <input type="radio" id="star4_<?php echo $book['id']; ?>" name="rating" value="4"><label for="star4_<?php echo $book['id']; ?>">&#9733;</label>
                                        <input type="radio" id="star3_<?php echo $book['id']; ?>" name="rating" value="3"><label for="star3_<?php echo $book['id']; ?>">&#9733;</label>
                                        <input type="radio" id="star2_<?php echo $book['id']; ?>" name="rating" value="2"><label for="star2_<?php echo $book['id']; ?>">&#9733;</label>
                                        <input type="radio" id="star1_<?php echo $book['id']; ?>" name="rating" value="1"><label for="star1_<?php echo $book['id']; ?>">&#9733;</label>
                                    </div>
                                    <textarea name="review" placeholder="Tulis komentar Anda..." required></textarea>
                                    <button type="submit" name="action" value="rating">Berikan Rating</button>
                                </form>
                            </div>
                            <div>
                                <h3>Rating: <?php echo isset($book['rating']) ? $book['rating'] : 'Belum ada rating'; ?></h3>
                                <h3>Reviews:</h3>
                                <ul>
                                    <?php if (!empty($book['reviews'])): ?>
                                        <?php foreach ($book['reviews'] as $review): ?>
                                            <li>
                                                <strong><?php echo $review['nama']; ?>:</strong> <?php echo $review['komentar']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>Belum ada review untuk buku ini.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="book-actions">
                        <form method="POST" action="perpustakaan.php">
                            <input type="hidden" name="id_buku" value="<?php echo $book['id']; ?>">
                            <button type="submit" name="action" value="return">Kembalikan Buku</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
