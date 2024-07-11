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
    <link rel="stylesheet" href="profil.css">
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
