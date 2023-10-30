<?php
session_start();
require_once("../koneksi.php");

if (isset($_GET['id']) && isset($_GET['reqkarya']) && $_GET['reqkarya'] == 'dell') {
  // Mendapatkan ID yang akan dihapus
  $id = $_GET['id'];

  // Persiapkan pernyataan SQL untuk menghapus data dari tabel
  $sql = "DELETE FROM user WHERE id = '$id'";

  if (mysqli_query($conn, $sql)) {
    $_SESSION["suksessss"] = 'Data Berhasil Dihapus';
    header("location: ../datauserUI.php");
  } else {
    $_SESSION["erors"] = 'Data Gagal Dihapus';
    echo "Error: " . mysqli_error($conn);
  }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
