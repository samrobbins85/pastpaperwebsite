</!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
$q = $_GET['delete'];
$explode = explode("|", $q);
$Subject= $explode[0];
$Module= $explode[1];
$Year= $explode[2];
$Month= $explode[3];
$id=$_COOKIE["username"];
echo $Subject;
echo "<br>";
echo $Module;
echo "<br>";
echo $Year;
echo "<br>";
echo $Month;
echo "<br>";
echo $id;


include("../database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM Papers WHERE Subject='$Subject' AND Module='$Module' AND Year='$Year' AND Month='$Month' AND ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>
</body>
</html>