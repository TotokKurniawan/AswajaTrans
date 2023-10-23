<?php
session_start();
require_once("koneksi.php");

if (isset($_POST['daftar'])) {
  // Periksa apakah semua data yang diperlukan diisi dengan benar
  if (
    isset($_POST['namalengkap']) &&
    isset($_POST['tempat-asal']) &&
    isset($_POST['tanggal-lahir']) &&
    isset($_POST['notelp']) &&
    isset($_POST['hint']) &&
    isset($_POST['jawab']) &&
    isset($_POST['username']) &&
    isset($_POST['password'])
  ) {
    $Name = $_POST['namalengkap'];
    $userCity = $_POST['tempat-asal'];
    $userBirthdate = $_POST['tanggal-lahir'];
    $userPhone = $_POST['notelp'];
    $userHint = $_POST['hint'];
    $userHintAnswer = $_POST['jawab'];
    $username = $_POST['username'];
    $userPass = $_POST['password'];

    // Periksa apakah "Foto" diisi atau tidak
    if (isset($_POST['foto'])) {
      $photo = $_POST['foto'];
    } else {
      $photo = ""; // Setel ke string kosong jika tidak diisi
    }

    $query = "INSERT INTO user (Username, Nama, TempatTanggalLahir, TanggalLahir, NoTelpon, Hint, JawabanHint, Password, Foto) VALUES ('$username', '$Name', '$userCity', '$userBirthdate', '$userPhone', '$userHint', '$userHintAnswer', '$userPass', '$photo')";
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




// require_once("koneksi.php");

// if (isset($_POST['submit'])) {
//     $Name = $_POST['namalengkap']; // Sesuaikan dengan atribut 'id' pada input nama lengkap
//     $userCity = $_POST['tempat-asal']; // Sesuaikan dengan atribut 'id' pada input asal kota
//     $userBirthdate = $_POST['tanggal-lahir']; // Sesuaikan dengan atribut 'id' pada input tanggal lahir
//     $userPhone = $_POST['notelp']; // Sesuaikan dengan atribut 'name' pada input nomor HP
//     $userHint = $_POST['hint']; // Sesuaikan dengan atribut 'name' pada input hint
//     $userHintAnswer = $_POST['jawab']; // Sesuaikan dengan atribut 'name' pada input jawaban hint
//     $username = $_POST['username']; // Sesuaikan dengan atribut 'name' pada input username
//     $userPass = $_POST['password']; // Sesuaikan dengan atribut 'name' pada input password
//     $photo = $_POST['foto']; // Sesuaikan dengan atribut 'name' pada input password

//     $query = "INSERT INTO user (Username, Nama, TempatTanggalLahir,TanggalLahir,NoTelpon,Hint,JawabanHint,Password,Foto) VALUES ('$userName', $Name', '$userCity', '$userBirthdate', '$userPhone','$userHint', '$userHintAnswer', '$userPass', '$photo')";
//     $result = mysqli_query($conn, $query);
//     header('Location: login.php'); // Menggunakan tanda titik dua (:) bukan tanda spasi setelah 'Location'
// }
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
          <span class="lnr lnr-user"></span>
          <input type="text" class="form-control" placeholder="Asal Kota" name="tempat-asal" />
        </div>
        <div class="form-holder">
          <span class="lnr lnr-calendar-full"></span>
          <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal-lahir" />
        </div>

        <div class="form-holder">
          <span class="lnr lnr-phone-handset"></span>
          <input type="text" class="form-control" placeholder="No Hp" name="notelp" />
        </div>
        <div class="form-holder">
          <span class="lnr lnr-question-circle"></span>
          <select class="form-control" name="hint">
            <option value="">Pilih Hint</option>
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

        <button type="submit" name="daftar">
          <span>Register</span>
        </button>
      </form>
      <!-- <img src="#" alt="" class="image-2" /> -->
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>