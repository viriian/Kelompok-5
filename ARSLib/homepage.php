<?php
session_start(); // Mulai session jika belum dimulai

// Contoh data buku (biasanya ini akan diambil dari database)
$books = [
    [
        'id' => 1,
        'title' => 'Title Book 1',
        'author' => 'Author Book 1',
        'description' => 'Description Book 1',
        'status' => 'available'
    ],
    [
        'id' => 2,
        'title' => 'Title Book 2',
        'author' => 'Author Book 2',
        'description' => 'Description Book 2',
        'status' => 'available'
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="search-container">
            <input type="text" id="sidebarSearchInput" placeholder="Search..">
            <button type="submit" onclick="searchBooksSidebar()">🔍</button>
            <a href="homepage.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="library.php">Library</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Library Homepage</h1>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search...">
            <button type="submit" onclick="searchBooks()">🔍</button>
        </div>
        <div class="results" id="results">
            <?php foreach ($books as $book): ?>
            <div class="card">
                <img src="book_cover_placeholder.png" alt="Book Cover">
                <h3><?php echo $book['title']; ?></h3>
                <p><?php echo $book['author']; ?></p>
                <p>Status: <?php echo ucfirst($book['status']); ?></p>
                <?php if ($book['status'] == 'available'): ?>
                <button class="available" onclick="redirectToBorrow('borrow.php?id=<?php echo $book['id']; ?>&title=<?php echo urlencode($book['title']); ?>&author=<?php echo urlencode($book['author']); ?>&description=<?php echo urlencode($book['description']); ?>')">Borrow</button>
                <?php else: ?>
                <button class="borrowed" disabled>Borrowed</button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <button class="openbtn" onclick="openNav()">☰</button>

    <script src="homepage.js"></script>

</body>
</html>
