<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "aswajatrans2";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // var_dump(mysqli_query($conn,'SELECT * FROM user')->fetch_assoc());
}
