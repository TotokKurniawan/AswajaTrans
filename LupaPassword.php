<?php
session_start();
require_once('koneksi.php');

if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  $newPassword = $_POST['password'];

  // Pastikan password baru tidak kosong atau memenuhi persyaratan lainnya
  if (empty($newPassword)) {
    echo "Kata sandi baru tidak boleh kosong.";
    // Redirect atau tampilkan pesan sesuai kebijakan aplikasi Anda
    exit();
  }

  // Periksa apakah username ada dalam database
  $checkUserQuery = "SELECT username FROM user WHERE username = ?";

  $stmtCheck = $conn->prepare($checkUserQuery);
  $stmtCheck->bind_param("s", $username);
  $stmtCheck->execute();
  $stmtCheck->store_result();

  if ($stmtCheck->num_rows == 1) {
    // Username ditemukan, perbarui kata sandi pengguna di tabel "user" dalam database
    $updateQuery = "UPDATE user SET password = ? WHERE username = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ss", $newPassword, $username);

    if ($stmt->execute()) {
      $_SESSION["luppus"] = 'Password Anda Berhasil Diubah';
      header('Location: login.php');
    } else {
      $_SESSION["luput"] = 'Password Anda Gagal Diubah';
      header('Location: LupaPassword.php');
    }

    $stmt->close();
  } else {
    echo "Username tidak ditemukan.";
  }

  $stmtCheck->close();
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
  <style>
    body {
      margin: 0;
      overflow: hidden;
    }
  .panel.panel-default {
    background-color: rgba(0, 0, 0, 0); /* Warna merah dengan opacity 0.5 */
    color: white; /* Mengatur warna teks menjadi putih */
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
                <p>You can reset your password here.</p>
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
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                        <input id="password" name="password" placeholder="New Password" class="form-control" type="password" />
                      </div>
                    </div>
                    <div class="form-group">
                      <input name="simpan" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit" />
                    </div>
                    <div id="reset-message" style="display: none">
                      <!-- Pesan berhasil direset akan muncul di sini -->
                      Password has been successfully reset.
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
</body>

</html>