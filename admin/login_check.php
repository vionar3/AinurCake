<?php
// require_once('../config.php');
// $admin_username = $_POST['admin_username'];
// $admin_password = $_POST['admin_password'];
// $select = "SELECT * FROM cake_shop_admin_registrations where admin_username = '$admin_username' AND admin_password = '$admin_password'";
// $query = mysqli_query($conn, $select);
// $res = mysqli_fetch_assoc($query);
// if (mysqli_num_rows($query) > 0) {
// 	session_start();
// 	$_SESSION['user_admin_id'] = $res['admin_id'];
// 	$_SESSION['user_admin_username'] = $res['admin_username'];
// 	header("Location: dashboard.php?login_success=1");
// } 
// else {
// 	header("Location: index.php?login_error=1");
// }
?>

<?php
require_once('../config.php');
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];

// Retrieve the hashed password from the database based on the username
$select = "SELECT admin_id, admin_password FROM cake_shop_admin_registrations WHERE admin_username = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, "s", $admin_username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $db_admin_id, $db_admin_password);

if (mysqli_stmt_fetch($stmt)) {
	// Verify the entered password against the stored hashed password
	if (password_verify($admin_password, $db_admin_password)) {
		session_start();
		$_SESSION['user_admin_id'] = $db_admin_id;
		$_SESSION['user_admin_username'] = $admin_username;
		header("Location: dashboard.php?login_success=1");
	} else {
		header("Location: index.php?login_error=1");
	}
} else {
	header("Location: index.php?login_error=1");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>