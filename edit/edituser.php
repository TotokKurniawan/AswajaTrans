<?php
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['name'];
    $username = $_POST['usera'];
    $password = $_POST['pass'];
    $hint = $_POST['hint'];
    $jawaban = $_POST['jawab'];
    $foto = $_FILES['foto'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $fotoFileName = '';

    if ($foto['size'] > 0) {
        $targetDirectory = 'C:/xampp/htdocs/AswajaTrans/AswajaTrans/AswajaTrans/Fotoprofil/';
        $fotoFileName = $targetDirectory . basename($foto['name']);

        if (move_uploaded_file($foto['tmp_name'], $fotoFileName)) {
            // File berhasil diupload
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    $query = "UPDATE user SET Nama='$fullname', Username='$username', Password='$hashedPassword', Hint='$hint', JawabanHint='$jawaban', Foto='$fotoFileName' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["myprofile"] = 'Data Berhasil Diubah';
        header('Location: ../profile.php');
    } else {
        $_SESSION["myprofileerror"] = 'Data Gagal Diubah';
        echo "Error: " . mysqli_error($conn);
    }
}
