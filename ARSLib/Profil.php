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

        .profile-sidebar button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        .profile-sidebar button:hover {
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
            <p><span>Nama Kampus:</span> <?php echo $profileData['university']; ?></p>
            <p><span>Tanggal Lahir:</span> <?php echo $profileData['birthdate']; ?></p>
            <p><span>Alamat:</span> <?php echo $profileData['address']; ?></p>
        </div>
        <button onclick="showEditProfile()">Edit Profil</button>
    </div>
    <div class="profile-content">
        <h2>Riwayat Baca Buku</h2>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <td>Judul Buku 1</td>
                <td>01-01-2024</td>
                <td>Selesai</td>
                <td>Deskripsi buku 1</td>
            </tr>
            <tr>
                <td>Judul Buku 2</td>
                <td>05-01-2024</td>
                <td>Belum Selesai</td>
                <td>Deskripsi buku 2</td>
            </tr>
            <!-- Tambahkan baris sesuai kebutuhan -->
        </table>
        <div class="pagination">
            <button>&lt;</button>
            <button>&gt;</button>
        </div>
    </div>
</div>

<script>
    function showEditProfile() {
        const editProfileForm = `
            <div class="container">
                <h1>Edit Profil Anggota</h1>
                <form id="edit-profile-form" method="POST" enctype="multipart/form-data" action="edit_profile.php">
                    <div class="form-group profile-picture">
                        <img id="preview-picture" src="<?php echo $profileData['picture']; ?>" alt="Foto Profil">
                    </div>
                    <div class="form-group">
                        <label for="picture">Foto Profil</label>
                        <input type="file" id="picture" name="picture" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" id="fullname" name="fullname" value="<?php echo $profileData['fullname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $profileData['username']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="libraryId">Nomor Anggota Perpustakaan</label>
                        <input type="text" id="libraryId" name="libraryId" value="<?php echo $profileData['libraryId']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim" value="<?php echo $profileData['nim']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="class">Kelas</label>
                        <input type="text" id="class" name="class" value="<?php echo $profileData['class']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="programStudy">Program Studi</label>
                        <input type="text" id="programStudy" name="programStudy" value="<?php echo $profileData['programStudy']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="faculty">Fakultas</label>
                        <input type="text" id="faculty" name="faculty" value="<?php echo $profileData['faculty']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="university">Nama Kampus</label>
                        <input type="text" id="university" name="university" value="<?php echo $profileData['university']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Tanggal Lahir</label>
                        <input type="date" id="birthdate" name="birthdate" value="<?php echo $profileData['birthdate']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address"><?php echo $profileData['address']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        `;
        document.body.innerHTML = editProfileForm;

        document.getElementById("picture").addEventListener("change", function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById("preview-picture").src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    }
</script>

</body>
</html>
