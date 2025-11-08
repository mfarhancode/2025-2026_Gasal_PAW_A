
<h2>Form Input Transaksi</h2>

<form method="post" action="save_transaksi.php">
  <h3>Data Nota (Master)</h3>
  Tanggal: <input type="date" name="tanggal"><br><br>
  Pelanggan: <input type="text" name="pelanggan"><br><br>

  <h3>Data Barang (Detail)</h3>
  <table border="1" cellpadding="5">
    <tr>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Jumlah</th>
    </tr>
    <tr>
      <td><input type="text" name="nama_barang[]"></td>
      <td><input type="number" name="harga[]"></td>
      <td><input type="number" name="jumlah[]"></td>
    </tr>
    <tr>
      <td><input type="text" name="nama_barang[]"></td>
      <td><input type="number" name="harga[]"></td>
      <td><input type="number" name="jumlah[]"></td>
    </tr>
  </table>
  <br>
  <input type="submit" value="Save Data">
</form>
