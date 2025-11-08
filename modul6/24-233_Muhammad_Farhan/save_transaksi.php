<?php
$conn = mysqli_connect("localhost", "root", "", "modul6");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$date = $_POST['tanggal'];
$customer = $_POST['pelanggan'];

$total = 0;
for ($i = 0; $i < count($_POST['nama_barang']); $i++) {
  $subtotal = $_POST['harga'][$i] * $_POST['jumlah'][$i];
  $total += $subtotal;
}

mysqli_query($conn, "INSERT INTO nota_penjualan (tanggal, pelanggan, total_harga)
                     VALUES ('$date', '$customer', '$total')");

$nota_id = mysqli_insert_id($conn);

for ($i = 0; $i < count($_POST['nama_barang']); $i++) {
  $name = $_POST['nama_barang'][$i];
  $price = $_POST['harga'][$i];
  $qty = $_POST['jumlah'][$i];
  $subtotal = $price * $qty;

  mysqli_query($conn, "INSERT INTO nota_item (nota_id, nama_barang, harga, jumlah, subtotal)
                       VALUES ('$nota_id', '$name', '$price', '$qty', '$subtotal')");
}

echo "Transaction saved successfully!";
echo "<a href='input_transaksi.php'>Back to form</a>";

mysqli_close($conn);
?>
