<?php
session_start();

// ... (koneksi ke database dan query data mobil)

$conn = mysqli_connect("localhost", "root", "", "aswajatrans2");

if (mysqli_connect_errno()) {
  echo "Koneksi ke database gagal: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT Nopol, MerkMobil, Harga FROM mobil WHERE Status='Mobil Belum Disewa'";
$result = mysqli_query($conn, $sql);

$dataHarga = array(); // Menyimpan data harga dalam array
$dataMerk = array();  // Menyimpan data merk mobil dalam array

while ($row = mysqli_fetch_assoc($result)) {
  $nopol = $row['Nopol'];
  $merkMobil = $row['MerkMobil'];
  $harga = $row['Harga'];
  $dataHarga[$nopol] = $harga;
  $dataMerk[$nopol] = $merkMobil;
}

$_SESSION['harga_data'] = $dataHarga; // Menyimpan data harga dalam variabel sesi
$_SESSION['merk_data'] = $dataMerk;   // Menyimpan data merk mobil dalam variabel sesi

mysqli_close($conn);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Transaksi Sewa</title>
  <meta name="description" content="Aswaja Trans" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="assets/img/istockphoto-669053856-170667a.jpg" />
  <link rel="shortcut icon" href="assets/img/istockphoto-669053856-170667a.jpg" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css" />
  <link rel="stylesheet" href="assets/css/cs-skin-elastic.css" />
  <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css" />

  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>


<body>


  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="admin.php"><i class="menu-icon fa fa-laptop"></i>Dashboard
            </a>
          </li>
          <li class="menu-title">Master</li>
          <!-- /.menu-title -->
          <li class="menu-item">
            <a href="datapelangganUI.php" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-user"></i>Data Pelanggan</a>
          </li>

          <li class="menu-item">
            <a href="datamobilUI.php" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-car"></i>Data Mobil
            </a>
          </li>

          <li class="menu-item">
            <a href="datapengeluaranUI.php" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-th"></i>Data Pengeluaran</a>
          </li>

          <li class="menu-title">Transaksi</li>
          <!-- /.menu-title -->

          <li class="menu-item">
            <a href="sewaUI.php" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-shopping-cart"></i>Sewa</a>
          </li>

          <li>
            <a href="datasewaUI.php">
              <i class="menu-icon ti-shopping-cart"></i>Data Sewa
            </a>
          </li>

          <li>
            <a href="LaporanUI.php">
              <i class="menu-icon ti-file"></i>Laporan
            </a>
          </li>

          <li class="menu-item-">
            <a href="maps.php" aria-haspopup="true" aria-expanded="false">
              <i class="menu-icon fa fa-map"></i>Maps</a>
          </li>
          <li class="menu-title">Log Out</li>
          <!-- /.menu-title -->

          <li class="menu-item">
            <a href="#" onclick="logoutConfirmation();">
              <i class="menu-icon fa fa-sign-out"></i>
              <span class="menu-text" style="color: red;">Logout</span>
            </a>
          </li>
          <script>
            function logoutConfirmation() {
              var confirmation = confirm("Apakah Anda yakin ingin logout?");

              if (confirmation) {
                // Jika pengguna mengklik "OK" dalam pop-up konfirmasi, maka arahkan ke halaman logout
                window.location.href = "index.php";
              } else {
                // Jika pengguna mengklik "Batal," tidak ada tindakan yang diambil
              }
            }
          </script>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </aside> <!-- /#left-panel -->


  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" style="color: black ; " href="admin.php">
            <h4><span>ASWAJA TRANS</span></h3>
          </a>
          <a class="navbar-brand hidden" href="./"><img src="assets/images/logo2.png" alt="Logo" /></a>
          <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
      <div class="top-right">
        <div class="header-menu">
          <div class="header-left">

            <div class="user-area dropdown float-right">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle" src="assets/images/admin.jpg" alt="User Avatar" />
              </a>

              <div class="user-menu dropdown-menu">
                <a class="nav-link" href="profile.php"><i class="fa fa- user"></i>My Profile</a>
                <a class="nav-link" href="login.php"><i class="fa fa-power -off"></i>Logout</a>
              </div>
            </div>
          </div>
        </div>
    </header>
    <!-- /#header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
        <div class="row m-0">
          <div class="col-sm-4">
            <div class="page-header float-left">
              <div class="page-title">
                <h1>SEWA</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a href="index.php">Dashboard</a></li>
                  <li><a href="sewaUI.php">Sewa</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="animated fadeIn">

        <div class="row">

          <div class="col-xs-6 col-sm-6">
            <div class="card">
              <form id="myForm" action="insert/insertsewa.php" method="post">
                <div class="card-header">
                  <strong>Form Transaksi</strong>
                </div>
                <div class="card-body card-block">
                  <div class="form-group">
                    <label class="form-control-label">Kode Transaksi</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-shopping-cart"></i></div>
                      <input class="form-control" name="kodestruk" id="kodeStruk" value="<?php echo generateID2(); ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">NIK</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <select class="form-control" id="nik" name="nik">
                        <option value="">Pilih Nama Pelanggan</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "aswajatrans2");

                        if (mysqli_connect_errno()) {
                          echo "Koneksi ke database gagal: " . mysqli_connect_error();
                          exit();
                        }

                        $sql = "SELECT NIK, Nama_Pelanggan FROM pelanggan"; // Ganti dengan query yang sesuai
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                          $nik = $row['NIK'];
                          $namaPelanggan = $row['Nama_Pelanggan'];
                          echo "<option value='$nik'>$nik - $namaPelanggan</option>";
                        }

                        mysqli_close($conn);
                        ?>
                      </select>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Tanggal Sewa</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input class="form-control" type="date" id="tanggalsewa" name="tanggalsewa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" form-control-label">Bayar DP Mobil</label>
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input class="form-control" required id="bayar" oninput="validateInput(this)">
                      <input type="hidden" class="form-control" name="bayar" id="bayar1">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class=" form-control-label">Status Bayar</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                      <select class="form-control" name="stbyar" id="stbyar' . $row[" Nopol"] . '">
                        <option value="Kurang" >Kurang</option>
                        <option value="Lunas">Lunas</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class=" form-control-label">Total Sewa Mobil</label>
                  <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                    <input class="form-control" required name="totsewa" id="totsew" oninput="setDpMobil();">
                  </div>
                </div>
                
                <input type="submit" name="insert" id="insert" value="Simpan" class="btn btn-success" onMouseOver="this.style.backgroundColor=' #00796b'" onMouseOut="this.style.backgroundColor='#4CAF50'" />

                    </div>
              </form>
            </div>
          </div>


          <div class="col-xs-6 col-sm-6">
            <div class="card">
              <form id="myForm1" action="insert/insertdetailsewa.php" method="post">
                <div class="card-header">
                  <strong>From Detail Sewa</strong>
                </div>
                <div class="card-body card-block">

                  <div class="form-group">
                    <label class="form-control-label">Kode Transaksi</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-shopping-cart"></i></div>
                      <?php
                      require_once "koneksi.php"; // Sesuaikan dengan path ke file koneksi.php

                      // Query untuk mendapatkan id_Sewa terbaru
                      $query = "SELECT id_Sewa FROM sewa ORDER BY id_Sewa DESC LIMIT 1";
                      $result = mysqli_query($conn, $query);

                      if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $lastIdSewa = $row['id_Sewa'];
                        echo '<input class="form-control" name="kodestruk" id="kodeStruk" value="' . $lastIdSewa . '" readonly>';
                      } else {
                        // Handle kesalahan jika query gagal
                        echo '<input class="form-control" name="kodestruk" id="kodeStruk" value="' . generateID2() . '" readonly>';
                      }
                      ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Nopol - Merk Mobil</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-car"></i></div>
                      <select class="form-control" id="nopol" name="nopol">
                        <option value="">Pilih Mobil</option>

                        <?php
                        foreach ($_SESSION['harga_data'] as $nopol => $harga) {
                          $merkMobil = $_SESSION['merk_data'][$nopol];
                          echo "<option value='$nopol'>$nopol - $merkMobil</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Harga Sewa Per Mobil</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                      <input class="form-control" name="harga" id="harga" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Tanggal Kembali</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input class="form-control" type="date" id="tanggalkembali" name="tanggalkembali">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Lama Pinjam</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                      <input class="form-control" required name="lamapinjam" id="lamapinjam">
                      <div class="input-group-addon">hari</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" form-control-label">Subtotal</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                      <input class="form-control" required name="subtotal" id="subtotal">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" form-control-label">Total Harga</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                      <input class="form-control" required name="tothar" id="tothar">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class=" form-control-label">Sisa Bayar</label>
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input class="form-control" required id="sisa" readonly>
                      <input type="hidden" class="form-control" name="sisa" id="sisa1" readonly>
                    </div>


                  </div>
                  <input type="submit" name="insert" id="insert" value="Simpan Detail" class="btn btn-success" onMouseOver="this.style.backgroundColor=' #00796b'" onMouseOut="this.style.backgroundColor='#4CAF50'" onclick="" />
                </div>
              </form>
            </div>
          </div>
        </div>


      </div><!-- .animated -->
    </div>
    <div class="clearfix"></div>

    <footer class="site-footer">
      <div class="footer-inner bg-white">
        <div class="row">
          <div class="col-sm-6 ">Copyright &copy; 2023 TEAM 1 MIF D</div>
        </div>
      </div>
    </footer>
    </footer>
  </div>

  <!-- /#right-panel -->

  <!-- Right Panel -->

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="assets/js/main2.js"></script>

  <script src="assets/js/lib/data-table/datatables.min.js"></script>
  <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
  <script src="assets/js/lib/data-table/jszip.min.js"></script>
  <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
  <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
  <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
  <script src="assets/js/init/datatables-init.js"></script>
  <!-- Script SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Tambahkan kode JavaScript di sini untuk mengatur harga setelah memilih nopol -->
  <script>
    document.getElementById('nopol').addEventListener('change', function() {
      var dpMobil = JSON.parse(localStorage.getItem('data'))
      const sisaBayar = document.getElementById('sisa')
      const sisaBayar1 = document.getElementById('sisa1')
      var selectedNopol = this.value;
      var hargaData = <?php echo json_encode($_SESSION['harga_data']); ?>;
      var hargaMobil = document.getElementById('harga').value = hargaData[selectedNopol] || '';
      var hasil = hargaMobil - dpMobil;
      sisaBayar1.value = hasil

      var format = hasil.toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR'
      });

      if (dpMobil > hargaMobil) {
        sisaBayar.value = 0;
      } else {
        sisaBayar.value = format;
      }
      console.log(dpMobil);
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function() {
      $("#bootstrap-data-table-export").DataTable();
    });

    function setDpMobil() {
      if (localStorage.getItem('data') == null) {
        localStorage.setItem('data', '[]');
      }
      const bayar = document.getElementById('bayar').value;
      const bayar1 = document.getElementById('bayar1');
      let penyimpanan = JSON.parse(localStorage.getItem('data'));
      var uang = parseInt(bayar.replace(/,/g, ''), 10);

      bayar1.value = uang;
      // console.log(uang);
      penyimpanan.push(uang);
      localStorage.setItem('data', JSON.stringify(penyimpanan));
    }


    function validateInput(input) {
      // input.value = input.value.replace(/\D/g, "");
      var value = input.value.replace(/[^0-9]/g, '');

      if (value) {
        value = parseInt(value, 10).toLocaleString('en-US');
      }

      input.value = value;
    }
  </script>
