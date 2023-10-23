<?php
require "../koneksi.php";
session_start();

if (!empty($_POST)) {
    $nopol = $_POST["nopol"];
    $id = $_POST["no"];
    $keterangan = $_POST["ket"];
    $nominal = $_POST["nom"];
    $tanggal = $_POST['tanggal'];

    // Perbaikan query SQL, menghapus koma ekstra setelah '$status'
    $query = "INSERT INTO pengeluaran(id_pengeluaran, Tgl_Pengeluaran, Keterangan, Nominal, Nopol) VALUES('$id', '$tanggal', '$keterangan', '$nominal', '$nopol')";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        $_SESSION["insertdatapengeluaran"] = 'Data Berhasil Di Simpan';    
        
        header("location: ../datapengeluaranUI.php");
    } else {
        $_SESSION["erorinsertdatapengeluaran"] = 'Data Gagal';    
        // Jika query gagal, Anda dapat menampilkan pesan kesalahan
        echo "Error: " . mysqli_error($conn);
    }
}
?>
