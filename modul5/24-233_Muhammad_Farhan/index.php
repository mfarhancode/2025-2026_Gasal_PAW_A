<?php

$conn = mysqli_connect("localhost", "root", "", "db_modul_5");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM data_supplier";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    table { border-collapse: collapse; width: 70%; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    th { background-color: #ddd; }
    a { padding: 4px 8px; text-decoration: none; color: white; border-radius: 4px; }
    .edit { background: orange; }
    .hapus { background: red; }
    .tambah { background: green; color: white; padding: 6px 10px; text-decoration: none; }
  </style>
</head>
<body>
  <h3>Data Master Supplier</h3>
  <a href="tambah.php" class="tambah">Tambah Data</a>

  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Telp</th>
      <th>Alamat</th>
      <th>Tindakan</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['telp']."</td>
        <td>".$row['alamat']."</td>
        <td>
          <a href='edit.php?id=".$row['id']."' class='edit'>Edit</a>
            <a href='hapus.php?id=".$row['id']."' 
            class='hapus' 
            onclick=\"return confirm('Anda yakin akan menghapus supplier ini?');\">
            Hapus</a>
        </td>
      </tr>";
    }
    ?>
  </table>
</body>
</html>
