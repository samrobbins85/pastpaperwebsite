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

.full-width-div {
    position: relative;
    width: 95%;
    left: 2.5%;
    right: 2.5%;
}
</style>
</head>
<body>





<form>
  <div class="form-group row">
  <div class="col-sm-1 col-md-2"></div>
  <label for="choosemodule" class="col-sm-2 col-md-1 col-form-label">Module</label>
  <div class="col-sm-7">
  <div class="col-sm-2"></div>
  <!-- <select class="form-control" name="module" onchange="showUser(this.value)" id="choosemodule"> -->
  <select class="form-control" name="module" onchange="runUser(this.value)" id="choosemodule">	
  <option value="">Select a Module:</option>  
<?php
$id=$_COOKIE["username"];
$q = $_GET['q'];
include("database_info.php");
$servername = servername;
$username = username;
$password = password;
$dbname = dbname;
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT DISTINCT Module FROM Papers WHERE Subject='".$q."' AND ID=$id ORDER BY Module";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $module= str_replace(' ', '_', $row["Module"]);

          echo "<option value=$module|$q>".$row["Module"]."</option>", "\n";
      }
}
$conn->close();
echo "</div>";
echo "</div>";
echo "<div>";
echo "</select>";
echo "</form>";
echo "<br>";
?>
</div>
  <div class="full-width-div">
<div id="show"><b>Select a module to see results</b></div>
</div>

</body>
</html>
