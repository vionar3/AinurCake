<?php
require_once('../config.php');
$category_name = $_POST['category_name'];
$hidden_id = $_POST['hidden_category'];

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
        $update = "UPDATE cake_shop_category SET category_name = '$category_name', category_image = '$new_file_name' WHERE category_id = $hidden_id";
        mysqli_query($conn, $update);
    }

    header('Location: view_category.php?edit_msg=1');
} else {
    // No files uploaded, handle accordingly
    $update = "UPDATE cake_shop_category SET category_name = '$category_name' WHERE category_id = $hidden_id";
    mysqli_query($conn, $update);

    header('Location: view_category.php?edit_msg=1');
}
