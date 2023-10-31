<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php
session_start();
require_once("koneksi.php");

if (isset($_POST['daftar'])) {
  // Periksa apakah reCAPTCHA telah diverifikasi
  $recaptchaSecret = "6LfdS9soAAAAABAyMyMXjUX9EhDtL7tNHTv0aEzZ";
  $recaptchaResponse = $_POST['g-recaptcha-response'];

  $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
  $recaptchaResponse = json_decode($verify);

  if (!$recaptchaResponse->success) {
    // Jika reCAPTCHA gagal, tampilkan pesan kesalahan
    $_SESSION["captcha"];
    echo "Verifikasi reCAPTCHA gagal. Anda mungkin adalah robot. Silakan coba lagi.";
  } else {
    // Jika reCAPTCHA berhasil, lanjutkan dengan proses registrasi
    // Periksa apakah semua data yang diperlukan diisi dengan benar
    if (
      isset($_POST['namalengkap']) &&
      isset($_POST['hint']) &&
      isset($_POST['jawab']) &&
      isset($_POST['username']) &&
      isset($_POST['password'])
    ) {
      $Name = $_POST['namalengkap'];
      $userHint = $_POST['hint'];
      $userHintAnswer = $_POST['jawab'];
      $username = $_POST['username'];
      $userPass = $_POST['password'];

      // Hash password menggunakan password_hash
      $hashedPassword = password_hash($userPass, PASSWORD_DEFAULT);

      // Periksa apakah "Foto" diisi atau tidak
      if (isset($_POST['foto'])) {
        $photo = $_POST['foto'];
      } else {
        $photo = ""; // Setel ke string kosong jika tidak diisi
      }

      $query = "INSERT INTO user (Username, Nama,  Hint, JawabanHint, Password, Foto) VALUES ('$username', '$Name', '$userHint', '$userHintAnswer', '$hashedPassword', '$photo')";
      $result = mysqli_query($conn, $query);

      if ($result) {
        // Jika query berhasil dijalankan, arahkan ke halaman login dengan pesan sukses
        $_SESSION["sukses"] = 'Registrasi Anda Berhasil ';
        header('Location: login.php?pesan=Registrasi berhasil. Silakan login.');
        exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan
      } else {
        // Jika terjadi kesalahan dalam eksekusi query, tampilkan pesan kesalahan
        $_SESSION["eror"] = 'Registrasi Anda Gagal';
        echo "Terjadi kesalahan dalam proses registrasi: " . mysqli_error($conn);
      }
    } else {
      // Jika ada data yang belum diisi, tampilkan pesan kesalahan
      echo "Ada data yang belum diisi. Mohon lengkapi semua field.";
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Registrasi Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="apple-touch-icon" href="assets/img/istockphoto-669053856-170667a.jpg" />
  <link rel="shortcut icon" href="assets/img/istockphoto-669053856-170667a.jpg" />

  <!-- LINEARICONS -->
  <link rel="stylesheet" href="assets/fonts/linearicons/style.css" />

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="assets/css/stylereg.css" />
  <link rel="stylesheet" href="sweetallert/sweetalert2.min.css">

</head>

<body>
  <div class="wrapper">
    <div class="inner">
      <img src="#" alt="" class="image-1" />
      <form method="POST" action="registrasi.php">
        <h3>Create Account</h3>
        <h5>Please enter your user information.</h5><br>
        <div class="form-holder">
          <span class="lnr lnr-user"></span>
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="namalengkap" />
        </div>
        <div class="form-holder">
          <span class="lnr lnr-question-circle"></span>
          <select class="form-control" name="hint">
            <option value="">Choose One Hint</option>
            <option value="Siapa Nama Ayahmu ??">Siapa Nama Ayahmu ?? </option>
            <option value="Siapa Nama Ibumu ??">Siapa Nama Ibumu ??</option>
            <option value="Apa Warna Kesukaanmu ??">Apa Warna Kesukaanmu ??</option>
            <option value="Apa Makanan Kesukaanmu ??">Apa Makanan Kesukaanmu ??</option>
            <!-- Tambahkan pilihan lainnya sesuai kebutuhan Anda -->
          </select>
        </div>

        <div class="form-holder">
          <span class="lnr lnr-question-circle"></span>
          <input type="text" class="form-control" placeholder="Jawaban Hint" name="jawab" />
        </div>
        <div class="form-holder">
          <span class="lnr lnr-user"></span>
          <input type="username" class="form-control" placeholder="Username" name="username" />
        </div>
        <div class="form-holder">
          <span class="lnr lnr-lock"></span>
          <input type="password" class="form-control" placeholder="Password" name="password" />
        </div>
        <div class="form-holder">
          <span class="fas fa-camera"></span>
          <input type="file" class="form-control" placeholder="Upload Foto" name="foto" />
        </div>
        <div class="g-recaptcha" data-sitekey="6LfdS9soAAAAAOAdcVgAueix-VUO_kc0sYh-3aCV"></div>
        <!-- 6LfdS9soAAAAABAyMyMXjUX9EhDtL7tNHTv0aEzZ -->

        <button type="submit" name="daftar">
          <span>Register</span>
        </button>
      </form>
      <!-- <img src="#" alt="" class="image-2" /> -->
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
  <script src="sweetallert/sweetalert2.min.js"></script>



  <?php if (@$_SESSION['eror']) { ?>
    <script>
      Swal.fire({
        icon: 'eror',
        title: 'Gagal',
        text: 'Registrasi Anda Gagal',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['eror']);
  } ?>

  <?php if (@$_SESSION['captcha ']) { ?>
    <script>
      Swal.fire({
        icon: 'eror',
        title: 'Gagal',
        text: 'Verifikasi Captcha Anda Gagal',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['captcha']);
  } ?>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>