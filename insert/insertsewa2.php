<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $kodeNota = $_POST["kode"];
    $nik = $_POST["nik"];
    $tglsewa = $_POST["tanggal-sewa"];

    // Set the session variable for "bayar"
    $_SESSION["bayar"] = $_POST['bayar'];

    $querySewa = "INSERT INTO sewa (id_Sewa, Tgl_sewa, bayar,  NIK) VALUES ('$kodeNota','$tglsewa','$_SESSION[bayar]','$nik')";

    $resultSewa = mysqli_query($conn, $querySewa);

    if ($resultSewa) {
        header("location: ../sewaUI2.php");
    } else {
        $_SESSION["erorinsertdetailsewa"] = 'Data Gagal';
        echo "Error: " . mysqli_error($conn);
    }
}
