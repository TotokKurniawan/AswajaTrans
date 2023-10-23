<?php
require("../koneksi.php");
header('Content-Type: application/json');

$query = "SELECT MONTH(tgl_sewa) AS bulan, COUNT(id_Sewa) AS jumlah_id
          FROM sewa
          GROUP BY MONTH(tgl_sewa)"; 

$result = mysqli_query($conn, $query);

$data = array(); // Membuat array kosong untuk menyimpan data

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
