<?php
// require_once('config.php');
// $users_username = $_POST['users_username'];
// $users_email = $_POST['users_email'];
// $users_password = $_POST['users_password'];
// $users_mobile = $_POST['users_mobile'];
// $users_address = $_POST['users_address'];
// $users_id = $_POST['hidden_users_id'];
// $update = "UPDATE cake_shop_users_registrations set users_username = '$users_username', users_email = '$users_email', users_password = '$users_password', users_mobile = '$users_mobile', users_address = '$users_address' where users_id = $users_id";
// mysqli_query($conn, $update);
// header("Location: account_users.php?edit_success=1")
?>

<?php
require_once('config.php');
$users_username = mysqli_real_escape_string($conn, $_POST['users_username']);
$users_email = mysqli_real_escape_string($conn, $_POST['users_email']);
$users_mobile = mysqli_real_escape_string($conn, $_POST['users_mobile']);
$users_address = mysqli_real_escape_string($conn, $_POST['users_address']);
$users_id = $_POST['hidden_users_id'];

// Check if a new password is provided
if (!empty($_POST['users_password'])) {
    $users_password = mysqli_real_escape_string($conn, $_POST['users_password']);
    $hashed_password = password_hash($users_password, PASSWORD_DEFAULT);

    $update = "UPDATE cake_shop_users_registrations SET users_username = '$users_username', users_email = '$users_email', users_password = '$hashed_password', users_mobile = '$users_mobile', users_address = '$users_address' WHERE users_id = $users_id";
} else {
    // If no new password is provided, update the other fields without changing the password
    $update = "UPDATE cake_shop_users_registrations SET users_username = '$users_username', users_email = '$users_email', users_mobile = '$users_mobile', users_address = '$users_address' WHERE users_id = $users_id";
}

mysqli_query($conn, $update);
header("Location: account_users.php?edit_success=1");
?>
