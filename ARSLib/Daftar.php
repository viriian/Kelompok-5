<?php
// Include database connection file
include('db_connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert user data into database
    $sql = "INSERT INTO users (nama_lengkap, nim, email, username, password) VALUES ('$nama_lengkap', '$nim', '$email', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        // Redirect to login page
        header("Location: Login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
