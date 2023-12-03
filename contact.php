<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
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
                            <a class="nav-link active" href="index.php">Home</a>
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
                            <a class="nav-link" href="riwayat_pesanan.php">Pesanan Anda</a>
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
                        <h2 style="color: white;" class="pageheader-title">Contact</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li style="color: white;" class="breadcrumb-item"><a href="index.php" class="breadcrumb-link text-white">Home</a></li>
                                    <li style="color: white;" class="breadcrumb-item active" aria-current="page">Contact us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5 justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 text-center">
                    <div class="card">

                        <div class="card-body ">
                            <iframe src="https://maps.google.com/maps?q=-7.687958302408497,%20114.03162026254083&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" style="width: 490px; height: 400px;" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            <h3 class="text-secondary font-bold mt-3 text-center">Address:</h3>
                            <p class="text-secondary font-italic text-center">
                                Curahjeru Tengah ,Curah Jeru,Kec.Paji ,Kabupaten Situbondo,Jawa Timur 68323
                            <h3 class="text-secondary font-bold mt-3 text-center">Email:</h3>
                            <p class="text-secondary font-bold text-center">
                                ainurcake@gmail.com
                            <h3 class="text-secondary font-bold mt-3 text-center">Call on:</h3>
                            <p class="text-secondary font-italic text-center">
                                088248378452 (Irfan)
                            </p>
                        </div>
                    </div>
                </div>
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