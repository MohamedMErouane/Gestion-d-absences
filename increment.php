<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Etudiant";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nom = $_POST['nom'];

// Update the table
$sql = "UPDATE etudiant SET nbrabsence = nbrabsence + 1 WHERE nom='$nom'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();

header("Location: absence.php");
?>
