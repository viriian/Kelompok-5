<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign-Up Page</title>
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

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
        }

        .signup-form button:hover {
            background-color: #444;
        }

        .signup-form .link {
            margin-top: 10px;
            text-align: center;
        }

        .signup-form .link a {
            color: #333;
            text-decoration: none;
        }

        .signup-form .link a:hover {
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
    <div class="header">Daftar Admin Baru</div>
    <h2>Daftar</h2>
    <form action="AdminLogin.php" method="POST" class="signup-form">
        <input type="text" placeholder="Masukan Username" required>
        <input type="email" placeholder="Masukan Email" required>
        <input type="password" placeholder="Masukan Password" required>
        <button type="submit">Daftar</button>
        <div class="link">
            Sudah punya akun? <a href="AdminLogin.php">Masuk</a>
        </div>
    </form>
</div>

</body>
</html>
