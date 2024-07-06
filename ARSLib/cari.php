<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Perpustakaan</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #d3d3d3;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-left: none;
            background-color: #333;
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #444;
        }

        .results-summary {
            text-align: right;
            margin-bottom: 20px;
        }

        .results-summary p {
            margin: 0;
        }

        .results {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            width: calc(30% - 20px); /* 30% width with 20px margin */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            transition: transform 0.2s;
            margin-right: 20px; /* Margin between cards */
        }

        .card:last-child {
            margin-right: 0; /* Remove margin from the last card */
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 200px;
            background-color: #e0e0e0;
            margin-bottom: 10px;
        }

        .card h3 {
            font-size: 18px;
            margin: 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .card button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .card button.available {
            background-color: #000;
            color: white;
        }

        .card button.borrowed {
            background-color: #888;
            color: white;
        }
    </style>
</head>
<body>
    
<div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
        <input type="text" placeholder="Temukan...">
        <button type="submit" onclick="window.location.href = 'cari.php'">🔍</button>
        </div>
        <a href="homepage.php">Beranda</a>
        <a href="profil.php">Profil</a>
        <a href="logout.php">Keluar</a>
    </div>

    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Temukan...">
            <button type="submit" onclick="window.location.href = 'cari.php'">🔍</button>
        </div>
        <div class="results-summary">
            <p>Hasil: Ditemukan [Jumlah Buku] dari pencarian Anda melalui kata kunci: <strong>[Judul]</strong></p>
        </div>
        <div class="results">
            <div class="card" onclick="redirectToDescription('deskripsi.html')">
                <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
                <h3>Judul</h3>
                <p>Penulis1, Penulis2, Penulis3, Penulis4</p>
                <p>Status: Tersedia</p>
                <button class="available" onclick="event.stopPropagation(); toggleBorrow(this)">Pinjam</button>
            </div>
            <div class="card" onclick="redirectToDescription('deskripsi.html')">
                <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
                <h3>Judul</h3>
                <p>Penulis1, Penulis2, Penulis3, Penulis4</p>
                <p>Status: Tersedia</p>
                <button class="available" onclick="event.stopPropagation(); toggleBorrow(this)">Pinjam</button>
            </div>
            <div class="card" onclick="redirectToDescription('deskripsi.html')">
                <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
                <h3>Judul</h3>
                <p>Penulis1, Penulis2, Penulis3, Penulis4</p>
                <p>Status: Tersedia</p>
                <button class="available" onclick="event.stopPropagation(); toggleBorrow(this)">Pinjam</button>
            </div>
            <!-- Tambahkan kartu buku lain sesuai kebutuhan -->
        </div>
    </div>

    <script>
        function redirectToDescription(url) {
            window.location.href = url;
        }

        function toggleBorrow(button) {
            if (button.classList.contains('available')) {
                button.classList.remove('available');
                button.classList.add('borrowed');
                button.innerText = 'Kembalikan';
                button.previousElementSibling.innerText = 'Status: Terpinjam';
            } else {
                button.classList.remove('borrowed');
                button.classList.add('available');
                button.innerText = 'Pinjam';
                button.previousElementSibling.innerText = 'Status: Tersedia';
            }
        }
    </script>
</body>
</html>
