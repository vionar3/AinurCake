<?php
require_once('config.php');
$users_username = $_POST['users_username'];
$users_password = $_POST['users_password'];

// Retrieve the hashed password from the database based on the username
$select = "SELECT users_id, users_password FROM cake_shop_users_registrations WHERE users_username = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, "s", $users_username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $db_users_id, $db_users_password);

if (mysqli_stmt_fetch($stmt)) {
    // Verify the entered password against the stored hashed password
    if (password_verify($users_password, $db_users_password)) {
        session_start();
        $_SESSION['user_users_id'] = $db_users_id;
        $_SESSION['user_users_username'] = $users_username;
        header("Location: index.php?login_success=1");
    } else {
        header("Location: login_users.php?login_error=1");
    }
} else {
    header("Location: login_users.php?login_error=1");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
