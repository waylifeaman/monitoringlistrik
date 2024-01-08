<?php
include('conn.php');

// data waktu
date_default_timezone_set('Asia/Jakarta');
$waktu = date('H:i:s j-n-Y ');
$day = date('l');
if (isset($_POST['angin'])) {
    $t = $_POST['angin'];
    // $t = 30;
    // $h = 69;
    $status = "berhasil input";

    $sql = "INSERT INTO dataangins (kec_angin, hari, datetime) VALUES ('$t', '$day', '$waktu')";

    if (mysqli_query($conn, $sql)) {
        echo "\nPenambahan data Sukses";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<br>" . ("Gagal input data");
}
