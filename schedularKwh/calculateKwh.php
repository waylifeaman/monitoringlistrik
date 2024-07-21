<?php
// Konfigurasi koneksi database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "namaDB";

try {
    // Membuat koneksi
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Mengatur mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mendapatkan waktu sekarang dan satu jam sebelumnya
    $end_time = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $end_time->setTime($end_time->format('H'), 0, 0); // Set menit dan detik menjadi 0
    $start_time = clone $end_time;
    $start_time->sub(new DateInterval('PT1H')); // Kurangi satu jam dari waktu sekarang

    // Ambil data daya_total selama 1 jam terakhir
    $stmt = $conn->prepare("SELECT daya_total FROM datalistriks WHERE datetime >= :start_time AND datetime < :end_time");
    $stmt->bindParam(':start_time', $start_time->format('Y-m-d H:i:s'));
    $stmt->bindParam(':end_time', $end_time->format('Y-m-d H:i:s'));
    $stmt->execute();

    // Hitung total daya dan jumlah data
    $total_daya = 0;
    $jumlah_data = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $total_daya += $row['daya_total'];
        $jumlah_data++;
    }

    // Hitung kWh
    if ($jumlah_data > 0) {
        $kwh = $total_daya / $jumlah_data / 1000;

        // Simpan hasil ke tabel hourly_kwh
        $stmt = $conn->prepare("INSERT INTO hourly_kwh (kwh, dataperjam, calculated_at) VALUES (:kwh, :dataperjam, :calculated_at)");
        $stmt->bindParam(':kwh', $kwh);
        $stmt->bindParam(':dataperjam', $jumlah_data);
        $stmt->bindParam(':calculated_at', $end_time->format('Y-m-d H:i:s'));
        $stmt->execute();

        echo "Data berhasil diupdate!";
    } else {
        echo "Tidak ada data yang ditemukan selama 1 jam terakhir.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi
$conn = null;
?>
