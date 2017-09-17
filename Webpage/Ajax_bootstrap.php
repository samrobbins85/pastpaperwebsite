<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php

$q = $_GET['q'];
echo "$q";

  //Server Details
  include("database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Make the SQL Request
  $sql="SELECT DISTINCT Year FROM Papers WHERE Module = '".$q."'";
  //Set the result to a variable
  $result = $conn->query($sql);
  $count=0; 
  $array=array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $Year=$row['Year'];
        array_push($array, $Year);
        $sql2="SELECT SUM(My_Mark) AS value_sum FROM Papers WHERE Year=$Year";
        $result2 = $conn->query($sql2);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "sum in $Year is : " . $row["value_sum"];
        echo "<br>";
    }
    } else {
    echo "0 results";
    }
        echo $name;
        //echo $Year;

      }
}

  $conn->close();


?>
</body>
</html>
