<?php
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id_pengeluaran'];
    $tanggal = $_POST['tgl_pengeluaran'];
    $nominal = $_POST['nominal'];
    $ket = $_POST['keterangan'];

    $query = "UPDATE pengeluaran SET Tgl_Pengeluaran='$tanggal', Keterangan='$ket', Nominal='$nominal' WHERE id_pengeluaran='$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["editpengeluaran"] = 'Data Berhasil Diubah';
        header('Location: ../datapengeluaranUI.php');
    } else {
        $_SESSION["eroreditdatapengeluaran"] = 'Data Berhasil Diubah';
        echo "Error: " . mysqli_error($conn);
    }
}
