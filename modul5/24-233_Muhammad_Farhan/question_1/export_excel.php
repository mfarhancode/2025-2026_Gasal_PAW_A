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

$data = [];
$totalHarga = 0;
foreach ($result as $v) {
    $tanggal = date('d-M-y', strtotime($v['waktu_transaksi']));
    $data[] = [
        'tanggal' => $tanggal,
        'total'   => $v['total_harga']
    ];
    $totalHarga += $v['total_harga'];
}

header('Content-Type: application/vnd.ms-excel; charset=utf-8');
header('Content-Disposition: attachment; filename=rekap_penjualan.xls');
?>

<html>
<body>

<!-- TITLE -->
<h2 style="font-weight:bold;">
    Rekap Laporan Penjualan 
</h2>
<p>
    <?php if ($start && $end): ?>
        <?= $start ?> sampai <?= $end ?>
    <?php endif; ?>
</p>


<br><br>

<!-- TABLE -->
<table border="1" cellpadding="8" cellspacing="0" style="width:50%; text-align:center;">
    <tr style="font-weight:bold;">
        <th>No</th>
        <th>Total</th>
        <th>Tanggal</th>
    </tr>

    <?php $no = 1; foreach ($data as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br><br>

<!-- TOTAL SUMMARY -->
<table border="0" cellpadding="8" cellspacing="0" style="width:40%;">
    <tr style="font-weight:bold;">
        <td>Jumlah Pelanggan</td>
        <td>Jumlah Pendapatan</td>
    </tr>
    <tr>
        <td><?= count($data) ?> Orang</td>
        <td>Rp <?= number_format($totalHarga, 0, ',', '.') ?></td>
    </tr>
</table>

</body>
</html>
