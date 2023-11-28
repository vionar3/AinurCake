<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

        .card-header {
            background: linear-gradient(to right, #2C3E50, #3498DB);
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .card-title {
            font-size: 32px;
            margin-bottom: 0;
        }

        .table tbody tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        .table tbody tr:hover {
            background-color: #d4e6f1;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table th {
            background-color: #3498DB;
            color: #fff;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #bdc3c7;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="card-header">
        <h1 class="card-title m-0">Laporan Bulanan Ainur Cake</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">S. No.</th>
                        <th scope="col">Tgl Pesan</th>
                        <th scope="col">Tgl Kirim</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Jumlah Item</th>
                        <th scope="col">Jumlah Harga</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../config.php');
                    require_once "controllerAdminData.php";

                    // Baca nilai bulan dari parameter URL
                    $selectedMonth = isset($_GET['month']) ? $_GET['month'] : 'all';

                    // Sesuaikan query SQL berdasarkan bulan yang dipilih
                    if ($selectedMonth == 'all') {
                        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                                    FROM cake_shop_orders o
                                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                                    GROUP BY o.orders_id";
                    } else {
                        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                                    FROM cake_shop_orders o
                                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                                    WHERE MONTH(o.order_date) = $selectedMonth
                                    GROUP BY o.orders_id";
                    }

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
                            <td>Rp <?php echo number_format($res['total_amount'], 0, ',', '.'); ?></td>
                            <td><?php echo $res['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>