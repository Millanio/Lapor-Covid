<?php
  session_start();
  if (!isset($_SESSION['login'])) {
    header("location: login.php");
  }
  require "db_config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="lapor.php">Lapor Covid</a>
    <br>
    <a href="grafik.php">Lihat Grafik</a>
    <br>
    <a href="ekspor.php">Ekspor Data</a>
    <br>
    <a href="logout.php">logout</a>
    <br>
    <div>
      <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          datasets: [
            {
              label: 'Terinfeksi',
              data: [1, 2, 5, 10, 12, 1, 2, 5, 10, 12, 13, 14],
              backgroundColor: 'red',
              borderColor: 'red',
              borderWidth: 1
            },
            {
              label: 'Sembuh',
              data: [0, 5, 2, 9, 1, 1, 2, 5, 3, 2, 3, 1],
              backgroundColor: 'blue',
              borderColor: 'blue',
              borderWidth: 1
            },
          ]
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
