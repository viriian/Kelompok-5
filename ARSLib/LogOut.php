<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            text-align: center;
        }

        .container h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 40px;
        }

        .container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #444;
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
            font-size: 20px;
            cursor: pointer;
            background-color: #333;
            color: white;
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

    <button class="openbtn" onclick="openNav()">☰</button>

    <div class="container">
        <h1>Keluar</h1>
        <p>Terima kasih telah menggunakan laman kami</p>
        <button onclick="window.location.href='login.php'">Kembali</button>
        <p>Sampai jumpa lagi!</p>
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
