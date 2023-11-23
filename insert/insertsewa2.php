<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $kodeNota = $_POST["kode"];
    $nik = $_POST["nik"];
    $tglKembali = $_POST["tanggal-kembali"];
    $tglsewa = $_POST["tanggal-sewa"];
    $totalsewa = $_POST["total-sewa"];

    // Query detail sewa
    $querySewa = "INSERT INTO sewa (id_Sewa, Tgl_sewa, Total_sewa, NIK) VALUES ('$kodeNota','$tglsewa','$totalsewa','$nik')";
    $queryDetailSewa = "INSERT INTO detail_sewa (id_Sewa, Tgl_Kembali, tanggal_pengembalian,  Denda, Keterangan) VALUES ('$kodeNota', '$tglKembali', NULL, '0', ' ')";
    // Eksekusi query detail sewa
    $resultSewa = mysqli_query($conn, $querySewa);
    $resultDetailSewa = mysqli_query($conn, $queryDetailSewa);

    if ($resultSewa && $resultDetailSewa) {
        // $_SESSION["insertdetailsewa"] = 'Data Berhasil Di Simpan';

        header("location: ../sewaUI2.php");
    } else {
        $_SESSION["erorinsertdetailsewa"] = 'Data Gagal';
        // Handle kesalahan jika query detail sewa gagal
        echo "Error: " . mysqli_error($conn);
    }
}
