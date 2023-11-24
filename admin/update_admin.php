<?php
require_once('../config.php');
$admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
$admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
$admin_id = $_POST['hidden_admin_id'];

// Check if a new password is provided
if (!empty($_POST['admin_password'])) {
    $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

    $update = "UPDATE cake_shop_admin_registrations SET admin_username = '$admin_username', admin_email = '$admin_email', admin_password = '$hashed_password' WHERE admin_id = $admin_id";
} else {
    // If no new password is provided, update the other fields without changing the password
    $update = "UPDATE cake_shop_admin_registrations SET admin_username = '$admin_username', admin_email = '$admin_email' WHERE admin_id = $admin_id";
}

mysqli_query($conn, $update);
header("Location: account_admin.php?edit_success=1");
