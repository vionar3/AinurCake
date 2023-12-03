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
                                    <a class="nav-link" href="pengeluaran.php"><i class="fas fa-fw fa-arrow-down
"></i>Pengeluaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="laporan_bulanan.php"><i class="fas fa-table
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
                                <h2 class="pageheader-title">Laporan Bulanan</h2>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Laporan Bulanan</li>
                                        </ol>
                                    </nav>
                                    <div class="col-lg-12 col-12 text-right">
                                        <a href="javascript:void(0);" id="print" class="btn btn-sm btn-primary" onclick="printReport()"><i class="fa fa-print"></i> Print</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Kelola Order</h5>
                                <div class="card-body">
                                    <div class="form-group d-flex">
                                        <select class="form-control" id="monthFilter" style="width: 20%;">
                                            <!-- <option value="00" selected disabled hidden>pilih</option> -->
                                            <option value="all">All Data</option>
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
                                        <button class="btn btn-primary ml-2" onclick="tampilkanData()">Show</button>
                                    </div>
                                    <!-- <br><br> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first" id="orderTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Tanggal pemesanan</th>
                                                    <th>Tanggal pengiriman</th>
                                                    <th>nama user</th>
                                                    <th>Metode pembayaran</th>
                                                    <th>Total jumlah</th>
                                                    <th>Total harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once('../config.php');
                                                $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                                                FROM cake_shop_orders o
                                                INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                                                LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                                                GROUP BY o.orders_id"; // Menggunakan LEFT JOIN dan GROUP BY untuk menghitung total quantity
                                                $query = mysqli_query($conn, $select);
                                                $i = 1;
                                                while ($res = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $res['order_date']; ?></td>
                                                        <td><?php echo $res['delivery_date']; ?></td>
                                                        <td><?php echo $res['users_username']; ?></td>
                                                        <td><?php echo $res['payment_method']; ?></td>
                                                        <td><?php echo $res['total_quantity']; ?></td>
                                                        <td>Rp <?php echo $res['total_amount']; ?></td>
                                                        <td><?php echo $res['status']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Tanggal pemesanan</th>
                                                    <th>Tanggal pengiriman</th>
                                                    <th>nama user</th>
                                                    <th>Metode pembayaran</th>
                                                    <th>Total jumlah</th>
                                                    <th>Total harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <script src="../js/jquery-3.3.1.min.js"></script>
            <script src="../js/bootstrap.bundle.js"></script>
            <script src="../js/jquery.slimscroll.js"></script>
            <script src="../js/main-js.js"></script>
            <script src="../js/jquery.dataTables.min.js"></script>
            <script src="../js/dataTables.bootstrap4.min.js"></script>
            <script src="../js/data-table.js"></script>
            <script>
                function tampilkanData() {
                    var selectedMonth = document.getElementById("monthFilter").value;
                    var printButton = $("#print");

                    $.ajax({
                        url: 'getDataByMonth.php',
                        type: 'GET',
                        data: {
                            month: selectedMonth
                        },
                        success: function(data) {
                            if (data.trim() === 'Data not found') {
                                $('#orderTable thead').hide();
                                $('#orderTable thead').hide();
                                $('#orderTable tfoot').hide();
                                $('#orderTable tbody').html('<tr><td colspan="8">Data tidak ditemukan</td></tr>');
                                printButton.hide();
                            } else {
                                $('#orderTable thead').show();
                                $('#orderTable tfoot').show();
                                $('#orderTable tbody').html(data);
                                printButton.show();
                            }
                        }
                    });
                }

                function printReport() {
                    var selectedMonth = document.getElementById("monthFilter").value;

                    // Check if data is found before opening the new tab
                    $.ajax({
                        url: 'getDataByMonth.php',
                        type: 'GET',
                        data: {
                            month: selectedMonth
                        },
                        success: function(data) {
                            if (data.trim() === 'Data not found') {
                                Swal.fire({
                                    position: 'top',
                                    // icon: "error",
                                    title: "Oops...",
                                    text: "Maaf data tidak ditemukan!",
                                });
                            } else {
                                window.open('print_report.php?month=' + selectedMonth, '_blank');
                            }
                        }
                    });
                }
            </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>