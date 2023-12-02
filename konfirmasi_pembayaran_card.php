<?php
require_once('config.php');
session_start();

if (isset($_SESSION['user_users_id']) && $_SESSION['user_users_username'] !== null) {
    if (isset($_POST['submit_confirmation'])) {
        $hidden_id = $_POST['hidden_konfirmasi'];
        $payment_date = date("Y-m-d");
        $nama_rekening = $_POST['nama_rekening'];
        $nomor_rekening = $_POST['nomor_rekening'];

        // Handle file upload
        $targetDir = "uploads/";  // Change the folder name accordingly
        $uploadFileName = basename($_FILES["customFile"]["name"]);
        $targetFilePath = $targetDir . $uploadFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check if the file is an image
        $allowedTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowedTypes)) {
            // Move the uploaded file to the destination folder
            move_uploaded_file($_FILES["customFile"]["tmp_name"], $targetFilePath);

            // Insert payment details into the database
            $insertPayment = "INSERT INTO payment (orders_id, payment_date, nama_rekening, nomor_rekening, bukti_pembayaran) VALUES ('$hidden_id', '$payment_date', '$nama_rekening', '$nomor_rekening', '$uploadFileName')";
            mysqli_query($conn, $insertPayment);

            // Update status in the cake_shop_orders table
            $updateStatus = "UPDATE cake_shop_orders SET status = 'Menunggu Konfirmasi' WHERE orders_id = $hidden_id";
            mysqli_query($conn, $updateStatus);

            // Redirect to a success page or perform any other action
            // header("Location: cart.php");
            // exit();
        } else {
            echo "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
        }
    }
}
