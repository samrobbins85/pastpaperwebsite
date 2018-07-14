<!DOCTYPE html>
<html>
<head>
    <script>
    
    </script>
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





<form>
  <div class="form-group row">
  <div class="col-sm-2"></div>
  <label for="choosemodule" class="col-sm-1 col-form-label">Module</label>
  <div class="col-sm-7">
  <div class="col-sm-2"></div>
  <!-- <select class="form-control" name="module" onchange="showUser(this.value)" id="choosemodule"> -->
  <select class="form-control" name="module" onchange="runUser(this.value)" id="choosemodule">	
  <option value="">Select a Module:</option>  
<?php
      $id=$_COOKIE["username"];

$q = $_GET['q'];
include("../database_info.php");
$servername = servername;
$username = username;
$password = password;
$dbname = dbname;
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT DISTINCT Module FROM Papers WHERE Subject='".$q."' AND ID=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $module= str_replace(' ', '_', $row["Module"]);
          echo "<option value=$module|$q>".$row["Module"]."</option>", "\n";
      }
}

echo "</div>";
echo "</div>";
echo "<div>";
echo "</select>";
echo "</form>";
echo "<br>";

echo "<div id='show'>";
  
$subject=$q;
$sql2="SELECT Module, (SUM(My_Mark)/SUM(Out_Of))*100 AS Average FROM Papers WHERE Subject='$subject' AND ID=$id GROUP BY Module ORDER BY SUM(My_Mark)/SUM(Out_Of)";
$result2 = $conn->query($sql2);

echo "<table class='table'>";
echo  "<thead>";
echo    "<tr class='bg-success'>";
echo      "<th scope='col'>Module</th>";
echo      "<th scope='col'>Average</th>";
echo    "</tr>";
echo  "</thead>";
echo  "<tbody>";



if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {

          $average=round($row[Average]);

          echo"<tr class='bg-primary'>";
          echo "<td>$row[Module]</td>";
          echo "<td>$average</td>";
          echo"</tr>";
      }
}


$conn->close();
?>
  </tbody>
</table>




</div>


</body>
</html>
