<?php
session_start();
require_once("koneksi.php");
if (!isset($_SESSION['username'])) {
  $_SESSION['user'] = 'Anda harus login terlebih dahulu.';
  header("Location: login.php");
  exit;
}
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
  <title>Data Sewa</title>
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
  <link rel="stylesheet" href="sweetallert/sweetalert2.min.css">

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
              Swal.fire({
                title: 'Konfirmasi Logout',
                text: 'Apakah Anda yakin ingin logout?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "logout.php";
                }
              });
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
                <?php
                $query = "SELECT Foto, Nama FROM user WHERE Username = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  $urlFoto = $row['Foto'];
                  $namaUser = $row['Nama'];

                  echo '<span class="mr-2" style="text-transform: uppercase; font-weight: bold;">' . $namaUser . '</span>'; // Display user's name in uppercase and bold

                  if (!is_null($urlFoto)) {
                ?>
                    <img alt='' src="<?php echo "fotoprofil/$urlFoto" ?>" class='user-avatar rounded-circle img-thumbnail img-fluid'>
                <?php
                  } else {
                    echo '<img alt="" src="assets/images/Polije.png" class="user-avatar rounded-circle img-thumbnail img-fluid" >';
                  }
                } else {
                  echo 'Error dalam menjalankan query: ' . mysqli_error($conn);
                }
                ?>
              </a>

              <div class="user-menu dropdown-menu">
                <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i> My Profile</a>
                <a class="dropdown-item" href="#" onclick="logoutConfirmation();">
                  <i class="fa fa-power-off"></i> Logout
                </a>
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
                <h1>DATA SEWA</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a href="admin.php">Dashboard</a></li>
                  <li><a href="datasewaUI.php">Data sewa</a></li>
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
                <strong class="card-title">Data Sewa</strong>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-warning" onMouseOver="this.style.backgroundColor='#006064'" onMouseOut="this.style.backgroundColor='#4CAF50'">
                  <a href="datadetailsewaUI.php" style="text-decoration: none; color: white;">Detail Sewa</a>
                </button>
                <br><br>
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <center>
                        <th>Kd Struk</th>
                        <th>Nama Pelanggan</th>
                        <th>Merk Mobil</th>
                        <th>Tgl Sewa</th>
                        <th>Tgl Kembali</th>
                        <th>Total Harga</th>
                        <th>Bayar</th>
                        <th>Sisa Bayar</th>
                        <th>Status Bayar</th>
                        <th>Status Mobil</th>
                        <th>
                          Action
                        </th>
                      </center>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT sewa.*, pelanggan.Nama_Pelanggan, mobil.MerkMobil, detail_sewa.Tgl_Kembali,  detail_sewa.tanggal_pengembalian, mobil.Status
                    FROM sewa
                    JOIN pelanggan ON pelanggan.NIK = sewa.NIK
                    JOIN detail_sewa ON detail_sewa.id_sewa = sewa.id_sewa
                    JOIN mobil ON mobil.Nopol = detail_sewa.Nopol
                    WHERE mobil.Status ='mobil sedang disewa'
                    ORDER BY sewa.id_Sewa ASC";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                      $no = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . $row['id_Sewa'] . "</td>";
                        echo "<td>" . $row['Nama_Pelanggan'] . "</td>";
                        echo "<td>" . $row['MerkMobil'] . "</td>";
                        echo "<td>" . $row['Tgl_sewa'] . "</td>";
                        echo "<td>" . $row['Tgl_Kembali'] . "</td>";
                        echo "<td>" . $row['Total_Harga'] . "</td>";
                        echo "<td>Rp " . number_format($row['bayar'], 0, ',', '.') . "</td>";
                        echo "<td>Rp " . number_format($row['Sisa yang harus dibayar'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['StatusBayar'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo '<td>
                    <center>
                    <a type="button" name="edit" value="Edit" data-toggle="modal"
          data-target="#editModal' . $row["id_Sewa"] . '" title="Edit Data ini"
          class="btn btn-sm buttonedit" style="background: darkslateblue;color:white;">
          <i class="fa fa-edit"></i>
          Edit
        </a>
                 <br><br>
                        <a href="hapus/hapusdatasewa.php?id=' . $row['id_Sewa'] . '&reqkarya=dell" title="Hapus Simpanan" class="btn btn-danger btn-sm alert_notif">
                            <span class="fa fa-trash-o"> Hapus</span>
                        </a>
                        
                    </center>
                </td>';
                        echo "</tr>";
                        $no++;
                      }
                    } else {
                      echo "<tr><td colspan='7'>Tidak ada data mobil.</td></tr>";
                    }
                    ?>
                    <?php
                    if ($result) {
                      mysqli_data_seek($result, 0); // Kembali ke awal hasil query
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div id="editModal' . $row["id_Sewa"] . '" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Edit Data Mobil</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form action="edit/editdatasewa.php" method="post" id="update' . $row["id_Sewa"] . '" enctype="multipart/form-data">
                                                  <label>Id Sewa</label>  
                                                  <input type="text" value="' . $row["id_Sewa"] . '" name="id" id="id' . $row["id_Sewa"] . '" class="form-control" readonly>
                                                  <br>
                                                  <label>Total Harga</label>
                                                  <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" required name="total" id="total' . $row["id_Sewa"] . '" value="' . $row["Total_Harga"] . '" class="form-control" readonly />
                                </div>
                                
                                                  <br />
                                                  <label>Bayar</label>
                                                  <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" required name="bayar" id="bayar' . $row["id_Sewa"] . '" value="' . $row["bayar"] . '" class="form-control" />
                                </div>
                                
                                                  <br />
                                                  <label>Sisa Bayar</label>
                                                  <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number" required name="sisa" id="sisa' . $row["id_Sewa"] . '" value="' . $row["Sisa yang harus dibayar"] . '" class="form-control" />
                                </div>
                                
                                                  <br />
                                                  <label>Status Bayar</label>
                                                  <select class="form-control" name="stbyr" id="stbyr' . $row["id_Sewa"] . '">
                                  <option value="Lunas" ' . ($row["StatusBayar"] == "Lunas" ? 'selected' : '') . '>Lunas</option>
                                  <option value="Kurang" ' . ($row["StatusBayar"] == "Kurang" ? 'selected' : '') . '>Kurang</option>
                                  <!-- Tambahkan pilihan lainnya sesuai kebutuhan Anda -->
                                </select><br />
                                                  <input type="submit" name="update" id="update' . $row["id_Sewa"] . '" value="Update" class="btn btn-success" onMouseOver="this.style.backgroundColor=\'#00796b\'" onMouseOut="this.style.backgroundColor=\'#4CAF50\'" />
                                              </form>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor=\'#ff6666\'" onMouseOut="this.style.backgroundColor=\'white\'" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>';
                      }
                    }
                    ?>
                  </tbody>


                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- .animated -->
    </div>
    <!-- .content -->

    <div class="clearfix"></div>

    <footer class="site-footer">
      <div class="footer-inner bg-white">
        <div class="row">
          <div class="col-sm-6">Copyright &copy; 2023 TEAM 1 MIF D</div>
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
  <script src="sweetallert/sweetalert2.min.js"></script>


  <?php if (@$_SESSION['editdatasewa']) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Data Berhasil Di Ubah',
        timer: 2000,
        showConfirmButton: false
      })
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['editdatasewa']);
  } ?>
  <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
  <?php if (@$_SESSION['eroreditdatasewa']) { ?>
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
  <?php unset($_SESSION['eroreditdatasewa']);
  } ?>
  <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
  <?php if (@$_SESSION['suksessss']) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Data Berhasil Di Hapus',
        timer: 2000,
        showConfirmButton: false
      })
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
  <?php unset($_SESSION['suksessss']);
  } ?>

  <script>
    $('.alert_notif').on('click', function() {
      var getLink = $(this).attr('href');
      Swal.fire({
        title: "Anda Yakin Menghapus Data Ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonColor: '#3085d6',
        cancelButtonText: "Cancel"

      }).then(result => {
        //jika klik ya maka arahkan ke proses.php
        if (result.isConfirmed) {
          window.location.href = getLink
        }
      })
      return false;
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#bootstrap-data-table-export").DataTable();
    });
  </script>
</body>


</html>