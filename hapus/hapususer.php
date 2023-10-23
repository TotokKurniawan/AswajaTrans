<?php
session_start();
if (isset($_GET['id']) && isset($_GET['reqkarya']) && $_GET['reqkarya'] == 'dell') {
  // Menghubungkan ke database (gantilah dengan informasi koneksi Anda)
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';
  $db_name = 'aswajatrans2';

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
  }

  // Mendapatkan ID yang akan dihapus
  $id = $_GET['id'];

  // Query SQL untuk menghapus data dari tabel
  $sql = "DELETE FROM user WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
	$_SESSION["suksessss"] = 'Data Berhasil Di Hapus';
    header("location: ../datauserUI.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Tutup koneksi ke database
  mysqli_close($conn);
}

// Selanjutnya, Anda dapat melanjutkan dengan menampilkan tabel data seperti yang telah Anda lakukan sebelumnya di file ini.
?>
