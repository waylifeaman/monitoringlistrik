<?php

$server = "localhost";
$database = "monitoring_listrik";
$password = "";
$username = "root";
// $api_key_value = "aman123";

$conn = mysqli_connect($server, $username, $password, $database);
if ($conn == TRUE) {
    echo "Terhubung ke database";
} else {
    echo "Gagal Terhubung";
}
