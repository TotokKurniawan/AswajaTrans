<?php
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama_pelanggan']; // Sesuaikan dengan nama field yang benar
    $notelp = $_POST['no_telp']; // Sesuaikan dengan nama field yang benar
    $alamat = $_POST['alamat']; // Sesuaikan dengan nama field yang benar
    
    $query = "UPDATE pelanggan SET NIK='$nik', Nama_Pelanggan='$nama', No_Telp='$notelp', Alamat='$alamat' WHERE NIK='$nik'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $_SESSION["editpelanggan"] = 'Data Berhasil Diubah';    
        header('Location: ../datapelangganUI.php');
    } else {
        $_SESSION["eroreditpelanggan"] = 'Data Gagal';    
        echo "Error: " . mysqli_error($conn);
    }
}
?>
