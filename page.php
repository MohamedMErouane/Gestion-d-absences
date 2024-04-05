<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
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
  .table-title {
      font-size: 14px;
      font-weight: bold;
      text-align: center;
      margin-bottom: -60px;
    }
   .class{
      top: 50%;
      left: 50%;
      padding-top: 200px;
    }
    body{
      background-image: url(don.jpg);
      background-repeat: no-repeat;
       background-size: cover;
       width: 100%;
    }
</style>
<body>
  <div class="class">

  
<div class="table-title"><h1>Les Information De L'Etudiant</h1></div> <br><br>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Etudiant";
 // searche the name
 $name = $_POST['Name'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // Select the database
$conn->select_db("Etudiant");
  
  //  search in the database
  $sql = "SELECT * FROM etudiant  WHERE nom LIKE '%$name%'";
  $result = mysqli_query($conn, $sql);

// L'Affichage du resulte en html
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>NOM</th>";
             echo "<th>Filiere</th>";
             echo "<th>NbrAbsence</th>";
            echo "</tr>";
            echo "</thead>";
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["filiere"] . "</td>";
            echo "<td>" . $row["nbrabsence"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
} else {
    echo "No results found.";
}


$conn->close();
?></div>
</body>
</html>
