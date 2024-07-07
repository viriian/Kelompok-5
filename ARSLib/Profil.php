<?php
session_start();

// Jika data belum ada di sesi, buat data default
if (!isset($_SESSION['profileData'])) {
    $_SESSION['profileData'] = [
        'picture' => 'profile_picture_placeholder.png',
        'fullname' => 'Nama Lengkap',
        'username' => 'username_auto_increment',
        'libraryId' => 'P12345',
        'nim' => '1234567890',
        'class' => 'A1',
        'programStudy' => 'Teknik Informatika',
        'faculty' => 'Fakultas Teknik',
        'university' => 'Universitas Contoh',
        'birthdate' => '2000-01-01',
        'address' => 'Jl. Contoh No. 123'
    ];
}

$profileData = $_SESSION['profileData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Anggota</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            overflow-y: auto;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 600px;
            margin: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header h1 {
            font-size: 28px;
            margin: 0;
        }

        .profile-sidebar {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-sidebar img {
            display: block;
            margin: 0 auto 10px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .profile-sidebar .profile-info {
            margin-bottom: 10px;
            text-align: left;
        }

        .profile-sidebar .profile-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .profile-sidebar .profile-info span {
            font-weight: bold;
        }

        .profile-sidebar .profile-buttons {
            margin-top: 20px;
        }

        .profile-sidebar .profile-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
            margin-right: 10px;
        }

        .profile-sidebar .profile-buttons button:hover {
            background-color: #444;
        }

        .profile-content {
            width: 100%;
        }

        .profile-content h2 {
            font-size: 22px;
            margin-bottom: 10px;
            text-align: center;
        }

        .profile-content .button-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-content .button-wrapper a {
            text-decoration: none;
        }

        .profile-content .button-wrapper button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        .profile-content .button-wrapper button:hover {
            background-color: #444;
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
            justify-content: center;
            margin-top: 20px;
        }

        .pagination button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: white;
            cursor: pointer;
            margin: 0 5px;
        }

        .pagination button:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-header">
        <h1>PROFILE ANGGOTA</h1>
    </div>
    <div class="profile-sidebar">
        <img id="profile-picture" src="<?php echo $profileData['picture']; ?>" alt="Foto Profil">
        <div class="profile-info">
            <p><span>Nama Lengkap:</span> <?php echo $profileData['fullname']; ?></p>
            <p><span>Username:</span> <?php echo $profileData['username']; ?></p>
            <p><span>Nomor Anggota Perpustakaan:</span> <?php echo $profileData['libraryId']; ?></p>
            <p><span>NIM:</span> <?php echo $profileData['nim']; ?></p>
            <p><span>Kelas:</span> <?php echo $profileData['class']; ?></p>
            <p><span>Program Studi:</span> <?php echo $profileData['programStudy']; ?></p>
            <p><span>Fakultas:</span> <?php echo $profileData['faculty']; ?></p>
            <p><span>Universitas:</span> <?php echo $profileData['university']; ?></p>
            <p><span>Tanggal Lahir:</span> <?php echo $profileData['birthdate']; ?></p>
            <p><span>Alamat:</span> <?php echo $profileData['address']; ?></p>
        </div>
        <div class="profile-buttons">
            <a href="EditProfil.php"><button>Edit Profil</button></a>
            <a href="riwayat.php"><button>Riwayat Peminjaman Buku</button></a>
        </div>
    </div>
</div>

</body>
</html>
