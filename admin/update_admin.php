<?php
require_once('../config.php');

$admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
$admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
$admin_id = $_POST['hidden_admin_id'];
$old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

// Fetch the current password from the database
$get_password_query = "SELECT admin_password FROM cake_shop_admin_registrations WHERE admin_id = $admin_id";
$result = mysqli_query($conn, $get_password_query);
$row = mysqli_fetch_assoc($result);
$current_password = $row['admin_password'];

// Check if the entered old password matches the current password
if (password_verify($old_password, $current_password)) {
    // Old password is correct, proceed with the update
    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    $update = "UPDATE cake_shop_admin_registrations SET admin_username = '$admin_username', admin_email = '$admin_email', admin_password = '$hashed_new_password' WHERE admin_id = $admin_id";

    mysqli_query($conn, $update);
    header("Location: account_admin.php?edit_success=1");
} else {
    // Old password is incorrect, handle accordingly (e.g., show an error message)
    header("Location: account_admin.php?edit_error=1");
}
