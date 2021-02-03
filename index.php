<?php 
require 'functions.php'; 

$produk = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Produk</h1>

<a href="tambah.php">Tambah Data Produk</a>
<br><br>

<br>
<table border="1" cellpadding="10" cellspacing="0">
  <!-- th = agar menjadi bold dan ditengah kotak -->
  <tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Nama Produk</th>
    <th>Keterangan</th>
    <th>Harga</th>
    <th>Jumlah</th>
  </tr>

  <!-- foreach untuk melooping array  -->
  <?php $i = 1; ?>
  <?php foreach ($produk as $row) :?>
  <tr>
    <td><?= $i ?></td>
    <td>
      <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
      <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
    </td>
    <td><?= $row["nama_produk"]; ?></td>
    <td><?= $row["keterangan"]; ?></td>
    <td><?= $row["harga"]; ?></td>
    <td><?= $row["jumlah"]; ?></td>
  </tr>
  <?php $i ++ ?>
  <?php endforeach; ?>
  
 </table>

</body>
</html>