<?php
require '../koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['name'];
    $username = $_POST['usera'];
    $password = $_POST['pass'];

    // Hash kata sandi sebelum menyimpannya
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perbarui data pengguna dalam database (nama, username, dan kata sandi yang dihash)
    $query = "UPDATE user SET Nama='$fullname', Username='$username', Password='$hashedPassword' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["editdatuser"] = 'Data Berhasil Diubah';
        header('Location: ../datauserUI.php');
    } else {
        $_SESSION["eroreditdatuser"] = 'Data Gagal Diubah';
        echo "Error: " . mysqli_error($conn);
    }
}
?>
