<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}

if (!empty($_SESSION['user_users_id']) && !empty($_SESSION['user_users_username'])) {
    $userID = $_SESSION['user_users_id'];
    $printUsername = $_SESSION['user_users_username'];
} else {
    $printUsername = "None";
}
?>
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
    <!-- <link rel="stylesheet" href="css/uploadImage.css"> -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
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
                            <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
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
                            <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i> <span class="badge badge-pill badge-secondary"><?php echo $printCount; ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="uploads/default-image.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $printUsername; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="account_users.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="login_users.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                <a class="dropdown-item" href="logout_users.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                        <h2 class="pageheader-title">Pesanan Anda</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item"><a href="cart.php" class="breadcrumb-link">Keranjang</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pesanan Anda.</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php
                    $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, GROUP_CONCAT(CONCAT(od.product_name, ' ', od.quantity) SEPARATOR ', ') as product_details
                    FROM cake_shop_orders o
                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                    INNER JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                    WHERE o.users_id = '$userID'
                    AND o.orders_id = (SELECT MAX(orders_id) FROM cake_shop_orders WHERE users_id = '$userID')";
                    $query = mysqli_query($conn, $select);

                    // Check if the query was successful before attempting to fetch results
                    if ($query) {
                        if (mysqli_num_rows($query) > 0) {
                            while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Pesanan Anda</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" id="orderDate_<?php echo $res['orders_id']; ?>"><strong>Tanggal Pesan :</strong> <?php echo $res['order_date']; ?></li>
                                            <li class="list-group-item" id="deliveryDate_<?php echo $res['orders_id']; ?>"><strong>Tanggal Kirim:</strong> <?php echo $res['delivery_date']; ?></li>
                                            <li class="list-group-item" id="userName_<?php echo $res['orders_id']; ?>"><strong>Nama Client:</strong> <?php echo $res['users_username']; ?></li>
                                            <li class="list-group-item" id="productDetails_<?php echo $res['orders_id']; ?>"><strong>Detail Produk:</strong> <?php echo $res['product_details']; ?></li>
                                            <li class="list-group-item" id="paymentMethod_<?php echo $res['orders_id']; ?>"><strong>Metode Pembayaran:</strong> <?php echo $res['payment_method']; ?></li>
                                            <li class="list-group-item" id="totalAmount_<?php echo $res['orders_id']; ?>"><strong>Jumlah Total:</strong> Rp <?php echo $res['total_amount']; ?></li>
                                            <li class="list-group-item" id="status_<?php echo $res['orders_id']; ?>"><strong>Status:</strong> Rp <?php echo $res['status']; ?></li>
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <!-- <button data-toggle="modal" data-target="#ModalKonfirmasi" class="btn btn-success" onclick="confirm()">Konfirmasi</button> -->
                                        <button class="btn btn-success" onclick="confirmCash(<?php echo $res['orders_id']; ?>)">Konfirmasi</button>
                                    </div>
                                </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="ModalKonfirmasi" data-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="konfirmasi_pembayaran_card.php" id="form" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="uploads/bri2.jpg" class="img-fluid" alt="Bank Logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nomorRekening">Id Pesanan :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="idPesanan" name="idPesanan" value="<?php echo $res['orders_id']; ?>" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaRekening">Transfer Ke Rekening Ini :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="namaRekening" name="namaRekening" placeholder="IRFAN DIMAS RIYADI" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorRekening">Nomor Rekening :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="xxxx xxxx xxxx xx7" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customFile">Bukti Pembayaran</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="customFile" accept=".jpg, .jpeg, .png" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <!-- Additional input fields for client information -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="nama_rekening">Nama Rek Anda:</label>
                                    <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" placeholder="Masukkan nama" required>
                                </div>
                                <div class="col-md-6">
                                    <label for=nomer_rekening">No Rek Anda:</label>
                                    <input type="text" class="form-control" id="nomer_rekening" name="nomor_rekening" placeholder="Masukkan No" required>
                                </div>
                            </div>
                            <!-- End of additional input fields -->
                            <input type="hidden" name="hidden_konfirmasi" value="<?php echo $res['orders_id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <!-- <button type="reset" class="btn btn-secondary">Clear</button> -->
                            <button type="submit" name="submit_confirmation" class="btn btn-success">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
                            }
                        } else {
                            echo "No orders found for user with ID: $userID";
                        }
                    } else {
                        echo "Query failed: " . mysqli_error($conn);
                    }
?>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
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
    <!-- <script src="js/uploadImage.js"></script> -->
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        function confirm(ordersId) {
            // Mendapatkan informasi pesanan dari elemen-elemen di card pesanan
            var orderDate = getElementTextContent('orderDate_' + ordersId);
            var deliveryDate = getElementTextContent('deliveryDate_' + ordersId);
            var userName = getElementTextContent('userName_' + ordersId);
            var productDetails = getElementTextContent('productDetails_' + ordersId);
            var paymentMethod = getElementTextContent('paymentMethod_' + ordersId);
            var totalAmount = getElementTextContent('totalAmount_' + ordersId);
            var status = getElementTextContent('status_' + ordersId);

            // Membuat pesan yang akan dikirim ke WhatsApp
            var message = "Halo, sebelum melakukan pembayaran, saya ingin konfirmasi pesanan dengan ID " + ordersId +
                ". Detail pesanan:\n" +
                orderDate + "\n" +
                deliveryDate + "\n" +
                userName + "\n" +
                productDetails + "\n" +
                paymentMethod + "\n" +
                totalAmount + "\n" +
                status + "\n" +
                "Terima kasih!";

            // Membuka WhatsApp dengan nomor yang ditentukan dan pesan yang sudah dibuat
            window.open('https://wa.me/6285330812719?text=' + encodeURIComponent(message), '_blank');

        }

        function getElementTextContent(elementId) {
            var element = document.getElementById(elementId);
            return element ? element.textContent : '';
        }

        function confirmCash(ordersId) {
            // Menggunakan data yang sama seperti pada fungsi confirmCard
            confirm(ordersId);
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "konfirmasi_pembayaran_cash.php?orders_id=" + ordersId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log("Update request received for orders_id: " + ordersId);
                    console.log(xhr.responseText);
                    // Mengarahkan pengguna ke view_product.php setelah pembaruan selesai
                    window.location.href = 'cart.php';
                }
            };
            xhr.send();
        }

        function confirmCard(ordersId) {

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "konfirmasi_pembayaran_card.php?orders_id=" + ordersId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log("Update request received for orders_id: " + ordersId);
                    console.log(xhr.responseText);
                    // Mengarahkan pengguna ke view_product.php setelah pembaruan selesai
                    // window.location.href = 'cart.php';
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>