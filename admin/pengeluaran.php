<?php
require_once('../config.php');

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 1) {
  echo "<script>
  document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
          position: 'top',
          icon: 'success',
          title: 'Catatan edited!',
          showConfirmButton: false,
          timer: 1500
      });
  });
</script>";
}

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 2) {
  echo "<script>
  document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
          position: 'top',
          icon: 'success',
          title: 'Pengeluaran edited!',
          showConfirmButton: false,
          timer: 1500
      });
  });
</script>";
}

if (isset($_GET['edit_msg']) && $_GET['edit_msg'] == 3) {
  echo "<script>
  document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
          position: 'top',
          icon: 'success',
          title: 'Pengeluaran added!',
          showConfirmButton: false,
          timer: 1500
      });
  });
</script>";
}

$sekarang = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE()");
$sekarang = mysqli_fetch_array($sekarang);

$satuhari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 1 DAY");
$satuhari = mysqli_fetch_array($satuhari);


$duahari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 2 DAY");
$duahari = mysqli_fetch_array($duahari);

$tigahari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 3 DAY");
$tigahari = mysqli_fetch_array($tigahari);

$empathari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 4 DAY");
$empathari = mysqli_fetch_array($empathari);

$limahari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 5 DAY");
$limahari = mysqli_fetch_array($limahari);

$enamhari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 6 DAY");
$enamhari = mysqli_fetch_array($enamhari);

