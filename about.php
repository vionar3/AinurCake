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
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
</head>
<style>
    .card {
        border-radius: 25px;
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 100);
    }



    .background-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('uploads/About.jpg');
        background-size: cover;
        filter: blur(3px);
        filter: brightness(0.7);


        /* Mengatur tingkat blur, sesuaikan sesuai kebutuhan */
        z-index: -1;
        /* Menempatkan elemen di belakang konten lainnya */
    }
</style>

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
        <div class="container-fluid dashboard-content">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title text-white">About us</h2>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item "><a href="index.php" class="breadcrumb-link text-white">Home</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">About us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="a text-center">
                                <style>
                                    p {

                                        text-align: center;

                                    }
                                </style>

                                <p>

                                    "<i style="font-size: larger; font-family:  Helvetica; font-weight:bold; "> Ainur Cake </i>
                                    adalah bisnis katering kue yang menghadirkan keindahan dan kenikmatan dalam setiap gigitan melalui kue-kue yang lezat dan juga elegan. Sejak didirikan, toko kue Ainur selalu berkomitmen untuk menggabungkan estetika dan cita rasa dalam setiap kreasi kue yang dibuat.
                                    <br>
                                    Kami adalah bisnis katering kue yang sangat memperhatikan bahwa kue yang kami buat memiliki kualitas yang premium, desain kue yang cantik dan artistik, diilhami oleh keindahan seni estetika, dan kesesuaian desain sesuai tema yang diinginkan pelanggan untuk menciptakan kesan mendalam.

                                    Tidak hanya berfokus pada cita rasa yang diciptakan, tetapi kami selalu memberikan layanan terbaik kepada setiap pelanggan.
                                    <br>
                                    Kami ingin menjadi bagian dari momen-momen berharga anda, kami akan membantu anda menemukan kue yang terbaik untuk setiap momen istimewa dalam hidup anda.
                                    <br>
                                    Terimakasih telah memilih toko kue kami,Kami senang bisa menjadi bagian dari momen terbaik anda."
                                </p>
                                <b style="font-size: 20px;">
                                    - " AinurCake. "
                                </b>

                            </div> <a class="navbar-brand" href="#"><img src="uploads/logo.png" class="img-fluid" width="90" height="auto" alt="" style="margin-right: -30px;"> AinurCake</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <!-- <h1>Our Categories</h1> -->
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="owl-carousel owl-theme">
                    <?php
                    require_once('config.php');
                    $select = "SELECT * FROM cake_shop_category";
                    $query = mysqli_query($conn, $select);
                    while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="item">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $res['category_name']; ?></h3>
                                    <a href="shop.php?category=<?php echo $res['category_id']; ?>"><img class="card-img" src="uploads/<?php echo $res['category_image']; ?>"></a>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- </div>
    <div class="footer">

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <p> "Selamat menikmati kelezatan yang tak terlupakan dengan setiap gigitan kue kami! 🍰✨ </p>
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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                dots: 0,
                autoplay: 4000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            })
        });
    </script> -->
</body>

</html>