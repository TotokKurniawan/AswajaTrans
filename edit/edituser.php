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
        $targetDirectory = __DIR__ . '/../fotoprofil/';
        $fotoFileName = basename($foto['name']);
        $new_foto_full_path = $targetDirectory . $fotoFileName;

        if (move_uploaded_file($foto['tmp_name'], $new_foto_full_path)) {
            // File berhasil diupload
        } else {

            echo "Error uploading file.";
            print(error_get_last()['message']);
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
