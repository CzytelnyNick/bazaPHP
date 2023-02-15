<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Podaj swoje dane :D</h1>
    <form action="" method="POST">
        <input type="text" name="imie">
        <input type="text" name="nazwisko">
        <input type="text" name="klasa">
        <input type="submit">
    </form>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
// $sql = "CREATE DATABASE myDB";

// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }
// $sql = "DROP TABLE MyGuests";
// $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     imie VARCHAR(30) NOT NULL,
//     nazwisko VARCHAR(30) NOT NULL,
//     klasa VARCHAR(50) NOT NULL
//     )";
$im = $_POST["imie"];;
$nazw = $_POST["nazwisko"];
$kl = $_POST["klasa"];
$sql = "INSERT INTO MyGuests (imie, nazwisko, klasa) VALUES ('".$im."', '".$nazw."', '".$kl."')";
$sqlSelect = "SELECT id,imie,nazwisko,klasa FROM MyGuests";
$result = mysqli_query($conn, $sqlSelect);
// echo $sql;
if (mysqli_query($conn,$sqlSelect)) {
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row["id"]. " - imie: " . $row["imie"]. " " . $row["nazwisko"]. " klasa: " . $row["klasa"] ."<br>";
        }
      } else {
        echo "0 results";
      }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  



    
mysqli_close($conn);
?>
</body>
</html>