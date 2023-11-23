<?php
session_start();
require_once("koneksi.php");
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
  <title>Detail Sewa</title>
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
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
        <div class="row m-0">
          <div class="col-sm-4">
            <div class="page-header float-left">
              <div class="page-title">
                <h1>DETAIL SEWA</h1>
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
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <center>
                        <th>Kd Struk</th>
                        <th>Nopol</th>
                        <th>Merk Mobil</th>
                        <th>Tgl Kembali</th>
                        <th>Lama Pinjam</th>
                        <th>Tgl Pengembalian</th>
                        <th>Subtotal</th>
                        <th>Denda</th>
                        <th>Keterangan</th>
                        <th>
                          Action
                        </th>
                      </center>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    // Query SQL untuk mengambil data mobil
                    $sql = "SELECT detail_sewa.*, mobil.MerkMobil from detail_sewa
                    JOIN mobil ON mobil.Nopol = detail_sewa.Nopol
                    ORDER BY detail_sewa.id_Sewa ASC";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                      $no = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . $row['id_Sewa'] . "</td>";
                        echo "<td>" . $row['Nopol'] . "</td>";
                        echo "<td>" . $row['MerkMobil'] . "</td>";
                        echo "<td>" . $row['Tgl_Kembali'] . "</td>";
                        echo "<td>" . $row['Lama_Pinjam'] . ' hari' . "</td>";
                        echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                        echo "<td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>";
                        echo "<td>Rp " . number_format($row['Denda'], 0, ',', '.') . "</td>";
                        echo "<td>" . $row['Keterangan'] . "</td>";
                        echo '<td>
                    <center>
                        <a  type="button" name="detail" value="detail" data-toggle="modal"
                            data-target="#detailModal' . $row["id_Sewa"] . '" title="Detail Data ini"
                            class="btn btn-warning"><i
                                class="fa fa-edit "></i>
                            Edit
                        </a>
                    </center>
                </td>';
                        echo "</tr>";
                        $no++;
                      }
                    } else {
                      echo "<tr><td colspan='7'>Tidak ada data mobil.</td></tr>";
                    }

                    // Tutup koneksi ke database
                    mysqli_close($conn);
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
  <script type="text/javascript">
    $(document).ready(function() {
      $("#bootstrap-data-table-export").DataTable();
    });
  </script>
</body>


<?php if (@$_SESSION['editdatetailsewa']) { ?>
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
<?php unset($_SESSION['editdatetailsewa']);
} ?>
<!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
        di dalam session sukses  -->
<?php if (@$_SESSION['eroreditdetailsewa']) { ?>
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
<?php unset($_SESSION['eroreditdetailsewa']);
} ?>

</html>
<?php
// Menampilkan modal edit untuk setiap data mobil
if ($result) {
  mysqli_data_seek($result, 0); // Kembali ke awal hasil query
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div id="detailModal' . $row["id_Sewa"] . '" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Data Mobil</h4>
                  </div>
                    <div class="modal-body">
                      <form action="edit/editdetailsewa.php" method="post" id="update' . $row["id_Sewa"] . '" enctype="multipart/form-data">
                        <label >Id Sewa</label>
                        <input type="text" required value="' . $row["id_Sewa"] . '" name="id" id="id' . $row["id_Sewa"] . '" class="form-control" readonly>
                        <br>
                        <label> Nopol</label>
                        <input type="text" required value="' . $row["id_Sewa"] . '" name="nopol" id="nopol' . $row["Nopol"] . '" class="form-control" readonly>
                        <br>
                        <label>Tanggal Kembali</label>
                        <input type="date" required name="tglkembali" id="tglkembali' . $row["id_Sewa"] . '" value="' . $row["Tgl_Kembali"] . '" class="form-control" readonly />
                        <br />
                        <label>Tanggal Pengembalian</label>
                        <input type="date" required name="tglpengembalian" id="tglpengembalian' . $row["id_Sewa"] . '" value="' . $row["tanggal_pengembalian"] . '" class="form-control" />
                        <br />
                        <label>Denda</label>
                        <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input type="number"  name="denda" id="denda' . $row["id_Sewa"] . '" value="' . $row["Denda"] . '" class="form-control" />
                        </div>
                        <br />
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan' . $row["id_Sewa"] . '" value="' . $row["Keterangan"] . '" class="form-control" />
                        <br />
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