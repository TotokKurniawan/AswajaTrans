<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php
session_start(); // Pastikan session sudah dimulai
require_once("koneksi.php");

if (isset($_POST['simpan'])) {
  // Periksa apakah reCAPTCHA telah diverifikasi
  $recaptchaSecret = "6LfdS9soAAAAABAyMyMXjUX9EhDtL7tNHTv0aEzZ";

  if (isset($_POST['g-recaptcha-response'])) {
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $recaptchaResponse = json_decode($verify);

    if (!$recaptchaResponse->success) {
      // Jika reCAPTCHA gagal, tampilkan pesan kesalahan
      $_SESSION["captcha"] = 'Verifikasi reCAPTCHA gagal. Anda mungkin adalah robot. Silakan coba lagi.';
      header("Location: halaman_error.php");
      exit();
    }
  } else {
    // Jika respons reCAPTCHA tidak ada
    $_SESSION["captcha"] = 'Verifikasi reCAPTCHA tidak valid. Silakan coba lagi.';
    header("Location: halaman_error.php");
    exit();
  }

  // Periksa apakah semua data yang diperlukan diisi dengan benar
  $username = $_POST['username'];
  $hint = $_POST['hint'];
  $jawab = $_POST['jawab'];
  $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Hash the password for security

  if (!empty($username) && !empty($hint) && !empty($jawab)) {
    // Proses pemulihan kata sandi
    $querycari = "SELECT * FROM user WHERE Username = '$username' AND Hint = '$hint' AND JawabanHint = '$jawab'";
    $resultcari = mysqli_query($conn, $querycari);

    if (mysqli_num_rows($resultcari) == 1) {
      // User found, update the password
      $queryUpdate = "UPDATE user SET Password = '$pass' WHERE Username = '$username'";
      $resultUpdate = mysqli_query($conn, $queryUpdate);

      if ($resultUpdate) {
        // Password updated successfully
        $_SESSION['luppus'] = 'Password Berhasil Diubah';
        header("Location: login.php");
        exit();
      } else {
        $_SESSION["luput"] = 'Gagal mengupdate kata sandi';
      }
    } else {
      $_SESSION["luput"] = 'Username Tidak Ditemukan atau jawaban hint salah';
    }
  } else {
    $_SESSION["luput"] = 'Semua data harus diisi';
    header("Location: halaman_error.php");
    exit();
  }
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Password</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/luppas.css" />

  <link rel="apple-touch-icon" href="assets/img/istockphoto-669053856-170667a.jpg" />
  <link rel="shortcut icon" href="assets/img/istockphoto-669053856-170667a.jpg" />
  <link rel="stylesheet" href="sweetallert/sweetalert2.min.css">

  <style>
    body {
      margin: 0;
      overflow: hidden;
    }

    .panel.panel-default {
      background-color: rgba(0, 0, 0, 0);
      /* Warna merah dengan opacity 0.5 */
      color: white;
      /* Mengatur warna teks menjadi putih */
    }

    .anjay {
      width: 100%;
      height: 100vh;
      position: relative;
      padding: 0 5%;
      display: flex;
      align-items: center;
      justify-content: center;
      -webkit-box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.8);
      box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.8);
    }

    .back-video {
      position: absolute;
      right: 0;
      bottom: 0;
      z-index: -1;
    }

    @media (min-aspect-ration: 16/89) {
      .back-video {
        width: 100%;
        height: auto;
      }
    }

    @media (max-aspect-ration: 16/89) {
      .back-video {
        width: auto;
        height: 100%;
      }
    }

    /* end video */
  </style>

</head>

<body>
  <section class="anjay">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="assets/video/anjay.mp4" type="video/mp4" />
    </video>

    <div class="form-gap"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="text-center">
                <h3><i class="fa fa-lock fa-4x"></i></h3>
                <h2 class="text-center">Forgot Password?</h2>
                <p>Find Your Account</p>
                <div class="panel-body">
                  <form method="POST" action="LupaPassword.php">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                        <input id="username" name="username" placeholder="username" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <select class="form-control" name="hint">
                            <option value="">Choose One Hint</option>
                            <option value="Siapa Nama Ayahmu ??">Siapa Nama Ayahmu ?? </option>
                            <option value="Siapa Nama Ibumu ??">Siapa Nama Ibumu ??</option>
                            <option value="Apa Warna Kesukaanmu ??">Apa Warna Kesukaanmu ??</option>
                            <option value="Apa Makanan Kesukaanmu ??">Apa Makanan Kesukaanmu ??</option>
                            <!-- Tambahkan pilihan lainnya sesuai kebutuhan Anda -->
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                        <input id="jawab" name="jawab" placeholder="Jawaban Hint" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                        <input id="pass" name="pass" type="Password" placeholder="Password" class="form-control" />
                      </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfdS9soAAAAAOAdcVgAueix-VUO_kc0sYh-3aCV"></div>

                    <div class="form-group">
                      <input name="simpan" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" />
                    </div>
                    <input type="hidden" class="hide" name="token" id="token" value="" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="sweetallert/sweetalert2.min.js"></script>

</body>
<?php if (@$_SESSION['luput']) { ?>
  <script>
    Swal.fire({
      icon: 'eror',
      title: 'Gagal',
      text: 'Username Tidak Ditemukan',
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['luput']);
}
?>

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

</html>