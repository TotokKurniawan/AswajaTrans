<?php
session_start();

if ($_GET['reqkarya'] == "dell" && isset($_GET["id"])) { // Perbaikan: Gunakan "id" sebagai parameter yang dikirimkan melalui URL
    require_once "../koneksi.php";
    session_start();

    if (!empty($_GET["id"])) {
        $output = '';
        $id = $_GET["id"]; // Perbaikan: Gunakan "id" sebagai parameter yang dikirimkan melalui URL

        // Hapus data dari tabel detail_sewa
        $query1 = "DELETE FROM detail_sewa WHERE id_Sewa = '$id'";
        $result1 = mysqli_query($conn, $query1);

        // Hapus data dari tabel sewa
        $query2 = "DELETE FROM sewa WHERE id_Sewa = '$id'";
        $result2 = mysqli_query($conn, $query2);

        // Periksa jika kedua query berhasil
        if ($result1 && $result2) {
            // Kedua query berhasil, arahkan pengguna ke halaman yang sesuai
	$_SESSION["suksessss"] = 'Data Berhasil Di Hapus';
            
            header("location: ../datasewaUI.php");
        } else {
            // Query gagal, Anda dapat menambahkan penanganan kesalahan tambahan di sini
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
