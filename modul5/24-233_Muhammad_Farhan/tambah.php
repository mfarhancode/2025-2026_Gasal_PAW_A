<?php
$conn = mysqli_connect("localhost", "root", "", "db_modul_5");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// when form is submitted
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];

  $sql = "INSERT INTO data_supplier (nama, telp, alamat)
          VALUES ('$nama', '$telp', '$alamat')";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    form { width: 300px; margin-top: 20px; }
    label { display: block; margin-top: 10px; }
    input { width: 100%; padding: 5px; }
    button { margin-top: 15px; padding: 6px 10px; border: none; color: white; }
    .simpan { background-color: green; }
    .batal { background-color: red; margin-left: 5px; }
  </style>
</head>
<body>
  <h3>Tambah Data Master Supplier Baru</h3>
  <form method="post">
    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Telp</label>
    <input type="text" name="telp" required>

    <label>Alamat</label>
    <input type="text" name="alamat" required>

    <button type="submit" name="simpan" class="simpan">Simpan</button>
    <a href="index.php"><button type="button" class="batal">Batal</button></a>
  </form>
</body>
</html>
