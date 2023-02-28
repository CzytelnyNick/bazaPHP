<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "szkolnaBazaZadanie";
    $dbtable = "Uczniowie";
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "TRUNCATE $dbtable";
    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
</body>
</html>