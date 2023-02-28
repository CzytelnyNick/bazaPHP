<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <div class="container">
  <h1>Podaj swoje dane :D</h1>
    <form action="" method="POST">
        <input type="text" name="imie" required>
        <input type="text" name="nazwisko" required>
        <input type="text" name="klasa" required>
        <input type="submit">
    </form>
    <a style="float:right" href="truncate.php"><button class="btn btn-danger">Wyczyść bazę</button></a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imie</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Klasa</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    if(isset($_POST["submit"])){
    if(isset($_POST["imie"]) isset($_POST["nazwisko"]) and isset($_POST["klasa"]))
    {
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "szkolnaBazaZadanie";
// Create connection

$firstConnection = new mysqli($servername, $username, $password);
if ($firstConnection->connect_error) {
  die("Connection failed: " . $firstConnection->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS szkolnaBazaZadanie";

if (mysqli_query($firstConnection, $sql)) {

} else {
  echo "Error creating database: " . mysqli_error($firstConnection);
}
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "CREATE DATABASE myDB";

// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }
// $sql = "DROP TABLE Uczniowie";

$sql = "CREATE TABLE IF NOT EXISTS Uczniowie (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(30) NOT NULL,
    nazwisko VARCHAR(30) NOT NULL,
    klasa VARCHAR(50) NOT NULL
    )";
  if(mysqli_query($conn, $sql)) {
    
  } else {
    echo "Error creating database: " . mysqli_error($firstConnection);
  }
$im = $_POST["imie"];;
$nazw = $_POST["nazwisko"];
$kl = $_POST["klasa"];
$sql = "INSERT INTO Uczniowie (imie, nazwisko, klasa) VALUES ('".$im."', '".$nazw."', '".$kl."')";
if(mysqli_query($conn, $sql)){
  
} else {
  echo "Error creating database: " . mysqli_error($conn);
}
$sqlSelect = "SELECT id,imie,nazwisko,klasa FROM Uczniowie";
$result = mysqli_query($conn, $sqlSelect);
// echo $sql;
if (mysqli_query($conn,$sqlSelect)) {
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "<th scope='row'>".$row["id"]."</th>
          <td>".$row["imie"]."</td>
          <td>".$row["nazwisko"]."</td>
          <td>".$row["klasa"]."</td></tr>";
          
        }
      } else {
        echo "0 results";
      }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  



    
mysqli_close($conn);
    }
    else {
      echo "<h1> PODAJ DANE >: (</h1>";
    }
    }
?>
    </tr>
  </tbody>
    </table>
  </div>
    
</body>
</html>