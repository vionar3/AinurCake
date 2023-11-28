<?php
require_once('../config.php');
$category_name = $_POST['category_name'];

// Check if files are uploaded
if (!empty($_FILES['category_image']['name'][0])) {
    $uploaded_files = $_FILES['category_image'];

    $uploaded_files_count = count($uploaded_files['name']);

    for ($i = 0; $i < $uploaded_files_count; $i++) {
        $file_name = $uploaded_files['name'][$i];
        $f_name = date('ymdhis') . $i;
        $file_array = explode('.', $file_name);
        $ext = $file_array[count($file_array) - 1];
        $new_file_name = $f_name . '.' . $ext;
        $destination = "../uploads/" . $new_file_name;
        $source = $uploaded_files['tmp_name'][$i];
        move_uploaded_file($source, $destination);

        // Assuming you have a database connection ($conn)
        $insert = "INSERT INTO cake_shop_category (category_name, category_image) VALUES ('$category_name', '$new_file_name')";
        mysqli_query($conn, $insert);
    }

    header('Location: add_category.php?add_msg=1');
} else {
    // No files uploaded, handle accordingly
    $default = "default-image.jpg";
    $insert = "INSERT INTO cake_shop_category (category_name, category_image) VALUES ('$category_name', '$default')";
    mysqli_query($conn, $insert);

    header('Location: add_category.php?add_msg=1');
}
