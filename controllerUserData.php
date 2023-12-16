<?php
session_start();
require "config.php";
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; // Tambahkan ini

$email = "";
$name = "";
$errors = array();

// Jika pengguna mengklik tombol "check-email" pada formulir lupa kata sandi
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM cake_shop_users_registrations WHERE users_email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE cake_shop_users_registrations SET code = $code WHERE users_email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if ($run_query) {


            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'irfandimasriyadi@gmail.com';
            $mail->Password = 'fjta wrkv sxug qvvy';
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('irfandimasriyadi@gmail.com', 'ainur cake');
            $mail->addAddress($email);

            $mail->Subject = 'Password Reset Code';
            $mail->Body = "Your password reset code is $code";

            if ($mail->send()) {
                $info = "We've sent a password reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset_code.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

if (isset($_POST['check-email-hint'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $hint = mysqli_real_escape_string($conn, $_POST['hint']);

    $check_user = "SELECT * FROM cake_shop_users_registrations WHERE users_email='$email' AND hint='$hint'";
    $run_query = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($run_query) > 0) {
        // Email dan hint cocok, arahkan ke new_password.php
        $info = "Your used email - $email";
        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;
        header('Location: new_password.php');
        exit();
    } else {
        $errors['email'] = "Email address or hint is incorrect!";
    }
}

// Jika pengguna mengklik tombol "check-reset-otp"
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";

    // Pastikan otp adalah array
    if (isset($_POST['otp']) && is_array($_POST['otp'])) {
        $otp_codes = array_map(function ($value) use ($conn) {
            return mysqli_real_escape_string($conn, $value);
        }, $_POST['otp']);

        // Gabungkan kode OTP menjadi satu string
        $otp_code = implode('', $otp_codes);

        // Gunakan prepared statement untuk menghindari SQL injection
        $check_code = "SELECT * FROM cake_shop_users_registrations WHERE code = ?";
        $stmt = mysqli_prepare($conn, $check_code);
        mysqli_stmt_bind_param($stmt, "s", $otp_code);
        mysqli_stmt_execute($stmt);
        $code_res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($code_res) > 0) {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['users_email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new_password.php');
            exit();
        } else {
            $errors['otp-error'] = "You've entered incorrect code!";
        }

        mysqli_stmt_close($stmt); // Tutup prepared statement
    } else {
        $errors['otp-error'] = "Invalid OTP input.";
    }
}


// // Jika pengguna mengklik tombol "check-reset-otp"
// if(isset($_POST['check-reset-otp'])){
//     $_SESSION['info'] = "";
//     $otp_code = mysqli_real_escape_string($conn, $_POST['otp[]']);
//     $check_code = "SELECT * FROM cake_shop_users_registrations WHERE code = $otp_code";
//     $code_res = mysqli_query($conn, $check_code);
//     if(mysqli_num_rows($code_res) > 0){
//         $fetch_data = mysqli_fetch_assoc($code_res);
//         $email = $fetch_data['users_email'];
//         $_SESSION['email'] = $email;
//         $info = "Please create a new password that you don't use on any other site.";
//         $_SESSION['info'] = $info;
//         header('location: new_password.php');
//         exit();
//     }else{
//         $errors['otp-error'] = "You've entered incorrect code!";
//     }
// }

if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email'];

        // Hash the new password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the hashed password in the database
        $update_pass = "UPDATE cake_shop_users_registrations SET code = $code, users_password = '$hashedPassword' WHERE users_email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);

        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password_changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

// Jika pengguna mengklik tombol "login now"
if (isset($_POST['login-now'])) {
    header('Location: login_users.php');
}
