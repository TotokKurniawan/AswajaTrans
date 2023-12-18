<?php
require("../koneksi.php");
header('Content-Type: application/json');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query1 = "SELECT MONTH(Tgl_sewa) AS bulan, SUM(bayar) AS jumlah_pendapatan 
           FROM sewa
           WHERE YEAR(Tgl_sewa) = YEAR(CURRENT_DATE)
           GROUP BY MONTH(Tgl_sewa)";


$query2 = "SELECT MONTH(Tgl_Pengeluaran) AS bulan, SUM(Nominal) AS jumlah_pengeluaran FROM pengeluaran 
           WHERE YEAR(Tgl_Pengeluaran) = YEAR(CURRENT_DATE)
           GROUP BY MONTH(Tgl_Pengeluaran)";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);

// Check query execution
if (!$result1 || !$result2) {
    die("Query failed: " . mysqli_error($conn));
}

$data1 = array();
$data2 = array();

while ($row1 = mysqli_fetch_assoc($result1)) {
    $data1[] = array(
        "bulan" => $row1["bulan"],
        "jumlah_pendapatan" => $row1["jumlah_pendapatan"]
    );
}

while ($row2 = mysqli_fetch_assoc($result2)) {
    $data2[] = array(
        "bulan" => $row2["bulan"],
        "jumlah_pengeluaran" => $row2["jumlah_pengeluaran"]
    );
}

mysqli_close($conn);

$response = array("sewa" => $data1, "pengeluaran" => $data2);

echo json_encode($response);
