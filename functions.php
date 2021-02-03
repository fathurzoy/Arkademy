<?php



// koneksi ke database
// mysqli_connect(hostname/server, usernya, passwordnya, database)
$conn = mysqli_connect("localhost", "root", "", "arkademy");
// simpan ke variabel $conn 

// variabel yang ada di function beda dengan yang di luar 
// supaya sama pakai = global $conn;

// ambil data dari tabel produk / query data produk
// mysqli_query(koneksinya/variabelnya, querynya mau apa("SELECT * FROM produk"))
// query untuk menapilkan data dari table
function query($query){ // akan menerima parameter string query
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; // siapan wadah, kotak kosong
    while ( $row = mysqli_fetch_assoc($result) ) { // yang diambil ke lemarinya
        $rows[]= $row; // ambil baju simpen sebelahnya
    }
    return $rows;
}

function tambah($data){
     // ambil data dari tiap elemen dalam form
     global $conn;
    //  htmlspecialchars() = agar diolah oleh functionnya / akan cuma text
     $nama_produk = htmlspecialchars($data["nama_produk"]);
     $keterangan = htmlspecialchars($data["keterangan"]);
     $harga = htmlspecialchars($data["harga"]);
     $jumlah = htmlspecialchars($data["jumlah"]);


     // query insert data
    $query = "INSERT INTO produk 
        VALUES
        ('', '$nama_produk', '$keterangan', '$harga', '$jumlah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($conn);
}



// update / ubah data
function ubah($data){
    // ambil data dari tiap elemen dalam form
     global $conn;
    //  htmlspecialchars() = agar diolah oleh functionnya / akan cuma text
     $id = $data["id"];
     $nama_produk = htmlspecialchars($data["nama_produk"]);
     $keterangan = htmlspecialchars($data["keterangan"]);
     $harga = htmlspecialchars($data["harga"]);
     $jumlah = htmlspecialchars($data["jumlah"]);

     

     // query insert data
    $query = "UPDATE produk SET
                nama_produk = '$nama_produk',
                keterangan = '$keterangan',
                harga = '$harga',
                jumlah = '$jumlah'
            WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>