<?php 
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $nopol = $_POST['nopol'];
    $merk = $_POST['merk'];
    $type = $_POST['type'];
    $harga = $_POST['harga'];
    $status = $_POST['st']; // Menggunakan variabel $status yang benar

    $query = "UPDATE mobil SET  MerkMobil='$merk', TypeMobil='$type', harga='$harga', Status='$status' WHERE Nopol='$nopol'";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $_SESSION["editdatamobil"] = 'Data Berhasil Diubah';    
        header('Location: ../datamobilUI.php');
    } else {
        $_SESSION["eroreditdatamobil"] = 'Data Gagal';    
        echo "Error: " . mysqli_error($conn);
    }
}
?>
