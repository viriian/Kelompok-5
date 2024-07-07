<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
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
            width: 800px;
        }

        .container h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container div {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 15px;
        }

        .form-container label {
            width: 20%;
            text-align: right;
            margin-right: 10px;
        }

        .form-container input, .form-container textarea {
            width: 75%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container textarea {
            resize: none;
        }

        .form-action {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
        }

        .form-action button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-action button:hover {
            background-color: #444;
        }

        .form-action button.delete {
            background-color: red;
        }

        .form-action button.delete:hover {
            background-color: darkred;
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
        <a href="AdminHomepage.php">Beranda</a>
        <a href="profil.php">Profil</a>
        <a href="logout.php">Keluar</a>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <div class="container">
        <h1>Admin Library</h1>
        <form action="manage_buku.php" method="post" enctype="multipart/form-data" class="form-container">
            <div>
                <label for="id_buku">ID Buku</label>
                <input type="text" id="id_buku" name="id_buku">
            </div>
            <div>
                <label for="judul">Judul Buku</label>
                <input type="text" id="judul" name="judul">
            </div>
            <div>
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis">
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <div>
                <label for="gambar">Upload Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
            </div>
            <div class="form-action">
                <button type="submit" name="action" value="upload">Upload Buku</button>
                <button type="submit" name="action" value="update">Update Buku</button>
                <button type="submit" name="action" value="delete" class="delete">Delete Buku</button>
            </div>
        </form>
    </div>

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
