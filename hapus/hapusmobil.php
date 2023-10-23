<?php
if ($_GET['reqkarya'] == "dell") {
    require_once "../koneksi.php";
    session_start();

    if (!empty($_GET)) {
        $output = '';
        $id = $_GET["id"]; // Perbaikan: Gunakan "id" sebagai parameter yang dikirimkan melalui URL

        // Delete the employee from the database
        $query = "DELETE FROM mobil WHERE Nopol = '$id'";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if ($result) {
            // The query was successful, redirect the user to the datamobilUI.php page
            $_SESSION["suksessss"] = 'Data Berhasil Di Hapus';    
            header("location: ../datamobilUI.php");
        } else {
            // The query failed, you can add additional error handling here
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
