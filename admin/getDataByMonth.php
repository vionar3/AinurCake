<?php
require_once('../config.php');

if (isset($_GET['month'])) {
    $selectedMonth = $_GET['month'];

    // Check if "All" is selected
    if ($selectedMonth == 'all') {
        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                    FROM cake_shop_orders o
                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                    GROUP BY o.orders_id";
    } else {
        // Handle other months
        $select = "SELECT o.orders_id, u.users_username, o.order_date, o.delivery_date, o.payment_method, o.total_amount, o.status, SUM(od.quantity) AS total_quantity
                    FROM cake_shop_orders o
                    INNER JOIN cake_shop_users_registrations u ON o.users_id = u.users_id
                    LEFT JOIN cake_shop_orders_detail od ON o.orders_id = od.orders_id
                    WHERE MONTH(o.order_date) = $selectedMonth
                    GROUP BY o.orders_id";
    }

    $query = mysqli_query($conn, $select);

    if (mysqli_num_rows($query) > 0) {
        $i = 1;
        while ($res = mysqli_fetch_assoc($query)) {
            echo '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $res['order_date'] . '</td>
                    <td>' . $res['delivery_date'] . '</td>
                    <td>' . $res['users_username'] . '</td>
                    <td>' . $res['payment_method'] . '</td>
                    <td>' . $res['total_quantity'] . '</td>
                    <td>Rp ' . $res['total_amount'] . '</td>
                    <td>' . $res['status'] . '</td>
                  </tr>';
        }
    } else {
        echo 'Data not found';
    }
} else {
    echo 'Invalid request';
}
