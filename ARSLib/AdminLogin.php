<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Verifikasi data admin dari database
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'your_username', 'your_password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            if ($remember) {
                setcookie('admin_id', $admin['id'], time() + (86400 * 30), "/");
                setcookie('admin_username', $admin['username'], time() + (86400 * 30), "/");
            }

            // Redirect ke halaman admin
            header('Location: AdminHomepage.php');
            exit();
        } else {
            echo "Username atau password salah!";
        }
    } catch (PDOException $e) {
        echo 'Koneksi gagal: ' . $e->getMessage();
    }
}
?>
