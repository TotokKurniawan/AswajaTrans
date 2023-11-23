<?php
session_start();
require_once("koneksi.php");
$sql = "SELECT * FROM user WHERE Username = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']); // Assuming 'Username' is a string, change the "s" if it's an integer

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $userData = mysqli_fetch_assoc($result);
} else {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
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
    <title>My Profile</title>
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">MY PROFILE</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php
                                            $query = "SELECT Foto FROM User WHERE Username = '" . $_SESSION['username'] . "'";
                                            $result = mysqli_query($conn, $query);

                                            if ($result) {
                                                $row = mysqli_fetch_assoc($result);
                                                $urlFoto = $row['Foto'];

                                                if (!is_null($urlFoto)) {
                                                    $urlFoto = str_replace($_SERVER['DOCUMENT_ROOT'], '', $urlFoto);
                                                    echo '<img alt="" src="' . $urlFoto . '" class="img-thumbnail img-fluid" ">';
                                                } else {
                                                    echo '<img alt="" src="assets/images/polije.png" class="img-thumbnail img-fluid" >';
                                                }
                                            } else {
                                                echo 'Error dalam menjalankan query: ' . mysqli_error($conn);
                                            }

                                            ?>

                                        </div>


                                    </div>

                                </div>
                                <div class="col-sm-9 mt-2 text-center"> <!-- Use text-center class for centering content -->
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="col-4">Username</th>
                                            <th>:</th>
                                            <td><?php echo $userData['Username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Nama Lengkap</th>
                                            <th>:</th>
                                            <td><?php echo $userData['Nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Password</th>
                                            <th>:</th>
                                            <td>********</td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Hint</th>
                                            <th>:</th>
                                            <td><?php echo $userData['Hint']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-4">Jawaban Hint</th>
                                            <th>:</th>
                                            <td><?php echo $userData['JawabanHint']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <!-- Button to trigger the modal -->
                                                <a type="button" name="edit" data-toggle="modal" data-target="#editModal<?php echo $userData['Username']; ?>" title="Edit Data" class="btn btn-sm" style="background: darkslateblue;color:white;">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <footer class="site-footer">
                        <div class="footer-inner bg-white">
                            <div class="row">
                                <div class="col-sm-12 ">Copyright &copy; 2023 TEAM 1 MIF D</div>
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
<?php if (@$_SESSION['myprofile']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data Berhasil Diubah',
            timer: 2000,
            showConfirmButton: false
        })
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['myprofile']);
} ?>

<?php if (@$_SESSION['myprofileerror']) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data Berhasil Diubah',
            timer: 2000,
            showConfirmButton: false
        })
    </script>
    <!-- agar sweet alert tidak muncul lagi saat di refresh -->
<?php unset($_SESSION['myprofileerror']);
} ?>

</html>
<!-- Modal for Editing -->
<div class="modal fade" id="editModal<?php echo $userData['Username']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Admin</h4>
            </div>
            <div class="modal-body">
                <form action="edit/edituser.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo $userData['id']; ?>" hidden />
                    <label>Full Name</label>
                    <input type="text" required name="name" value="<?php echo $userData['Nama']; ?>" class="form-control" />
                    <br />
                    <label>Username</label>
                    <input type="text" required name="usera" value="<?php echo $userData['Username']; ?>" class="form-control" />
                    <br />
                    <label>Hint</label>
                    <select class="form-control" name="hint">
                        <option value="">Choose One Hint</option>
                        <option value="Siapa Nama Ayahmu ??">Siapa Nama Ayahmu ?? </option>
                        <option value="Siapa Nama Ibumu ??">Siapa Nama Ibumu ??</option>
                        <option value="Apa Warna Kesukaanmu ??">Apa Warna Kesukaanmu ??</option>
                        <option value="Apa Makanan Kesukaanmu ??">Apa Makanan Kesukaanmu ??</option>
                        <!-- Tambahkan pilihan lainnya sesuai kebutuhan Anda -->
                    </select>
                    <br />
                    <label>Jawaban Hint</label>
                    <input type="text" name="jawab" value="<?php echo $userData['JawabanHint']; ?>" class="form-control" />
                    <br />
                    <label>Password</label>
                    <input type="password" name="pass" required placeholder="*********" class="form-control" />
                    <br />
                    <label for="foto">Foto Profil</label><br>
                    <input type="file" name="foto" id="foto"><br />
                    <br>
                    <input type="submit" name="update" value="Save" class="btn btn-success" />
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor='#ff6666'" onMouseOut="this.style.backgroundColor='white'" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>