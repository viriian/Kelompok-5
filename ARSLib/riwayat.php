<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Buku</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
            width: 900px;
            display: flex;
        }

        .profile-content {
            flex-grow: 1;
            padding: 20px;
        }

        .profile-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: white;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-content">
        <h1>Riwayat Peminjaman Buku</h1>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal</th>
                <th>Status</th><?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Buku</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
            width: 900px;
            display: flex;
        }

        .profile-content {
            flex-grow: 1;
            padding: 20px;
        }

        .profile-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: white;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #f1f1f1;
        }
    </style>
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
