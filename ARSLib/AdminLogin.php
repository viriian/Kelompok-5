#Admin
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
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
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
        }

        .container h2 {
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
    </style>
</head>
<body>

<div class="container">
    <div class="header">Selamat Datang, Admin!</div>
    <h2>Masuk</h2>
    <form action="AdminHomepage.php" method="POST" class="login-form">
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
    </form>
</div>

</body>
</html>
