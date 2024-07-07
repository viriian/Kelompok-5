<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Page with Sidebar</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }

        .illustration {
            padding: 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f9f9f9;
        }

        .illustration img {
            max-width: 90%;
            height: auto;
            object-fit : contain;
            
        }

        .signup-form {
            padding: 50px;
            width: 300px;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
        }

        .signup-form .link {
            margin-top: 10px;
            text-align: center;
        }

        .signup-form .link a {
            color: #333;
            text-decoration: none;
        }

        .signup-form .link a:hover {
            text-decoration: underline;
        }

        .header {
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            border-right: 1px solid #ccc;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 22px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 36px;
        }

        .openbtn {
            font-size: 30px;
            cursor: pointer;
            /*background-color: #333;*/
            color: black;
            padding: 10px 15px;
            border: none;
            position: fixed;
            top: 20px;
            left: 20px;
        }

        .openbtn:hover {
            background-color: #444;
        }

        .search-container {
            padding: 10px 15px;
        }

        .search-container input {
            width: 80%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
            <input type="text" placeholder="Temukan...">
            <button type="submit">🔍</button>
        </div>
        <a href="login.php">Masuk</a>
        <a href="keluar.php">Keluar</a>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <div class="container">
        <div class="illustration">
            <img src="ARSLib Planning/2(1).png" alt="Illustration">
        </div>
        <div class="signup-form">
            <div class="header">Selamat Datang!</div>
            <h2>Sign Up</h2>
            <form action="login.php" method="POST">
            <input type="email" placeholder="Masukan email" required>
            <input type="text" placeholder="Masukan username" required>
            <input type="password" placeholder="Masukan Password" required>
            <button type="submit">Sign Up</button>
            <div class="link">
                Sudah punya akun? <a href="login.php">Login</a>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }
    </script>

</body>
</html>
