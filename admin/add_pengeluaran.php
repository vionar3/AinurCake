<?php
//include('dbconnected.php');
include('../config.php');

$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$jumlah = $_GET['jumlah'];
$sumber = $_GET['sumber'];
$deskripsi = $_GET['deskripsi'];

//query update
$query = mysqli_query($conn, "INSERT INTO `pengeluaran` (`tgl_pengeluaran`, `jumlah`, `id_sumber`, `deskripsi`) VALUES ('$tgl_pengeluaran', '$jumlah', '$sumber', '$deskripsi')");

if ($query) {
    # credirect ke page index
    header('Location: pengeluaran.php?edit_msg=3');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($conn);
}

//mysql_close($host);
