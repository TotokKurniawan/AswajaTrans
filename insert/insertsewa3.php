<?php
require "../koneksi.php";
session_start();


if (!empty($_POST)) {
    $id = $_POST["id"];
    $nopol = $_POST["nopol"];
    $subtotal = $_POST["subtotal"];
    $lamapinjam = $_POST["lamapinjam"];
    $bayar = $_POST["bayar"];
    $statusbayar = $_POST["stbyar"];
    $totalharga = $_POST["tothar"];
    $sisa = $_POST['sisa'];

    $querySewa = "UPDATE sewa SET bayar='$bayar', `Sisa yang harus dibayar`='$sisa', StatusBayar='$statusbayar', Total_Harga='$totalharga' WHERE id_Sewa='$id'";
    $queryDetailSewa = "UPDATE detail_sewa SET Nopol='$nopol', Lama_Pinjam ='$lamapinjam', subtotal='$subtotal' WHERE id_Sewa='$id'";

    $resultSewa = mysqli_query($conn, $querySewa);
    $resultDetailSewa = mysqli_query($conn, $queryDetailSewa);

    if ($resultSewa && $resultDetailSewa) {
        $_SESSION["insertsewa"] = 'Data Berhasil Di Simpan';

        header("location: ../sewaUI.php");
        exit();
    } else {
        $_SESSION["erorinsertdetailsewa"] = 'Data Gagal';
        echo "Error: " . mysqli_error($conn);
    }
}
