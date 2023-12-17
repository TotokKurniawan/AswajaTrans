<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Cetak Bulanan </title>

    <link rel="apple-touch-icon" href="../assets/img/istockphoto-669053856-170667a.jpg" />
    <link rel="shortcut icon" href="../assets/img/istockphoto-669053856-170667a.jpg" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body onload="window.print();">

    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> ASWAJA TRANS
                        <small class="pull-right">Tanggal: <?php echo date('d F Y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <h1 class="text-center" style="align-items: center;">LAPORAN BULANAN</h1>
                <div class="table-responsive table-bordered" style="width: 100%;">
                    <?php
                    include '../koneksi.php';
                    include '../fungsi/funct.php';

                    if (isset($_GET['bln']) && !empty($_GET['bln'])) {
                        $bln = mysqli_real_escape_string($conn, $_GET['bln']);

                        $sql = $conn->prepare("SELECT DISTINCT sewa.*, mobil.MerkMobil, detail_sewa.Tgl_Kembali
                              FROM sewa
                              JOIN detail_sewa ON sewa.id_Sewa = detail_sewa.id_Sewa
                              JOIN mobil ON mobil.Nopol = detail_sewa.Nopol
                              WHERE MONTH(Tgl_sewa) = ?");

                        $sql->bind_param("s", $bln);
                        $sql->execute();

                        $result = $sql->get_result();
                    ?>
                        <table class="table table-striped " style="width: 100%;">
                            <thead>
                                <tr class="warning">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td>
                                            <center><?php echo isset($data['id_Sewa']) ? $data['id_Sewa'] : ''; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo isset($data['MerkMobil']) ? $data['MerkMobil'] : ''; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo isset($data['Tgl_sewa']) ? $data['Tgl_sewa'] : ''; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo isset($data['Tgl_Kembali']) ? $data['Tgl_Kembali'] : ''; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo isset($data['bayar']) ? 'Rp ' . number_format($data['bayar'], 0, ',', '.') : ''; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo isset($data['Total_Harga']) ? 'Rp ' . number_format($data['Total_Harga'], 0, ',', '.') : ''; ?></center>
                                        </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>

                    <?php
                    } else {
                        // Jika bln tidak di-set atau kosong, tampilkan pesan atau tindakan yang sesuai
                        echo "Bulan tidak valid.";
                    }
                    ?>
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

</body>

</html>