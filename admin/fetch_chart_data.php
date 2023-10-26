<?php
require_once('../config.php');

// Query to fetch data from the cake_shop_orders_detail table
$query = "SELECT product_name, quantity FROM cake_shop_orders_detail";
$result = mysqli_query($conn, $query);

$productNames = [];
$quantities = [];

// Fetch data and store it in arrays
while ($row = mysqli_fetch_assoc($result)) {
    $productNames[] = $row['product_name'];
    $quantities[] = $row['quantity'];
}

// Create an array to hold the data
$data = [
    'productNames' => $productNames,
    'quantities' => $quantities,
];

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
