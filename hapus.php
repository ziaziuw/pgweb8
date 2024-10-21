<!DOCTYPE html>
<html>
<body>

<?php
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

// Jika tombol hapus ditekan, hapus data berdasarkan nama kecamatan
if (isset($_POST['delete'])) {
    $kecamatanToDelete = $_POST['kecamatan'];
    $sqlDelete = "DELETE FROM tabel_pddk WHERE Kecamatan = '$kecamatanToDelete'";
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Data for $kecamatanToDelete deleted successfully.<br>";
    } else {
        echo "Error deleting data: " . $conn->error;
    }
}

// Query untuk menampilkan data dari tabel
$sql = "SELECT * FROM tabel_pddk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Buat tabel HTML untuk menampilkan data
    echo "<table border='1px'>
    <tr>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th>Aksi</th>
    </tr>";

    // Tampilkan data per baris dengan tombol hapus
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["Kecamatan"] . "</td>
        <td>" . $row["Longitude"] . "</td>
        <td align='right'>" . $row["Latitude"] . "</td>
        <td align='right'>" . $row["Luas"] . "</td>
        <td align='right'>" . $row["Jumlah_Penduduk"] . "</td>
        <td>
            <form method='POST' action=''>
                <input type='hidden' name='kecamatan' value='" . $row["Kecamatan"] . "'>
                <input type='submit' name='delete' value='Hapus'>
            </form>
        </td>
        </tr>";
    }
    
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>