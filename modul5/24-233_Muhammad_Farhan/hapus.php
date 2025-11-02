<?php
$conn = mysqli_connect("localhost", "root", "", "db_modul_5");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];


$sql = "DELETE FROM data_supplier WHERE id=$id";
if (mysqli_query($conn, $sql)) {
  echo "<script>
          alert('Data berhasil dihapus!');
          window.location='index.php';
        </script>";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
?>
