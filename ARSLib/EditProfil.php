<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simpan data yang diedit ke sesi
    $_SESSION['profileData'] = [
        'picture' => $_FILES['picture']['name'],
        'fullname' => $_POST['fullname'],
        'username' => $_POST['username'],
        'libraryId' => $_POST['libraryId'],
        'nim' => $_POST['nim'],
        'class' => $_POST['class'],
        'programStudy' => $_POST['programStudy'],
        'faculty' => $_POST['faculty'],
        'university' => $_POST['university'],
        'birthdate' => $_POST['birthdate'],
        'address' => $_POST['address']
    ];

    // Simpan foto profil jika diupload
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/' . $_FILES['picture']['name']);
    }

    // Pesan sukses
    $_SESSION['message'] = 'Data berhasil tersimpan';

    header('Location: Profil.php');
    exit();
}


$profileData = $_SESSION['profileData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Anggota</title>
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

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"], 
        .form-group input[type="date"], 
        .form-group input[type="file"], 
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            cursor: pointer;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #444;
        }

        .form-group .profile-picture {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .form-group .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Profil Anggota</h1>
    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: green;"><?php echo $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <form id="edit-profile-form" method="POST" enctype="multipart/form-data">
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

<script>
    document.getElementById("picture").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById("preview-picture").src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

</body>
</html>
