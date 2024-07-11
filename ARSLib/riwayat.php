<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Buku</title>
    <link rel="stylesheet" href="riwayat.css">
</head>
<body>

<div class="container">
    <div class="profile-content">
        <h1>Riwayat Peminjaman Buku</h1>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Deskripsi</th>
            </tr>
            <?php
            // Periksa jika $_SESSION['borrowHistory'] adalah array sebelum melakukan foreach
            if (isset($_SESSION['borrowHistory']) && is_array($_SESSION['borrowHistory'])) {
                foreach ($_SESSION['borrowHistory'] as $borrow) {
                    echo "<tr>";
                    echo "<td>" . $borrow['judul'] . "</td>";
                    echo "<td>" . $borrow['tanggal'] . "</td>";
                    echo "<td>" . $borrow['status'] . "</td>";
                    echo "<td>" . $borrow['deskripsi'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Belum ada riwayat peminjaman.</td></tr>";
            }
            ?>
        </table>
        <div class="pagination">
            <button>&lt;</button>
            <button>&gt;</button>
        </div>
    </div>
</div>

</body>
</html>
