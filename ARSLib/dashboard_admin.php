<?php
session_start();

// Simulasi data perpustakaan
$totalBooks = 100;  // Total buku di perpustakaan
$borrowedBooks = 25;  // Buku yang sedang dipinjam
$availableBooks = $totalBooks - $borrowedBooks;  // Sisa buku yang tersedia
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="dashboard_admin.css">
</head>
<body>

<div class="container">
    <h1>Dashboard Admin</h1>

    <table>
        <tr>
            <th>Total Buku</th>
            <td><?php echo $totalBooks; ?></td>
        </tr>
        <tr>
            <th>Buku yang Dipinjam</th>
            <td><?php echo $borrowedBooks; ?></td>
        </tr>
        <tr>
            <th>Sisa Buku Tersedia</th>
            <td><?php echo $availableBooks; ?></td>
        </tr>
    </table>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <div class="button-container">
        <button onclick="window.location.href = 'perpustakaan.php';">Kelola Perpustakaan</button>
    </div>
</div>

<script>
    // Data untuk grafik
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Buku', 'Buku yang Dipinjam', 'Sisa Buku Tersedia'],
            datasets: [{
                label: 'Jumlah Buku',
                data: [<?php echo $totalBooks; ?>, <?php echo $borrowedBooks; ?>, <?php echo $availableBooks; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
