<?php
// Verbindungsdaten zur Datenbank
$servername = "sql19.your-server.de";
$username = "widerrr_1_w";
$password = "**";
$dbname = "widerrr_db1";

// Erstellen einer Verbindung zur Datenbank
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Erstellen der Tabelle "counter", falls sie nicht existiert
$sql = "CREATE TABLE IF NOT EXISTS counter (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  count INT(11) NOT NULL
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Überprüfen, ob ein Eintrag in der Tabelle "counter" vorhanden ist
$sql = "SELECT count FROM counter WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Aktualisieren des Zählers, wenn ein Eintrag vorhanden ist
    $sql = "UPDATE counter SET count = count + 1 WHERE id = 1";
    if ($conn->query($sql) === FALSE) {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Erstellen eines neuen Eintrags mit einem Zählerwert von 1, wenn kein Eintrag vorhanden ist
    $sql = "INSERT INTO counter (count) VALUES (1)";
    if ($conn->query($sql) === FALSE) {
        echo "Error inserting record: " . $conn->error;
    }
}

$conn->close();
?>
