<?php
$kecamatan = isset($_POST['Kecamatan']) ? $_POST['Kecamatan'] : '';
$longitude = isset($_POST['Longitude']) ? $_POST['Longitude'] : '';
$latitude = isset($_POST['Latitude']) ? $_POST['Latitude'] : '';
$luas = isset($_POST['Luas']) ? $_POST['Luas'] : '';
$jumlah_penduduk = isset($_POST['Jumlah_Penduduk']) ? $_POST['Jumlah_Penduduk'] : '';

// Sesuaikan dengan setting MySQL 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgweb8";

// Buat koneksi 
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query INSERT
$sql = "INSERT INTO tabel_pddk (Kecamatan, Longitude, Latitude, Luas, Jumlah_Penduduk) 
VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