$tujuhhari = mysqli_query($conn, "SELECT jumlah FROM pengeluaran
WHERE tgl_pengeluaran = CURDATE() - INTERVAL 7 DAY");
$tujuhhari = mysqli_fetch_array($tujuhhari);
?>

<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
  $admin_username = $_SESSION['user_admin_username'];
?>

  <!doctype html>
  <html lang="en">


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AinurCake</title>
    <link rel="shortcut icon" href="../uploads/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/inputmask.css">
    <link rel="stylesheet" href="../sweetalert2/sweetalert2.min.css">
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
      <!-- ============================================================== -->
      <!-- navbar -->
      <!-- ============================================================== -->
      <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
          <a class="navbar-brand" href="#"><img src="../uploads/logo.png" class="img-fluid" width="90" height="auto" alt="" style="margin-right: -20px;"> AinurCake</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars mx-3
"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
              <li class="nav-item dropdown nav-user">
                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../uploads/User.png" alt="" class="user-avatar-md rounded-circle"></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                  <div class="nav-user-info">
                    <h5 class="mb-0 text-white nav-user-name"><?php echo $admin_username; ?></h5>
                    <span class="status"></span><span class="ml-2">Available</span>
                  </div>
                  <a class="dropdown-item" href="account_admin.php"><i class="fas fa-user mr-2"></i>Account</a>
                  <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- ============================================================== -->
      <!-- end navbar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- left sidebar -->
      <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-divider">
                  Menu
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="dashboard.php"><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="view_users.php"><i class="fa fa-fw fa-user-circle"></i>Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Category</a>
                  <div id="submenu-3" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="view_category.php">View category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="add_category.php">Add category</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-product-hunt
"></i>Products</a>
                  <div id="submenu-4" class="collapse submenu" style="">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="view_product.php">View products</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="add_product.php">Add products</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="view_orders.php"><i class="fas fa-shopping-cart
"></i>Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="pengeluaran.php"><i class="fas fa-fw fa-arrow-down
"></i>Pengeluaran</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="laporan_bulanan.php"><i class="fas fa-table
"></i>Laporan Bulanan</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end left sidebar -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- wrapper  -->
      <!-- ============================================================== -->
      <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
          <!-- ============================================================== -->
          <!-- pageheader -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h2 class="pageheader-title">Pengeluaran</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Keuangan</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- end pageheader -->
          <!-- ============================================================== -->

          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">Sumber Pengeluaran</h4>
                </div>
                <div class="card-body">
                  <?php
                  $namasumber1 = mysqli_query($conn, "SELECT * FROM `sumber` where id_sumber= 11 ");
                  $sumbern1 = mysqli_fetch_assoc($namasumber1);

                  $namasumber2 = mysqli_query($conn, "SELECT * FROM `sumber` where id_sumber= 12 ");
                  $sumbern2 = mysqli_fetch_assoc($namasumber2);

                  $namasumber3 = mysqli_query($conn, "SELECT * FROM `sumber` where id_sumber= 13 ");
                  $sumbern3 = mysqli_fetch_assoc($namasumber3);

                  $namasumber4 = mysqli_query($conn, "SELECT * FROM `sumber` where id_sumber= 14 ");
                  $sumbern4 = mysqli_fetch_assoc($namasumber4);

                  // $namasumber5 = mysqli_query($conn,"SELECT * FROM `sumber` where id_sumber= 10 ");
                  // $sumbern5= mysqli_fetch_assoc($namasumber5);

                  $hasil1 = mysqli_query($conn, "SELECT * FROM pengeluaran where id_sumber = 11");
                  while ($jumlah1 = mysqli_fetch_array($hasil1)) {
                    $arrayhasil1[] = $jumlah1['jumlah'];
                  }
                  $jumlahhasil1 = array_sum($arrayhasil1);

                  $hasil2 = mysqli_query($conn, "SELECT * FROM pengeluaran where id_sumber = 12");
                  while ($jumlah2 = mysqli_fetch_array($hasil2)) {
                    $arrayhasil2[] = $jumlah2['jumlah'];
                  }
                  $jumlahhasil2 = array_sum($arrayhasil2);

                  $hasil3 = mysqli_query($conn, "SELECT * FROM pengeluaran where id_sumber = 13");
                  while ($jumlah3 = mysqli_fetch_array($hasil3)) {
                    $arrayhasil3[] = $jumlah3['jumlah'];
                  }
                  $jumlahhasil3 = array_sum($arrayhasil3);

                  $hasil4 = mysqli_query($conn, "SELECT * FROM pengeluaran where id_sumber = 14");
                  while ($jumlah4 = mysqli_fetch_array($hasil4)) {
                    $arrayhasil4[] = $jumlah4['jumlah'];
                  }
                  $jumlahhasil4 = array_sum($arrayhasil4);

                  // $hasil5=mysqli_query($conn,"SELECT * FROM pengeluaran where id_sumber = 10");
                  // while ($jumlah5=mysqli_fetch_array($hasil5)){
                  // $arrayhasil5[] = $jumlah5['jumlah'];
                  // }
                  // $jumlahhasil5 = array_sum($arrayhasil5);

                  $sumber1 = mysqli_query($conn, "SELECT id_sumber FROM pengeluaran where id_sumber ='11'");
                  $sumber1text = mysqli_num_rows($sumber1);
                  $sumber1 = mysqli_num_rows($sumber1);
                  $sumber1 = $sumber1 * 4;

                  $sumber2 = mysqli_query($conn, "SELECT id_sumber FROM pengeluaran where id_sumber ='12'");
                  $sumber2text = mysqli_num_rows($sumber2);
                  $sumber2 = mysqli_num_rows($sumber2);
                  $sumber2 = $sumber2 * 4;

                  $sumber3 = mysqli_query($conn, "SELECT id_sumber FROM pengeluaran where id_sumber ='13'");
                  $sumber3text = mysqli_num_rows($sumber3);
                  $sumber3 = mysqli_num_rows($sumber3);
                  $sumber3 = $sumber3 * 4;

                  $sumber4 = mysqli_query($conn, "SELECT id_sumber FROM pengeluaran where id_sumber ='14'");
                  $sumber4text = mysqli_num_rows($sumber4);
                  $sumber4 = mysqli_num_rows($sumber4);
                  $sumber4 = $sumber4 * 4;

                  // $sumber5 = mysqli_query($conn,"SELECT id_sumber FROM pengeluaran where id_sumber ='10'");
                  // $sumber5text = mysqli_num_rows($sumber5);
                  // $sumber5 = mysqli_num_rows($sumber5);
                  // $sumber5 = $sumber5 * 10;



                  $no = 1;
                  echo '
                  <h4 class="small font-weight-bold">' . $sumbern1['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil1, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width:' . $sumber1 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber1text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern2['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil2, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width:' . $sumber2 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber2text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern3['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil3, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width:' . $sumber3 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber3text . ' Kali</div>
                  </div>
				  <h4 class="small font-weight-bold">' . $sumbern4['nama'] . '<span class="float-right">Rp. ' . number_format($jumlahhasil4, 2, ',', '.') . '</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $sumber4 . '%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">' . $sumber4text . ' Kali</div>
                  </div>';
                  ?>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h4 class="m-0 font-weight-bold text-primary">Catatan 1</h4>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <?php
                    $catatan = mysqli_query($conn, "SELECT catatan From catatan WHERE id_catatan = 3");
                    $catatan = mysqli_fetch_array($catatan);
                    echo $catatan['catatan'];
                    ?>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                  <h4 class="m-0 font-weight-bold text-primary">Catatan 2</h4>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
                    <?php
                    $catatan = mysqli_query($conn, "SELECT catatan From catatan WHERE id_catatan = 4");
                    $catatan = mysqli_fetch_array($catatan);
                    echo $catatan['catatan'];
                    ?>
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalCatatan"><i class="fa fa-edit"> Catatan</i></button><br>
            </div>
          </div>


          <!-- Area Chart -->
          <!-- <div class="col-xl-9 col-lg-7">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
              </div>
            </div>
          </div> -->


          <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Keluaran</i></button><br>
          <!-- DataTales Example -->
          <div class="row">
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary">Transaksi Keluar</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Pengeluaran</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Deskripsi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID Pengeluaran</th>
                          <th>Tanggal</th>
                          <th>Jumlah</th>
                          <th>Sumber</th>
                          <th>Deskripsi</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT pengeluaran.id_pengeluaran, pengeluaran.tgl_pengeluaran, pengeluaran.jumlah, pengeluaran.id_sumber, pengeluaran.deskripsi, sumber.nama AS nama_sumber
                        FROM pengeluaran
                        JOIN sumber ON pengeluaran.id_sumber = sumber.id_sumber");
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                          <tr>
                            <td><?= $data['id_pengeluaran'] ?></td>
                            <td><?= $data['tgl_pengeluaran'] ?></td>
                            <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                            <td><?= $data['nama_sumber'] ?></td>
                            <td><?= $data['deskripsi'] ?></td>
                            <td>
                              <!-- Button untuk modal -->
                              <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_pengeluaran']; ?>"></a>
                            </td>
                          </tr>
                          <!-- Modal Edit Mahasiswa-->
                          <div class="modal fade" id="myModal<?php echo $data['id_pengeluaran']; ?>" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Ubah Data Pengeluaran</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <form role="form" action="edit_pengeluaran.php" method="get">

                                    <?php
                                    $id = $data['id_pengeluaran'];
                                    $query_edit = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_pengeluaran='$id'");
                                    //$result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($query_edit)) {
                                    ?>


                                      <input type="hidden" name="id_pengeluaran" value="<?php echo $row['id_pengeluaran']; ?>">

                                      <div class="form-group">
                                        <label>Id</label>
                                        <input type="text" name="id_pengeluaran" class="form-control" value="<?php echo $row['id_pengeluaran']; ?>" disabled>
                                      </div>

                                      <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tgl_pengeluaran" class="form-control" value="<?php echo $row['tgl_pengeluaran']; ?>">
                                      </div>

                                      <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
                                      </div>

                                      <div class="form-group">
                                        <label>Sumber</label>
                                        <?php
                                        if ($row['id_sumber'] == 11) {
                                          $querynama1 = mysqli_query($conn, "SELECT nama FROM sumber where id_sumber=11");
                                          $querynama1 = mysqli_fetch_array($querynama1);
                                        } else if ($row['id_sumber'] == 12) {
                                          $querynama2 = mysqli_query($conn, "SELECT nama FROM sumber where id_sumber=12");
                                          $querynama2 = mysqli_fetch_array($querynama2);
                                        } else if ($row['id_sumber'] == 13) {
                                          $querynama3 = mysqli_query($conn, "SELECT nama FROM sumber where id_sumber=13");
                                          $querynama3 = mysqli_fetch_array($querynama3);
                                        } else if ($row['id_sumber'] == 14) {
                                          $querynama4 = mysqli_query($conn, "SELECT nama FROM sumber where id_sumber=14");
                                          $querynama4 = mysqli_fetch_array($querynama4);
                                        }
                                        ?>

                                        <select class="form-control" name='id_sumber'>
                                          <?php
                                          $queri = mysqli_query($conn, "SELECT * FROM sumber");
                                          $no = 11;
                                          $noo = 11;
                                          while ($querynama = mysqli_fetch_array($queri)) {

                                            echo '<option value="' . $no++ . '">' . $noo++ . '.' . $querynama["nama"] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control"><?php echo $row['deskripsi']; ?></textarea>
                                      </div>

                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        <button type="button" onclick="delete_peng(<?php echo $row['id_pengeluaran']; ?>)" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                      </div>
                                    <?php
                                    }
                                    //mysql_close($host);
                                    ?>

                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>



                          <!-- Modal -->
                          <div id="myModalTambah" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- konten modal-->
                              <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Tambah Pengeluaran</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- body modal -->
                                <form action="add_pengeluaran.php" method="get">
                                  <div class="modal-body">
                                    Tanggal :
                                    <input type="date" class="form-control" name="tgl_pengeluaran">
                                    Jumlah :
                                    <input type="number" class="form-control" name="jumlah">
                                    Sumber :
                                    <select class="form-control" name="sumber">
                                      <option value="11">11. Bahan Kue</option>
                                      <option value="12">12. Alat</option>
                                      <option value="13">13. Listrik</option>
                                      <option value="14">14. Lain-lain</option>
                                    </select>
                                    Deskripsi :
                                    <input type="text" class="form-control" name="deskripsi">
                                  </div>
                                  <!-- footer modal -->
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                              </div>
                            </div>
                          </div>
                  </div>

                  <!-- Modal -->
                  <div id="myModalCatatan" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- konten modal-->
                      <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Catatan</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="edit_catatan.php" method="get">
                          <div class="modal-body">
                            <?php
                            // Ambil data catatan dengan id_catatan 3
                            $query_catatan_3 = mysqli_query($conn, "SELECT catatan FROM catatan WHERE id_catatan = 3");
                            $row_catatan_3 = mysqli_fetch_assoc($query_catatan_3);
                            $catatan_3 = $row_catatan_3['catatan'];

                            // Ambil data catatan dengan id_catatan 4
                            $query_catatan_4 = mysqli_query($conn, "SELECT catatan FROM catatan WHERE id_catatan = 4");
                            $row_catatan_4 = mysqli_fetch_assoc($query_catatan_4);
                            $catatan_4 = $row_catatan_4['catatan'];
                            ?>
                            Catatan 1 :
                            <textarea name="catatan1" class="form-control"><?php echo $catatan_3; ?></textarea>
                            Catatan 2 :
                            <textarea name="catatan2" class="form-control"><?php echo $catatan_4; ?></textarea>

                          </div>
                          <!-- footer modal -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                      </div>
                    </div>
                  </div>

                <?php
                        }
                ?>
                </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>

      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <div class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              Copyright © 2023 Concept. Dashboard by D5
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
              <div class="text-md-right footer-links d-none d-sm-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- end footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->


    <!-- Optional JavaScript -->
    <!-- <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script> -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery.slimscroll.js"></script>
    <script src="../js/main-js.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/data-table.js"></script>
    <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.inputmask.bundle.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- Core plugin JavaScript
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script>
      function delete_peng(id_pengeluaran) {
        Swal.fire({
          position: 'top',
          title: "Do you want to delete?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            // Jika pengguna mengonfirmasi untuk menghapus
            Swal.fire({
              position: 'top',
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success",
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              // Arahkan ke delete_pengeluaran.php setelah konfirmasi pengguna
              window.location.href = "delete_pengeluaran.php?id_pengeluaran=" + id_pengeluaran;
            });
          }
        });
      }
    </script>
    <script type="text/javascript">
      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';

      function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
          prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
          sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
          dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
          s = '',
          toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
          };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
      }

      // Area Chart Example
      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["7 hari lalu", "6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
          datasets: [{
            label: "Pendapatan",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php echo $tujuhhari['0'] ?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return 'Rp.' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    </script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
}
?>