<?php
// Verbindungsdaten zur Datenbank
$servername = "sql19.your-server.de";
$username = "widerrr_1_r";
$password = "**";
$dbname = "widerrr_db1";

// Erstellen einer Verbindung zur Datenbank
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Abrufen des aktuellen Zählerstands
$sql = "SELECT count FROM counter WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ausgabe des Zählerstands
    $row = $result->fetch_assoc();
    echo $row["count"];
} else {
    echo "0";
}

$conn->close();
?>