</body>
<?php if (@$_SESSION['insertsewa']) { ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: 'Data Berhasil Di Simpan',
      timer: 2000,
      showConfirmButton: false
    })
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['insertsewa']);
} ?>
<!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
<?php if (@$_SESSION['erorinsertsewa']) { ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Gagal',
      timer: 2000,
      showConfirmButton: false
    })
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['erorinsertsewa']);
} ?>

<?php if (@$_SESSION['insertdetailsewa']) { ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      text: 'Data Berhasil Di Simpan',
      timer: 2000,
      showConfirmButton: false
    })
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['insertdetailsewa']);
} ?>
<!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
<?php if (@$_SESSION['erorinsertdetailsewa']) { ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      text: 'Gagal',
      timer: 2000,
      showConfirmButton: false
    })
  </script>
  <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['erorinsertdetailsewa']);
} ?>



</html>

<?php
function generateID2()
{
  try {
    // Sambungkan ke database Anda
    $conn = mysqli_connect("localhost", "root", "", "aswajatrans2");

    // Periksa koneksi
    if (mysqli_connect_errno()) {
      echo "Koneksi ke database gagal: " . mysqli_connect_error();
      exit();
    }

    // Query untuk mengambil data pengeluaran dan mengurutkannya berdasarkan id_pengeluaran secara ascending
    $sql = "SELECT * FROM sewa ORDER BY id_Sewa ASC";
    $result = mysqli_query($conn, $sql);

    $nextNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
      $NoJual = substr($row['id_Sewa'], 3);
      if (!empty($NoJual)) {
        $nextNumber = max($nextNumber, intval($NoJual) + 1);
      }
    }

    $AN = sprintf("%04d", $nextNumber);
    $newID = "TR" . $AN;

    // Tutup koneksi ke database
    mysqli_close($conn);

    return $newID;
  } catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
  }
}

?>


<script>
  // Ambil elemen input dengan ID 'tanggalsewa'
  var tanggalsewaInput = document.getElementById('tanggalsewa');

  // Buat objek tanggal sekarang
  var today = new Date();

  // Format tanggal ke format YYYY-MM-DD
  var year = today.getFullYear();
  var month = String(today.getMonth() + 1).padStart(2, '0');
  var day = String(today.getDate()).padStart(2, '0');
  var formattedDate = year + '-' + month + '-' + day;

  // Setel nilai input tanggal ke tanggal sekarang
  tanggalsewaInput.value = formattedDate;
</script>