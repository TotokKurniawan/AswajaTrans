<?php
session_start();
require_once("koneksi.php")   ?>
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
  <title>Dashboard Admin</title>
  <meta name="description" content="Aswaja Trans" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="" />
  <link rel="shortcut icon" href="assets/img/istockphoto-669053856-170667a.jpg" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css" />
  <link rel="stylesheet" href="assets/css/cs-skin-elastic.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="sweetallert/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    #weatherWidget .currentDesc {
      color: #ffffff !important;
    }

    .traffic-chart {
      min-height: 335px;
    }

    #flotPie1 {
      height: 150px;
    }

    #flotPie1 td {
      padding: 3px;
    }

    #flotPie1 table {
      top: 20px !important;
      right: -10px !important;
    }

    .chart-container {
      display: table;
      min-width: 270px;
      text-align: left;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    #flotLine5 {
      height: 105px;
    }

    #flotBarChart {
      height: 150px;
    }

    #cellPaiChart {
      height: 160px;
    }
  </style>
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

  <!-- /#left-panel -->
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      <div class="top-left">
        <div class="navbar-header">
          <a class="navbar-brand" style="color: black ; " href="">
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
                <?php
                $query = "SELECT Foto, Nama FROM User WHERE Username = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  $urlFoto = $row['Foto'];
                  $namaUser = $row['Nama'];

                  echo '<span class="mr-2" style="text-transform: uppercase; font-weight: bold;">' . $namaUser . '</span>'; // Display user's name in uppercase and bold

                  if (!is_null($urlFoto)) {
                    $urlFoto = str_replace($_SERVER['DOCUMENT_ROOT'], '', $urlFoto);
                    echo '<img alt="User Avatar" src="' . $urlFoto . '" class="user-avatar rounded-circle img-thumbnail img-fluid">';
                  } else {
                    echo '<img alt="User Avatar" src="assets/images/polije.png" class="user-avatar rounded-circle img-thumbnail img-fluid">';
                  }
                } else {
                  echo 'Error dalam menjalankan query: ' . mysqli_error($conn);
                }
                ?>
              </a>

              <div class="user-menu dropdown-menu">
                <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
                <a class="dropdown-item" href="login.php"><i class="fa fa-power-off"></i> Logout</a>
              </div>
            </div>



          </div>
        </div>
    </header>
    <!-- /#header -->
    <!-- Content -->
    <div class="content">
      <!-- Widgets  -->
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-1">
                  <i class="pe-7s-cash"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <?php
                    // Query SQL untuk mengambil data pemasukan
                    $sql = "SELECT SUM(bayar) AS total_pemasukan FROM sewa where YEAR(Tgl_sewa) = YEAR(CURRENT_DATE);";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                      $row = mysqli_fetch_assoc($result);
                      $total_pemasukan = $row['total_pemasukan'];

                      // Format angka menjadi format mata uang Rupiah
                      $total_pemasukan_formatted = "Rp " . number_format($total_pemasukan, 0, ',', '.');
                    } else {
                      $total_pemasukan_formatted = "Rp 0";
                    }

                    // Tutup koneksi ke database
                    // mysqli_close($conn);
                    ?>

                    <div class="stat-text">
                      <span class="pendapatan"><?php echo $total_pemasukan_formatted; ?></span>
                    </div>
                    <div class="stat-heading">Pendapatan Tahun Ini </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-2">
                  <i class="pe-7s-cart"></i>
                </div>
                <div class="stat-content">
                  <?php
                  $sql = "SELECT SUM(Nominal) AS total_pengeluaran FROM pengeluaran WHERE YEAR(Tgl_Pengeluaran) = YEAR(CURRENT_DATE);";
                  $result = mysqli_query($conn, $sql);

                  $total_pengeluaran_formatted = "Rp 0";

                  if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    $total_pengeluaran = $row['total_pengeluaran'];

                    $total_pengeluaran_formatted = "Rp " . number_format($total_pengeluaran, 0, ',', '.');
                  }
                  ?>
                  <div class="text-left dib">
                    <div class="stat-text">
                      <span class="pengeluaran"><?php echo $total_pengeluaran_formatted; ?></span>
                    </div>
                    <div class="stat-heading">Pengeluaran Tahun Ini</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-3">
                  <i class="pe-7s-browser"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <?php
                    $sql = "SELECT 
                    COUNT(id_Sewa) AS total_sewa
                  FROM 
                    sewa
                  WHERE 
                    MONTH(tgl_sewa) = MONTH(CURRENT_DATE); ";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                      $row = mysqli_fetch_assoc($result);
                      $total_sewa = $row['total_sewa'];
                    } else {
                      $total_sewa = 0;
                    }
                    ?>

                    <div class="stat-text">
                      <span class="count"><?php echo $total_sewa; ?></span>
                    </div>
                    <div class="stat-heading">Total Sewa Bulan Ini </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
      <!--  Traffic  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 class="box-title">GRAFIK TOTAL SEWA</h4>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-body"><iframe src="bar/bar.php" width="100%" height="400"></iframe></div>
                  </div>
                </div>
              </div>
            </div><br>
            <div class="row">
              <div class="col-sm-12">
                <div class="panel-group">
                  <div class="panel panel-default">
                    <h4 class="box-title"><span>GRAFIK GARIS TOTAL PENGELUARAN</span></h4><br>
                    <div class="panel-body"><iframe src="line/line.php" width="100%" height="400"></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- /# column -->
          </div>
        </div>
      </div>


      <!-- Calender Chart Weather  -->
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <!-- <h4 class="box-title">Chandler</h4> -->
              <div class="calender-cont widget-calender center">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>





      <!-- Footer -->
      <footer class="site-footer">
        <div class="footer-inner bg-white">
          <div class="row">
            <div class="col-sm-6 ">Copyright &copy; 2023 TEAM 1 MIF D</div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main2.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
    <script src="sweetallert/sweetalert2.min.js"></script>

    <!--Local Stuff-->


    <?php if (@$_SESSION['login']) { ?>
      <script>
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Anda Berhasil login',
          timer: 2000,
          showConfirmButton: false
        });
      </script>
      <!-- agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['login']);
    } ?>
</body>

</html>