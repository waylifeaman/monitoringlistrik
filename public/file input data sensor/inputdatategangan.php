<?php
include('conn.php');

// data waktu
date_default_timezone_set('Asia/Jakarta');
$tgl = date('H:i:s j-n-Y ');
$day = date('l');


// INPUT DATA LISTRIK
if (isset($_POST['tegangan1']) && isset($_POST['arus1']) && isset($_POST['daya1']) && isset($_POST['tegangan2']) && isset($_POST['arus2']) && isset($_POST['daya2']) && isset($_POST['tegangan3']) && isset($_POST['arus3']) && isset($_POST['daya3'])) {
    $t1 = $_POST['tegangan1'];
    $a1 = $_POST['arus1'];
    $d1 = $_POST['daya1'];
    $t2 = $_POST['tegangan2'];
    $a2 = $_POST['arus2'];
    $d2 = $_POST['daya2'];
    $t3 = $_POST['tegangan3'];
    $a3 = $_POST['arus3'];
    $d3 = $_POST['daya3'];
    $dt = $_POST['dayaTotal'];
    $sd = $_POST['sisaDaya'];

    $sql = "INSERT INTO datalistriks (tegangan_1, arus_1, daya_1, tegangan_2, arus_2, daya_2, tegangan_3, arus_3, daya_3, daya_total, sisa_daya, hari, datetime) VALUES ('$t1', '$a1', '$d1','$t2', '$a2', '$d2', '$t3', '$a3', '$d3', '$dt', '$sd', '$day', '$tgl')";
    // mysqli_query($conn, "ALTER TABLE datalistriks AUTO_INCREMENT=1 ");

    if (mysqli_query($conn, $sql)) {
        echo "\nPenambahan data Sukses";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<br>" . ("Gagal input data");
}
