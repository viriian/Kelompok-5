<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Buku</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
            width: 900px;
            display: flex;
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

        .profile-sidebar {
            width: 250px;
            text-align: center;
            padding: 20px;
            border-right: 1px solid #ccc;
        }

        .profile-sidebar img {
            width: 100%;
            border-radius: 5%;
        }

        .profile-sidebar h2 {
            margin: 15px 0;
        }

        .profile-sidebar button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        .profile-sidebar button:hover {
            background-color: #444;
        }

        .profile-content {
            flex-grow: 1;
            padding: 20px;
        }

        .profile-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .tabs button {
            padding: 10px 20px;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 16px;
        }

        .tabs button.active {
            border-bottom: 3px solid black;
            font-weight: bold;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: white;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #f1f1f1;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .button-group button {
            width: 80%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
            <input type="text" placeholder="Temukan...">
            <button type="submit">🔍</button>
        </div>
        <a href="homepage.php">Beranda</a>
        <a href="profil.php">Profil</a>
        <a href="logout.php">Keluar</a>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <div class="container">
        <div class="profile-sidebar">
            <img src="sampul_buku_placeholder.png" alt="Sampul Buku">
            <h2>Nama Buku</h2>
            <p id="loan-status">Status Peminjaman: Tersedia</p>
            <div class="button-group">
                <button id="toggleBorrowButton" onclick="toggleBorrow()">Pinjam</button>
                <button onclick="window.location.href='data_peminjam.html'">Data Buku</button>
            </div>
        </div>
        <div class="profile-content">
            <h1>Judul</h1>
            <p>Penulis1, Penulis2, Penulis3, Penulis4, Penulis5</p>
            <div class="tabs">
                <button class="tab-link active" onclick="openTab(event, 'Riwayat')">Riwayat</button>
            </div>
            <div id="sekarang" class="tab-content active">
                <table>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Deskripsi</td>
                    </tr>
                    <!-- Tambahkan baris sesuai kebutuhan -->
                </table>
            </div>
            <div class="pagination">
                <button>&lt;</button>
                <button>&gt;</button>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Tampilkan tab "Sekarang" secara default
        document.getElementById("sekarang").style.display = "block";

        // Function to toggle borrow/return button text and status
        function toggleBorrow() {
            var button = document.getElementById("toggleBorrowButton");
            var loanStatus = document.getElementById("loan-status");
            if (button.innerText === "Pinjam") {
                button.innerText = "Kembalikan";
                loanStatus.innerText = "Status Peminjaman: Terpinjam";
            } else {
                button.innerText = "Pinjam";
                loanStatus.innerText = "Status Peminjaman: Tersedia";
            }
        }
    </script>

</body>
</html>
```

