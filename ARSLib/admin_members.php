<?php
session_start();

// Periksa apakah user adalah admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit;
}

// Baca data anggota dari file JSON
$file = 'members.json';
$members = [];
if (file_exists($file)) {
    $members = json_decode(file_get_contents($file), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <link rel="stylesheet" href="admin_members.css">
</head>
<body>

    <div class="container">
        <h1>Daftar Anggota</h1>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo htmlspecialchars($member['nama_lengkap']); ?></td>
                <td><?php echo htmlspecialchars($member['nim']); ?></td>
                <td><?php echo htmlspecialchars($member['email']); ?></td>
                <td><?php echo htmlspecialchars($member['username']); ?></td>
                <td>
                    <button class="action-btn edit-btn">Edit</button>
                    <button class="action-btn delete-btn">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
</html>
