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
<table class="table">
  <thead>
    <tr class="bg-success">
      <th>Topic</th>
      <th>Percentage</th>
    </tr>
  </thead>
  <tbody>


<?php
$id=$_COOKIE["username"];
$q = $_GET['second'];
$q= str_replace('_', ' ', $q);
$explode = explode("|", $q);
$q= $explode[0];
$subject= $explode[1];

  //Server Details
  include("../database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Make the SQL Request
  $sql="SELECT Topic, (SUM(My_Mark)/SUM(Out_Of))*100 AS Average FROM Papers WHERE Module='$q' AND ID=$id AND Subject='$subject' GROUP BY Topic ORDER BY SUM(My_Mark)/SUM(Out_Of)";



  //Set the result to a variable
  $result = $conn->query($sql);
  $count=0; 
  $percent=0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $average=round($row[Average]);
        echo "<tr class='bg-primary'>";
        echo "<td>$row[Topic]</td>";
        echo "<td>$average</td>";
        echo "</tr>";

      }
}

  $conn->close();
?>
</tbody>
</table>
</body>
</html>


