<?php
include('../config.php');


$id_catatan_3 = 3;
$catatan_3 = $_GET['catatan1'];

$id_catatan_4 = 4;
$catatan_4 = $_GET['catatan2'];

// Update catatan with id 3
$query_catatan_3 = mysqli_query($conn, "UPDATE catatan SET catatan='$catatan_3' WHERE id_catatan='$id_catatan_3'");

// Update catatan with id 4
$query_catatan_4 = mysqli_query($conn, "UPDATE catatan SET catatan='$catatan_4' WHERE id_catatan='$id_catatan_4'");


if ($query_catatan_3 && $query_catatan_4) {
    header('Location: pengeluaran.php?edit_msg=1');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($conn);
}

// mysqli_close($conn);
