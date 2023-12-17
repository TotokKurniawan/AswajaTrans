<?php
require("../koneksi.php");
header('Content-Type: application/json');

$query = "SELECT Tgl_Pengeluaran, nominal FROM pengeluaran";  // Mengambil kolom tanggal dan nominal

$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
