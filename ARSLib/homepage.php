<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Homepage</title>
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

        .search-bar input[type="text"] {
            width: calc(100% - 40px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 10px 20px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-bar button:hover {
            background-color: #444;
        }

        .card {
            width: calc(30% - 20px);
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            transition: transform 0.2s;
            margin-right: 20px;
        }

        .card:last-child {
            margin-right: 0;
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

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            border-right: 1px solid #ccc;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 22px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            position: fixed;
            top: 20px;
            left: 20px;
        }

        .openbtn:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
            <input type="text" placeholder="Temukan...">
            <button type="submit" onclick="window.location.href = 'cari.php'">🔍</button>
        </div>
        <a href="homepage.php">Beranda</a>
        <a href="profil.php">Profil</a>
        <a href="perpustakaan.php">Perpustakaan</a>
        <a href="logout.php">Keluar</a>
    </div>

    <div class="container">
        <h1>Library Homepage</h1>
        <div class="search-bar">
            <input type="text" placeholder="Temukan...">
            <button type="submit" onclick="window.location.href = 'cari.php'">🔍</button>
        </div>
        <div class="results">
            <!-- Example book cards -->
            <div class="card">
                <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
                <h3>Judul Buku 1</h3>
                <p>Penulis Buku 1</p>
                <p>Status: Tersedia</p>
                <button class="available" onclick="redirectToPeminjaman('peminjaman.php?id=1&judul=Judul Buku 1&penulis=Penulis Buku 1&deskripsi=Deskripsi Buku 1')">Pinjam</button>
            </div>
            <div class="card">
                <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
                <h3>Judul Buku 2</h3>
                <p>Penulis Buku 2</p>
                <p>Status: Tersedia</p>
                <button class="available" onclick="redirectToPeminjaman('peminjaman.php?id=2&judul=Judul Buku 2&penulis=Penulis Buku 2&deskripsi=Deskripsi Buku 2')">Pinjam</button>
            </div>
        </div>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }

        function redirectToPeminjaman(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
