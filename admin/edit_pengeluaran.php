<?php
//include('dbconnected.php');
include('../config.php');

$id = $_GET['id_pengeluaran'];
$tgl = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$sumber = $_GET['id_sumber'];
$deskripsi = $_GET['deskripsi'];

//query update
$query = mysqli_query($conn, "UPDATE pengeluaran SET tgl_pengeluaran='$tgl' , jumlah='$jumlah', id_sumber='$sumber' , deskripsi='$deskripsi' WHERE id_pengeluaran='$id' ");

if ($query) {
    # credirect ke page index
    header('Location: pengeluaran.php?edit_msg=2');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($conn);
}

//mysql_close($host);
