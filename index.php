<!DOCTYPE html>
<html>

<body>

    <?php
    // Sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgweb8";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM tabel_pddk";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas</th>
                <th>Jumlah Penduduk</th>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Kecamatan"] . "</td><td>" .
                $row["Longitude"] . "</td><td align='right'>" .
                $row["Latitude"] . "</td><td align='right'>" .
                $row["Luas"] . "</td><td align='right'>" .
                $row["Jumlah_Penduduk"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>

</html>