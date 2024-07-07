<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Perpustakaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            width: 80%;
            max-width: 800px;
            margin: auto;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .library-img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .description {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }
        .login-links {
            margin-top: 20px;
        }
        .login-links a {
            padding: 12px 24px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }
        .login-links a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Perpustakaan</h1>
        <img src="library.jpg" alt="Library" class="library-img">
        <div class="description">
            <p>Selamat datang di perpustakaan kami yang menyediakan berbagai koleksi buku terbaru dan terbaik untuk semua kalangan. Temukan pengetahuan dan cerita menarik dari koleksi kami yang luas.</p>
            <p>Nikmati kemudahan dalam mencari, meminjam, dan mengembalikan buku favorit Anda dengan fitur yang kami sediakan.</p>
        </div>
        <div class="login-links">
            <a href="Login.php">Masuk sebagai User/Anggota</a>
            <a href="AdminLogin.php">Masuk sebagai Admin</a>
        </div>
    </div>
</body>
</html>
