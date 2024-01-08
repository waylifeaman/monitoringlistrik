<?php
include('conn.php');

// data waktu
date_default_timezone_set('Asia/Jakarta');
$waktu = date('H:i:s j-n-Y ');
$day = date('l');
if (isset($_POST['suhu']) && isset($_POST['kelembaban']) && isset($_POST['hujan']) && isset($_POST['intensitas']) && isset($_POST['kondisiCahaya'])) {
    $t = $_POST['suhu'];
    $h = $_POST['kelembaban'];
    $hu = $_POST['hujan'];
    $in = $_POST['intensitas'];
    $k = $_POST['kondisiCahaya'];
    // $t = 30;
    // $h = 69;
    $status = "berhasil input";

    $sql = "INSERT INTO dataoutdors (suhu_out, kelembaban_out, hujan, kond_cahaya, intens_cahaya, hari, datetime) VALUES ('$t', '$h', '$hu', '$k', '$in', '$day', '$waktu')";

    if (mysqli_query($conn, $sql)) {
        echo "\nPenambahan data Sukses";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<br>" . ("Gagal input data");
}
