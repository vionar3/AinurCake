<?php
require_once('config.php');
session_start();

if (isset($_SESSION['user_users_id']) && $_SESSION['user_users_username'] !== null) {
    if (isset($_GET['orders_id'])) {
        $hidden_id = $_GET['orders_id'];

        $update = "UPDATE cake_shop_orders 
                   SET status = 'Menunggu Konfirmasi'
                   WHERE orders_id = $hidden_id";

        // Assuming $conn is your database connection variable
        mysqli_query($conn, $update);
        // header('Location: cart.php');
    }
}
