<?php
require_once "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $kodeNota = $_POST["kodestruk"];
    $nik = $_POST["nik"];
    $tanggalsewa = $_POST["tanggalsewa"];
    $bayar = $_POST["bayar"];
    $sis_byr = $_POST["sisa"];
    $statusBayar = $_POST["stbyar"];
    $totalHarga = $_POST["tothar"];
    $totalSewa = $_POST["totsewa"];

    // Perbaikan query SQL
    $querySewa = "INSERT INTO sewa (id_Sewa, Tgl_sewa, Bayar, `Sisa yang harus dibayar`, StatusBayar, Total_Harga, Total_Sewa, NIK) VALUES ('$kodeNota', '$tanggalsewa', '$bayar', '$sis_byr', '$statusBayar', '$totalHarga', '$totalSewa', '$nik')";

    // Eksekusi query sewa
    $resultSewa = mysqli_query($conn, $querySewa);

    if ($resultSewa) {
        $_SESSION["insertsewa"] = 'Data Berhasil Di Simpan';    
        
        // Data berhasil disimpan
        
        header("location: ../sewaUI.php");
    } else {
        $_SESSION["erorinsertsewa"] = 'Data Gagal';    
        // Handle kesalahan jika query sewa gagal
        echo "Error: " . mysqli_error($conn);
    }
}
?>
