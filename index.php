<?php
$name = $_POST["Name"];
$filiere = $_POST["FI"];
$nbr = $_POST["absence"];
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$conn->query("CREATE DATABASE IF NOT EXISTS Etudiant");

// Select the database
$conn->select_db("Etudiant");

// Create the table
$sql = "CREATE TABLE IF NOT EXISTS etudiant (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    filiere VARCHAR(30) NOT NULL,
    nbrabsence INT(10)
)";
$conn->query($sql);

// Insert the data
$sqli = "INSERT INTO etudiant (nom, filiere, nbrabsence)
VALUES ('$name', '$filiere', '$nbr')";
if ($conn->query($sqli) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}
$sql = "ALTER TABLE etudiant DROP COLUMN ZEROUAL Aicha";
$conn->query($sql);

$conn->close();
?>
