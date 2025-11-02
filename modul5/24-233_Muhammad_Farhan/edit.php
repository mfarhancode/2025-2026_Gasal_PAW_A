<?php
$conn = mysqli_connect("localhost", "root", "", "db_modul_5");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

// Get current data
$result = mysqli_query($conn, "SELECT * FROM data_supplier WHERE id=$id");
$data = mysqli_fetch_assoc($result);

// Update when form submitted
if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];

  $sql = "UPDATE data_supplier SET 
          nama='$nama', 
          telp='$telp', 
          alamat='$alamat' 
          WHERE id=$id";

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
    .update { background-color: orange; }
    .batal { background-color: red; margin-left: 5px; }
  </style>
</head>
<body>
  <h3>Edit Data Supplier</h3>
  <form method="post">
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>

    <label>Telp</label>
    <input type="text" name="telp" value="<?php echo $data['telp']; ?>" required>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required>

    <button type="submit" name="update" class="update">Update</button>
    <a href="index.php"><button type="button" class="batal">Batal</button></a>
  </form>
</body>
</html>
