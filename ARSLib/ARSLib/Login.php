<?php
session_start();

// Dummy data, karena ini hanya contoh.
$valid_username = "user";
$valid_password = "password";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header('Location: homepage.php'); // Ganti dengan halaman yang sesuai setelah login berhasil
        exit();
    } else {
        $error_message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>

<div class="container">
    <div class="header">Selamat Datang!</div>
    <h2>Login</h2>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="Login.php" method="POST" class="login-form">
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <div>
            <input type="checkbox" id="remember">
            <label for="remember">Ingat saya</label>
            <a href="#" style="float: right;margin : 10px;">Lupa Password?</a>
        </div>
        <button type="submit">Login</button>
        <div class="link">
            Belum punya Akun? <a href="Daftar.php">Sign Up</a>
        </div>
    </form>
</div>

</body>
</html>
