<?php
require_once("koneksi.php");
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['user'] = 'Anda harus login terlebih dahulu.';
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

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
                                <h1>Form Transaksi</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="admin.php">Dashboard</a></li>
                                    <li><a href="sewaUI.php">Forms</a></li>
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
                            <div class="card-header"><strong>Form Transaksi</strong></div>
                            <div class="card-body card-block">
                                <form id="myForm" action="insert/insertsewa2.php" method="post">
                                    <div class="form-group">
                                        <label for="company" class="form-control-label">Kode Transaksi</label>
                                        <input type="text" id="kode" name="kode" readonly value="<?php echo generateID2(); ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class="form-control-label">NIK - Nama Pelanggan</label>
                                        <select name="nik" id="nik" class="form-control">
                                            <?php
                                            $sql = "SELECT NIK, Nama_Pelanggan FROM pelanggan";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                echo '<option value="" disabled selected>Pilih Pelanggan</option>';

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row["NIK"] . "'>" . $row["NIK"] . " - " . $row["Nama_Pelanggan"] . "</option>";
                                                }
                                            } else {
                                                echo "Tidak ada data pelanggan";
                                            }

                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="street" class="form-control-label">Tanggal Sewa</label>
                                        <input type="text" id="tanggal-sewa" name="tanggal-sewa" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Bayar DP Sewa</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control" required id="bayar" name="bayar" onchange="updateSisaBayar()">
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        LANJUT PILIH MOBIL
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">Copyright &copy; 2023 TEAM 1 MIF D</div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

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

</body>


</html>
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

<script>
    function updateSubtotal() {
        var nopolDropdown = document.getElementById("nopol");
        var selectedOption = nopolDropdown.options[nopolDropdown.selectedIndex];
        var harga = selectedOption.getAttribute("data-harga");

        document.getElementById("subtotal").value = harga;
        updateTotalHarga(); // Panggil fungsi updateTotalHarga saat terjadi perubahan pada dropdown
    }

    function updateTotalHarga() {
        var lamapinjam = document.getElementById("lamapinjam").value;
        var subtotal = document.getElementById("subtotal").value;

        var totalHarga = lamapinjam * subtotal;

        document.getElementById("tothar").value = totalHarga;
        updateSisaBayar(); // Panggil fungsi updateSisaBayar saat terjadi perubahan pada total harga
    }

    function updateSisaBayar() {
        var totalHarga = document.getElementById("tothar").value;
        var bayar = document.getElementById("bayar").value;

        var sisaBayar = totalHarga - bayar;

        document.getElementById("sisa").value = sisaBayar;

        // Simpan nilai sisa bayar dalam hidden input untuk dikirimkan ke server
        document.getElementById("sisa1").value = sisaBayar;
    }

    // Panggil fungsi updateSubtotal saat halaman dimuat untuk menginisialisasi nilai subtotal
    document.addEventListener("DOMContentLoaded", updateSubtotal);
</script><?php
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