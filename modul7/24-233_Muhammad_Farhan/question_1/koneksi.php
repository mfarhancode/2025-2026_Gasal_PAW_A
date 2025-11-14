<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "modul6";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if($conn){
    // echo "koneksi berhasil<br>";

} else{
    echo "error: ". mysqli_connect_error();
}
?>