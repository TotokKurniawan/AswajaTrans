<?php 
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tanggalpengembalian = $_POST['tglpengembalian'];
    $denda = $_POST['denda'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE detail_sewa SET tanggal_pengembalian='$tanggalpengembalian', Denda='$denda', Keterangan='$keterangan' WHERE id_Sewa='$id'";

    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $_SESSION["editdatetailsewa"] = 'Data Berhasil Diubah';    
        header('Location: ../datadetailsewaUI.php');
    } else {
        $_SESSION["eroreditdetailsewa"] = 'Data Gagal';    
        echo "Error: " . mysqli_error($conn);
    }
}
?>
