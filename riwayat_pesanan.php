<?php
session_start();

// Check if the session variables are set
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}

if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
    $users_id = $_SESSION['user_users_id']; // Move this line here to ensure 'user_users_id' is set.
} else {
    $printUsername = "None";
    $users_id = 0; // Set a default value or handle the absence of 'user_users_id'.
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AinurCake</title>
    <link rel="shortcut icon" href="uploads/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <style>
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('uploads/Contact.jpg');
            background-size: cover;
            filter: blur(3px);
            filter: brightness(0.7);


            /* Mengatur tingkat blur, sesuaikan sesuai kebutuhan */
            z-index: -1;
            /* Menempatkan elemen di belakang konten lainnya */
        }

        .card {
            border-radius: 25px;
            box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 100);

        }
    </style>
</head>

<body>
    <div class="background-image"></div>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#"><img src="uploads/logo.png" class="img-fluid" width="90" height="auto" alt="" style="margin-right: -20px;"> AinurCake</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars mx-3
"></i></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Belanja</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
                                <?php
                                require_once('config.php');
                                $select = "SELECT * FROM cake_shop_category";
                                $query = mysqli_query($conn, $select);
                                while ($res = mysqli_fetch_assoc($query)) {
                                ?>
                                    <a class="dropdown-item" href="shop.php?category=<?php echo $res['category_id']; ?>">
                                        <?php echo $res['category_name']; ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="riwayat_pesanan.php">Pesanan Anda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Kontak</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="account_users.php"><i class="fas fa-user mr-2"></i>Akun</a>
                                <a class="dropdown-item" href="login_users.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="logout_users.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                <a class="dropdown-item" href="../onlinecakeshop/admin/index.php"><i class="fas fa-id-card mr-2"></i>Admin Panel</a>
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
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="dashboard-wrapper"> -->
        <div class="hai dashboard-content">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 style="color: white;" class="pageheader-title">Riwayat Pesanan</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li style="color: white;" class="breadcrumb-item"><a href="index.php" class="breadcrumb-link text-white">Home</a></li>
                                    <li style="color: white;" class="breadcrumb-item active" aria-current="page">Pesanan Anda</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row mx-5">
                <?php
                if ($users_id === 0) {
                    echo '<h2 style="color: white; text-align: center;">Data tidak ada</h2>';
                }
                ?>
                <?php
                $select = "SELECT cake_shop_orders.orders_id, cake_shop_orders.order_date, cake_shop_orders.delivery_date, 
                GROUP_CONCAT(CONCAT(cake_shop_orders_detail.product_name, ' ', cake_shop_orders_detail.quantity) SEPARATOR ', ') as product_details,
                cake_shop_orders.payment_method, cake_shop_orders.total_amount, cake_shop_orders.status
                FROM cake_shop_orders 
                JOIN cake_shop_orders_detail ON cake_shop_orders.orders_id = cake_shop_orders_detail.orders_id 
                WHERE cake_shop_orders.users_id = $users_id
                GROUP BY cake_shop_orders.orders_id";
                $query = mysqli_query($conn, $select);

                // Check if the query was successful before attempting to fetch results
                if ($query) {
                    if (mysqli_num_rows($query) > 0) {
                        while ($res = mysqli_fetch_assoc($query)) {
                ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Pesanan Anda</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" id="orderDate_<?php echo $res['orders_id']; ?>"><strong>Tanggal Pesan :</strong> <?php echo $res['order_date']; ?></li>
                                            <li class="list-group-item" id="deliveryDate_<?php echo $res['orders_id']; ?>"><strong>Tanggal Kirim:</strong> <?php echo $res['delivery_date']; ?></li>
                                            <li class="list-group-item" id="productDetails_<?php echo $res['orders_id']; ?>"><strong>Detail Produk:</strong> <?php echo $res['product_details']; ?></li>
                                            <li class="list-group-item" id="paymentMethod_<?php echo $res['orders_id']; ?>"><strong>Metode Pembayaran:</strong> <?php echo $res['payment_method']; ?></li>
                                            <li class="list-group-item" id="totalAmount_<?php echo $res['orders_id']; ?>"><strong>Jumlah Total:</strong> Rp <?php echo $res['total_amount']; ?></li>
                                            <li class="list-group-item" id="status_<?php echo $res['orders_id']; ?>"><strong>Status:</strong> Rp <?php echo $res['status']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                        // Handle case where no orders are found
                        echo '<div class="col-12"><p>No orders found.</p></div>';
                    }
                } else {
                    // Handle query error
                    echo '<div class="col-12"><p>Error executing query: ' . mysqli_error($conn) . '</p></div>';
                }
                ?>
            </div>





        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
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
        </div> -->
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
        <!-- </div> -->
</body>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/main-js.js"></script>


</html>