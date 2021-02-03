<?php

// hubungkan ke file function 
require 'functions.php';

$id = $_GET["id"];
$prod = query("SELECT * FROM produk WHERE id = $id")[0];
if( isset($_POST["submit"]) ){
    if ( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>    
        ";
    } else {
        echo  "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>    
    ";}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Produk</title>
</head>
<body>
    <h1>Ubah Data Produk</h1>
    <!-- endtype="multipart/form-data" // supaya filenya bisa dikelola -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- input yang ga kelihatan oleh user (type = hidden) -->
        <input type="hidden" name="id" value="<?= $prod["id"];?>">
        <ul>
            <li>
                <label for="nama_produk">Nama Produk :</label>
                <input type="text" name="nama_produk" id="nama_produk" required value="<?= $prod["nama_produk"]; ?>">
                <!--  required = kalo kosong form ga bisa di submit 
                        value = saat di klik akan ada namanya
                --> 
            </li>
            <li>
                <label for="keterangan">Keterangan :</label>
                <input type="text" name="keterangan" id="keterangan" required value="<?= $prod["keterangan"]; ?>">
            </li>
            <li>
                <label for="harga">Harga :</label>
                <input type="text" name="harga" id="harga" required value="<?= $prod["harga"]; ?>">
            </li>
            <li>
                <label for="jumlah">Jumlah :</label>
                <input type="text" name="jumlah" id="jumlah" required value="<?= $prod["jumlah"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>



</body>
</html>