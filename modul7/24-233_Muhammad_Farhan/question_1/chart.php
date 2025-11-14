<?php 
require "koneksi.php";

$start = $_GET['start'] ?? null;
$end   = $_GET['end'] ?? null;

if ($start && $end) {
    $query = "SELECT t.waktu_transaksi, SUM(td.harga) AS total_harga
              FROM transaksi t
              JOIN transaksi_detail td ON t.id = td.transaksi_id
              WHERE DATE(t.waktu_transaksi) BETWEEN '$start' AND '$end'
              GROUP BY transaksi_id";
} else {
    $query = "SELECT t.waktu_transaksi, SUM(td.harga) AS total_harga
              FROM transaksi t
              JOIN transaksi_detail td ON t.id = td.transaksi_id
              GROUP BY transaksi_id";
}

$execute = mysqli_query($conn, $query);
$result = mysqli_fetch_all($execute, MYSQLI_ASSOC);

$tanggal = [];
$total_harga = [];


foreach($result as $value){

    $formatTanggal = date('Y-m-d', strtotime($value['waktu_transaksi']));

    $tanggal[] = $formatTanggal;
    $total_harga[] = $value['total_harga'];


}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print{
            .no-print{
                display: none;
            }
        }
    </style>
</head>
<body>
    <form method="GET" class="no-print" style="margin-bottom: 20px;">
        <label>Start Date:</label>
        <input type="date" name="start" value="<?= $_GET['start'] ?? '' ?>" required>

        <label>End Date:</label>
        <input type="date" name="end" value="<?= $_GET['end'] ?? '' ?>" required>

        <button type="submit">Filter</button>
    </form>

    <canvas id="my_canvas"></canvas>
       
    <script>
const ctx = document.getElementById('my_canvas');

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal) ?>,
        datasets: [{
            label: 'Total',
            data: <?= json_encode($total_harga) ?>,
            backgroundColor: '#cfcdcdff',
            borderColor: 'black',
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            legend: { display: true }
        },
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