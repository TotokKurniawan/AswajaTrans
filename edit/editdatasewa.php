<?php 
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $byr = $_POST['bayar'];
    $sisbyr = $_POST['sisa'];
    $status = $_POST['stbyr'];

    $query = "UPDATE sewa SET bayar='$byr', `Sisa yang harus dibayar`='$sisbyr', StatusBayar='$status' WHERE id_Sewa='$id'";

    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $_SESSION["editdatasewa"] = 'Data Berhasil Diubah';    
        header('Location: ../datasewaUI.php');
    } else {
        $_SESSION["eroreditdatasewa"] = 'Data Gagal';    
        echo "Error: " . mysqli_error($conn);
    }
}
?>
