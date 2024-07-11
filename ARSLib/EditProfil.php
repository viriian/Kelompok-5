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
