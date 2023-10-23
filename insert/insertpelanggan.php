<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $nik = $_POST["nik"];
    $nama = $_POST["namapelanggan"];
    $alamat = $_POST["alamat"];
    $no = $_POST["notelpon"];

    // Perbaikan query SQL, menghapus koma ekstra setelah '$status'
    $query = "INSERT INTO pelanggan(NIK, Nama_Pelanggan, No_Telp, Alamat) VALUES('$nik', '$nama', '$no', '$alamat')";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        $_SESSION["insertdatapelanggan"] = 'Data Berhasil Di Simpan';    
        
        header("location: ../datapelangganUI.php");
    } else {
        $_SESSION["erorinsertdatapelanggan"] = 'Data Gagal';    
        // Jika query gagal, Anda dapat menampilkan pesan kesalahan
        echo "Error: " . mysqli_error($conn);
    }
}
?>
