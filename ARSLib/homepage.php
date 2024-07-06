<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Homepage</title>
    <style>
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
            width: 600px;
        }

        .container h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 40px;
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

        .header {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .search-container {
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .search-container input {
            width: 60%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background-color: #444;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container div {
            margin-bottom: 15px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Sidebar styles */
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

    <button class="openbtn" onclick="openNav()">☰</button>
    </head>
<body>

    <div class="container">
        <h1>Cari Buku</h1>
        <div class="form-container">
            <div>
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul">
            </div>
            <div>
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis">
            </div>
            <div>
                <label for="subjek">Subjek</label>
                <input type="text" id="subjek" name="subjek">
            </div>
            <div>
                <label for="program_studi">Program Studi</label>
                <input type="text" id="program_studi" name="program_studi">
            </div>
            <input type="text" placeholder="Temukan...">
            <button type="submit" onclick="window.location.href = 'cari.php'">🔍</button>
        </div>
    </div>

    <script>
        function redirectToSearchResults() {
            const judul = document.getElementById('judul').value;
            const penulis = document.getElementById('penulis').value;
            const subjek = document.getElementById('subjek').value;
            const programStudi = document.getElementById('program_studi').value;

            // Simpan data input ke dalam URL
            const searchParams = new URLSearchParams({
                judul,
                penulis,
                subjek,
                programStudi
            });

            // Redirect ke halaman hasil pencarian dengan parameter
            window.location.href = `hasil_pencarian.html?${searchParams.toString()}`;
        }
    </script>
</body>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }
    </script>

</body>
</html>
