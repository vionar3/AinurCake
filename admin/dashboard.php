<?php
if (isset($_GET['login_success']) && $_GET['login_success'] == 1) {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'Loggin Succes',
            text: 'Welcome',
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                // Redirect to dashboard.php
                window.location.href = 'dashboard.php';
            }
        });
    });
</script>";
}
?>
<?php
session_start();
if (isset($_SESSION['user_admin_id']) && $_SESSION['user_admin_id'] != null) {
    $admin_username = $_SESSION['user_admin_username'];
?>

    <?php
    require_once('../config.php');

    $user = mysqli_query($conn, "SELECT * FROM cake_shop_users_registrations");
    $user = mysqli_num_rows($user);

    $pengeluaran_hari_ini = mysqli_query($conn, "SELECT jumlah FROM pengeluaran where tgl_pengeluaran = CURDATE()");
    $pengeluaran_hari_ini = mysqli_fetch_array($pengeluaran_hari_ini);

    $pemasukan_hari_ini = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders where order_date = CURDATE()");
    $pemasukan_hari_ini = mysqli_fetch_array($pemasukan_hari_ini);



    $pemasukan = mysqli_query($conn, "SELECT * FROM cake_shop_orders");
    while ($masuk = mysqli_fetch_array($pemasukan)) {
        $arraymasuk[] = $masuk['total_amount'];
    }
    $jumlahmasuk = array_sum($arraymasuk);


    $pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran");
    while ($keluar = mysqli_fetch_array($pengeluaran)) {
        $arraykeluar[] = $keluar['jumlah'];
    }
    $jumlahkeluar = array_sum($arraykeluar);


    $uang = $jumlahmasuk - $jumlahkeluar;

    //untuk data chart area



    $sekarang = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE()");
    $sekarang = mysqli_fetch_array($sekarang);

    $satuhari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 1 DAY");
    $satuhari = mysqli_fetch_array($satuhari);


    $duahari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 2 DAY");
    $duahari = mysqli_fetch_array($duahari);

    $tigahari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 3 DAY");
    $tigahari = mysqli_fetch_array($tigahari);

    $empathari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 4 DAY");
    $empathari = mysqli_fetch_array($empathari);

    $limahari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 5 DAY");
    $limahari = mysqli_fetch_array($limahari);

    $enamhari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 6 DAY");
    $enamhari = mysqli_fetch_array($enamhari);

    $tujuhhari = mysqli_query($conn, "SELECT total_amount FROM cake_shop_orders
WHERE order_date = CURDATE() - INTERVAL 7 DAY");
    $tujuhhari = mysqli_fetch_array($tujuhhari);
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
                                    <a class="nav-link active" href="dashboard.php"><i class="fa fa-fw fa-rocket"></i>Dashboard</a>
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
                                <h2 class="pageheader-title">Dashboard</h2>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Overview</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->

                    <iframe title="Report Section" width="100%" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiOWMxNDdkYmEtYjc0Mi00NTc4LTk2YWUtZjllMWY4MTk5MmE4IiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>

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
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <!-- <script src="../js/mychart.js"></script> -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
            <script src="../vendor/chart.js/Chart.min.js"></script>
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

            <script type="text/javascript">
                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';
                // Pie Chart Example
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ["Pendapatan", "Pengeluaran", "Sisa"],
                        datasets: [{
                            data: [<?php echo $jumlahmasuk / 100000 ?>, <?php echo $jumlahkeluar / 100000 ?>, <?php echo $uang / 100000 ?>],
                            backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
                            hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: false
                        },
                        cutoutPercentage: 80,
                    },
                });
            </script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>