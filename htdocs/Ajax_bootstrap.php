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

.full-width-div {
    position: relative;
    width: 95%;
    left: 2.5%;
    right: 2.5%;
}

.row-full{
 width: 100vw;
 position: relative;
/* margin-left: -60vw;*/
 left: 50%;
}
</style>
</head>
<body>
  <div class="full-width-div">
  <div class="table-responsive">       
<table class="table">
  <thead>
    <tr class="bg-success">
      <th>Year</th>
      <th>Month</th>
      <th>Score</th>
      <th>Total</th>
      <th>Percentage</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>


<?php
$id=$_COOKIE["username"];
$q = $_GET['second'];
$q= str_replace('_', ' ', $q);
$explode = explode("|", $q);
$q= $explode[0];
$Subject= $explode[1];
echo $subject;

  //Server Details
  include("database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Make the SQL Request
  $sql="SELECT DISTINCT Year, Month FROM Papers WHERE Module = '".$q."' AND ID=$id AND Subject='$Subject' ORDER BY Year DESC";
  //Set the result to a variable
  $result = $conn->query($sql);
  $count=0; 
  $percent=0;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $Year=$row['Year'];
        $Month=$row['Month'];
        $sql2="SELECT SUM(My_Mark) AS value_sum, SUM(Out_Of) AS out_of_sum FROM Papers WHERE Year='$Year' AND Month='$Month' AND Module='$q' AND ID=$id AND Subject='$Subject'" ;
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $percent=round(($row[value_sum]/$row[out_of_sum])*100);
        echo "<tr class='bg-primary'>";
        echo "<th scope='row'>$Year</th>";
        echo "<td>$Month</td>";
        echo "<td>$row[value_sum]</td>";
        echo "<td>$row[out_of_sum]</td>";
        echo "<td>$percent</td>";
        $test="Test";
        echo "<td><button onclick=\"Delete('$Subject|$q|$Year|$Month')\" type='button' class='btn btn-danger'>Delete</button></td>";
        echo "</tr>";
    }
    } else {
    echo "0 results";
    }
      }
}
  $conn->close();
?>
</tbody>
</table>
</div>
</div>
</body>
</html>
