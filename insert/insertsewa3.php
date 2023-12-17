<?php
require "../koneksi.php";
session_start();


if (!empty($_POST)) {
    $id = $_POST["id"];
    $nopol = $_POST["nopol"];
    $lamapinjam = $_POST["lamapinjam"];
    $bayar = $_POST["bayar"];
    $statusbayar = $_POST["stbyar"];
    $totalharga = $_POST["tothar"];
    $sisa = $_POST['sisa'];
    $kembali = $_POST['tanggal-kembali'];


    $querySewa = "UPDATE sewa SET `Sisa yang harus dibayar`='$sisa', StatusBayar='$statusbayar', Total_Harga='$totalharga' WHERE id_Sewa='$id'";
    $queryDetailSewa = "INSERT INTO detail_sewa (id_Sewa, Nopol, Tgl_Kembali, Lama_Pinjam, tanggal_pengembalian,  Denda, Keterangan) VALUES ('$id', '$nopol', '$kembali', '$lamapinjam', NULL,  '0', ' ')";

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
