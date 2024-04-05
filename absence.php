<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noter L'Absence</title>
</head>
<style>
body {
    background-image: url(green.png);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
}
table{
    color: black;
    font-family: monospace;
    font-size: x-large;
    align-items: center;
    justify-content: center;
    transform: translate(50%,10%);
    width: 50%;
    border-collapse: collapse;
}
th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
  }
  
  th {
    background-color: #4CAF50;
    color: white;
  }
  
  tr:hover {
    background-color: red;
  }
button{
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px;
    cursor: pointer;
    border-radius: 4px;

}
button:hover {
    background-color: black;
}
.table-title {
      font-size: 34px;
      font-weight: bold;
      text-align: center;
      margin-bottom: -60px;
    }
</style>
<body >
<div class="table-title">Liste D'Abssence</div>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Etudiant";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select all non-null values from the "nom" column
    $sql = "SELECT * FROM etudiant WHERE nom IS NOT NULL";
    $result = $conn->query($sql);

    // Display the search results in HTML
    echo '<form action="increment.php" method="post">';
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>NOM</th>";
             echo "<th>Filiere</th>";
             echo "<th>NbrAbsence</th>";
            echo "  <th>Noter</th>";
            echo "</tr>";
            echo "</thead>";
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["filiere"] . "</td>";
            echo "<td>" . $row["nbrabsence"] . "</td>";
            echo '<td><button type="submit" name="nom" value="' . $row["nom"] . '">Noter</button></td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
    echo '</form>';
    $conn->close();
    ?>
</body>
</html>
