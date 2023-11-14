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
  <title>Laporan</title>
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
                <h1>Laporan</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a href="admin.php">Dashboard</a></li>
                  <li><a href="LaporanUI.php">Laporan</a></li>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong class="card-title">Laporan</strong>
              </div>
              <div class="card-body">
                <form role="form" action="" method="GET">
                  <div class="input-group">
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="false" name="bln" id="id_pinjaman">
                      <option selected="selected" value="">-Pilih-</option>
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <span class="input-group-btn">
                      <br>
                      <button type="submit" class="btn btn-info btn-flat">Tampilkan</button>
                    </span>
                  </div>
                </form>

                <?php
                if (isset($_GET['bln'])) {
                  require_once 'koneksi.php';
                  require_once 'fungsi/funct.php';

                  $bulan = $_GET['bln']; // Simpan bulan yang dipilih
                  $sql = mysqli_query($conn, "SELECT sewa.*, mobil.MerkMobil, detail_sewa.Tgl_Kembali
                  FROM sewa
                  JOIN detail_sewa ON sewa.id_Sewa = detail_sewa.id_Sewa
                  JOIN mobil ON mobil.Nopol = detail_sewa.Nopol
                  WHERE MONTH(sewa.Tgl_sewa) = '$bulan' ORDER BY sewa.id_Sewa ASC");

                  if ($sql) {
                    $jum = mysqli_num_rows($sql);
                    if ($jum > 0) {
                ?>
                      <br>
                      <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped">
                          <thead>
                            <tr class="info">
                              <th>
                                <center>Kode Struk</center>
                              </th>
                              <th>
                                <center>Merk Mobil</center>
                              </th>
                              <th>
                                <center>Tgl Sewa</center>
                              </th>
                              <th>
                                <center>Tgl Kembali</center>
                              </th>
                              <th>
                                <center>Bayar</center>
                              </th>
                              <th>
                                <center>Total Harga</center>
                              </th>
                              <th>
                                <center>Action</center>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                              <tr>
                                <td>
                                  <center><?php echo $data['id_Sewa'] ?></center>
                                </td>
                                <td>
                                  <center><?php echo $data['MerkMobil']; ?></center>
                                </td>
                                <td>
                                  <center><?php echo $data['Tgl_sewa'] ?></center>
                                </td>
                                <td>
                                  <center><?php echo $data['Tgl_Kembali'] ?></center>
                                </td>
                                <td>
                                  <center>Rp <?php echo number_format($data['bayar'], 0, ',', '.'); ?></center>
                                </td>
                                <td>
                                  <center>Rp <?php echo number_format($data['Total_Harga'], 0, ',', '.'); ?></center>
                                </td>
                                <td>
                                  <center><a href="cetak/cetaklaporan.php?id_Sewa=<?php echo $data['id_Sewa']; ?>" title="Edit Data ini" class="btn btn-info btn-sm"><i class="fa fa-print "></i> Print</a></center>
                                </td>
                              </tr>
                            <?php
                              $no++;
                            }
                            ?>
                          </tbody>

                        </table>
                      </div>
                <?php
                    } else {
                      echo '<br><div class="alert alert-danger" style="height: 80px; font-size:40px;" align="center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        DATA BELUM ADA!!!
                        </div>';
                    }
                  } else {
                    echo "Error dalam eksekusi query: " . mysqli_error($conn);
                  }
                }
                ?>
                <br>
              </div>
            </div>
          </div>
          <!-- .animated -->
        </div>
        <!-- .content -->
      </div>
    </div>

    <div class="clearfix"></div>

    <footer class="site-footer">
      <div class="footer-inner bg-white">
        <div class="row">
          <div class="col-sm-6 ">Copyright &copy; 2023 TEAM 1 MIF D</div>
        </div>
      </div>
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

</body>