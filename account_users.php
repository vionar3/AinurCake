<?php
if (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
    echo "<script>alert('Edited details!')</script>";
    echo "<script>window.location.assign('account_users.php')</script>";
}
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $printUsername = $_SESSION['user_users_username'];
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
        <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
        <style>
            .hai {
                position: relative;
            }

            .background-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('uploads/akunuser2.jpg');
                background-size: 100% auto;
                filter: blur(5px);
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
            <div class=" hai dashboard-content">
                <div class="background-image"></div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class=" text-white pageheader-title">Users Account</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class=" text-white breadcrumb-item"><a href="index.php" class="breadcrumb-link text-white">Home</a></li>
                                        <li class=" text-white breadcrumb-item active" aria-current="page ">Users account</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        require_once("config.php");
                        $users_id = $_SESSION['user_users_id'];
                        $select = "SELECT * FROM cake_shop_users_registrations where users_id = $users_id";
                        $query = mysqli_query($conn, $select);
                        $res = mysqli_fetch_assoc($query);
                        ?>
                        <form id="form" class="splash-container" method="post" action="update_users.php">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <!-- <div class="form-group">
                                            <label for="profile_image">Profile Image:</label>
                                            <input class="form-control-file" type="file" name="profile_image" id="profile_image">
                                        </div>

                                         
                                         <div class="form-group pt-2">
                                            <input type="hidden" value="<?php echo $res['users_id']; ?>" name="hidden_users_id">
                                            <button class="btn btn-block btn-primary" type="submit">Change</button>
                                        </div>
                                    </div> -->
                                        <input class="form-control form-control-lg" type="text" name="users_username" required="" autocomplete="off" value="<?php echo $res['users_username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="email" name="users_email" required="" autocomplete="off" value="<?php echo $res['users_email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="password" name="users_password" autocomplete="off" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="password" name="confirm_password" autocomplete="off" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="tel" name="users_mobile" required="" pattern="\+?[0-9]{8,13}" autocomplete="off" value="<?php echo $res['users_mobile']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" name="users_address" required="" autocomplete="off" value="<?php echo $res['users_address']; ?>">
                                    </div>
                                    <div class="form-group pt-2">
                                        <input type="hidden" value="<?php echo $res['users_id']; ?>" name="hidden_users_id">
                                        <button class="btn btn-block btn-primary" type="submit">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>
        <script src="js/data-table.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: login_users.php");
}
?>