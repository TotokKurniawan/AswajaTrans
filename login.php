<?php
session_start();
require_once('koneksi.php');

if (isset($_POST['submit'])) {
  $username = $_POST['Username'];
  $_SESSION['username'] = $username;
  $password = $_POST['Password'];

  if (!empty($username) && !empty($password)) {
    $query = "SELECT username, password FROM user WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);
    $datas = $result->fetch_assoc();

    if ($datas && password_verify($password, $datas['password'])) {
      // Login berhasil, tampilkan SweetAlert2 berhasil
      $_SESSION["login"] = 'Anda Berhasil Login';
      header("Location: admin.php");
    } else {
      $_SESSION["erorr"] = 'Login Gagal';
      // Login gagal, tampilkan SweetAlert2 gagal
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style_login.css" />
  <link href="assets/img/istockphoto-669053856-170667a.jpg" rel="icon">
  <link href="assets/img/istockphoto-669053856-170667a.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" href="sweetallert/sweetalert2.min.css">
</head>

<body>
  <section class="anjay">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="assets/video/anjay.mp4" type="video/mp4" />
    </video>
    <img src="assets/img/istockphoto-669053856-170667a - Copy.jpg" class="avatar" />
    <div class="login-box">

      <h1>Login Here</h1>
      <form action="login.php" method="POST">
        <p>Username</p>
        <input type="text" required name="Username" placeholder="Masukan Username" />
        <p>Password</p>
        <input type="password" required name="Password" placeholder="Masukan Password" />
        <input class="btn-hover color" type="submit" name="submit" value="Login" />
        <a style="color:aqua" href="LupaPassword.php">Forgot Password</a></span>
        <!-- <span class="top"></span>
        <span class="right"></span>
        <span class="bottom"></span>
        <span class="left"></span> -->
      </form>
    </div>
  </section>
  <script src="sweetallert/sweetalert2.min.js"></script>

</body>
<?php if (@$_SESSION['sukses']) { ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: 'Registrasi Anda Berhasil',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['sukses']);
} ?>
<?php if (@$_SESSION['luppus']) { ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: 'Password Anda Berhasil Diubah',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['luppus']);
} ?>
<?php if (@$_SESSION['erorr']) { ?>
  <script>
    Swal.fire({
      icon: 'eror',
      title: 'Gagal',
      text: 'Login Gagal',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['erorr']);
} ?>

</html>