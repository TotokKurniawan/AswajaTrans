<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $nopol = $_POST["nopol"];
    $merk = $_POST["merk"];
    $type = $_POST["type"];
    $harga = $_POST["harga"];
    $status = $_POST['St'];

    // Perbaikan query SQL, menghapus koma ekstra setelah '$status'
    $query = "INSERT INTO mobil(Nopol, MerkMobil, TypeMobil, harga, Status) VALUES('$nopol', '$merk', '$type', '$harga', '$status')";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        $_SESSION["insertdatamobil"] = 'Data Berhasil Di Simpan';    
        
        header("location: ../datamobilUI.php");
    } else {
        $_SESSION["erorinsertdatamobil"] = 'Data Gagal';    
        // Jika query gagal, Anda dapat menampilkan pesan kesalahan
        echo "Error: " . mysqli_error($conn);
    }
}
?>
