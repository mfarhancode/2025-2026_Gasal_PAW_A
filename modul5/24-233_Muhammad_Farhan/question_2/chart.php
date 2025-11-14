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
$data = [];
$pelanggan = [];

foreach($result as $value){

    $formatTanggal = date('Y-m-d', strtotime($value['waktu_transaksi']));

    $tanggal[] = $formatTanggal;
    $total_harga[] = $value['total_harga'];

    $data[] = [
        'tanggal' => $formatTanggal,
        'total' => $value['total_harga']
    ];

    $pelanggan[] = $value['waktu_transaksi']; 
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
    <table border="1">
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; foreach($data as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
            <td><?= $row['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <table border="1">
        <tr>
            <th>Jumlah Pelanggan</th>
            <th>Jumlah Pendapatan</th>
        </tr>
        <tr>
            <td><?= count($data) ?> Orang</td>
            <td>Rp <?= number_format(array_sum($total_harga), 0, ',', '.') ?></td>
        </tr>
    </table>    
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