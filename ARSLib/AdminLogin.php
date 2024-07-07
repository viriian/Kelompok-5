<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page with Sidebar</title>
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
            display: flex;
        }

        .illustration {
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f9f9f9;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
        }

        .login-form {
            padding: 30px;
            width: 300px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form input[type="checkbox"] {
            width: auto;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #444;
        }

        .login-form .link {
            margin-top: 10px;
            text-align: center;
        }

        .login-form .link a {
            color: #333;
            text-decoration: none;
        }

        .login-form .link a:hover {
            text-decoration: underline;
        }

        .header {
            font-weight: bold;
            margin-bottom: 20px;
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

        .search-container {
            padding: 10px 15px;
        }

        .search-container input {
            width: 80%;
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
    </style>
</head>
<body>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
            <input type="text" placeholder="Temukan...">
            <button type="submit">🔍</button>
        </div>
        <a href="AdminLogin.php">Masuk</a>
        <a href="AdminDaftar.php">Daftar</a>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <div class="container">
        <div class="illustration">
            <img src="path_to_your_image.png" alt="Illustration">
        </div>
        <div class="login-form">
            <div class="header">Selamat Datang, Admin!</div>
            <h2>Masuk</h2>
            <input type="text" placeholder="Masukan Username" required>
            <input type="password" placeholder="Masukan Password" required>
            <div>
                <input type="checkbox" id="remember">
                <label for="remember">Ingat saya</label>
                <a href="#" style="float: right;">Lupa Password?</a>
            </div>
            <button type="submit">Login</button>
            <div class="link">
                Belum punya Akun? <a href="AdminDaftar.php">Daftar</a>
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
    </script>

</body>
</html>