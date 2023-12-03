<?php
require_once('../config.php');

$hidden_id = $_POST['hidden_cancel'];

$update = "UPDATE cake_shop_orders 
           SET status = 'Dibatalkan'
           WHERE orders_id = $hidden_id";

// Assuming $conn is your database connection variable
if (mysqli_query($conn, $update)) {
    // If the update is successful, redirect to view_orders.php with a success message
    header('Location: view_orders.php?edit_msg=1');
    exit();
} else {
    // If there's an error with the query, you might want to handle it appropriately
    echo "Error updating record: " . mysqli_error($conn);
}
