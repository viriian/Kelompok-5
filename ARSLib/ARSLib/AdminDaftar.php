<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simpan data admin baru ke database
    // Misalnya menggunakan PDO untuk koneksi ke database

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO admins (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

        echo "Pendaftaran berhasil!";
        // Redirect ke halaman login
        header('Location: AdminLogin.php');
        exit();
    } catch (PDOException $e) {
        echo 'Koneksi gagal: ' . $e->getMessage();
    }
}
?>
