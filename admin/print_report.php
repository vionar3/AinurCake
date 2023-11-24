<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <style>
        .judul-surat {
            font-size: 13pt;
        }

        .full-width {
            width: 100%;
        }

        .line {
            height: 2px;
            /* border-top : 4px solid #000; */
            border-bottom: 2px solid #000
        }

        .m-0 {
            margin: 0;

        }

        .mt-0 {
            margin-top: 0 !important
        }

        .mb-0 {
            margin-bottom: 0 !important
        }

        @page {
            margin: 1cm 1.5cm
        }

        p {
            line-height: 1.3
        }

        .tab-space {
            display: inline-block;
            width: 40px;
        }
    </style>
</head>

<body>
    <div class="card-header">
        <h1>Laporan Bulanan Ainur Cake</h1>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">S. No.</th>
                        <th scope="col">tgl pesan</th>
                        <th scope="col">tgl kirim</th>
                        <th scope="col">customer</th>
                        <th scope="col">pembayaran</th>
                        <th scope="col">jumlah item</th>
                        <th scope="col">jumlah harga</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../config.php');
                    require_once "controllerAdminData.php";
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
                            <td><?php echo get_formatted_date($res['order_date']); ?></td>
                            <td><?php echo get_formatted_date($res['delivery_date']); ?></td>
                            <td><?php echo $res['users_username']; ?></td>
                            <td><?php echo $res['payment_method']; ?></td>
                            <td><?php echo $res['total_quantity']; ?></td>
                            <td>Rp <?php echo $res['total_amount']; ?></td>
                            <td><?php echo $res['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>