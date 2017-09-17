<!DOCTYPE html>
<html>

<body>
<!--
<form action="Add_Topic.php", method="post">
<select name='Module'>
-->
<form action="Add_Topic_2.php", method="post">
<div class="form-group row">
<label for="select_module" class="col-sm-2 col-form-label">Module</label>
<div class="col-sm-10">
<select class="form-control" id="select_module" name="select_module">

	




<?php
//Getting data from the form
$q = intval($_GET['q']);

//Server Details
//Getting the data from the database
  include("database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  //Make the SQL Request
  $sql = "SELECT DISTINCT Name FROM Structure WHERE Type='Subject'";
  //Set the result to a variable
  $result = $conn->query($sql);
//Finding the selected subject
  $count=0; 
  $array= array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $name=$row['Name'];
        array_push($array, $name);
      }
}
//Generating the preamble for the multiple choice
  $Selection= $array[$q];
//Generating the form
  $sql = "SELECT DISTINCT Name FROM Structure WHERE Subject='$Selection' AND Type='Module'";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      	$module=$row["Name"];
      	echo "<option value='$module'>$module</option>";     
      }
      }
      else{
      	echo "Nothing here";
      }
      echo "</select>";
      echo "</div>";
      echo "</div>";
      
//Generating the input to put number of topics
      echo "<br>";
      echo "<div class='form-group row'>";
      echo "<label for='topic_count' class='col-sm-2 col-form-label'>Number of topics</label>";
      // echo "Number of topics: <input type='text' name='topic_count'><br>";
      echo "<div class='col-sm-10'>";
      echo "<input type='text' class='form-control' id='topic_count' name='topic_count'>";
      echo "</div>";
//Passing the Subject through the form
	  echo "<input type='hidden' name='subject' value='$Selection'/>";    
	  echo "<br>";

//Submit
	  echo "<div class='col-sm-2'>";
	  echo "</div>";
	  echo "<div class='col-sm-10'>";
      echo "<input type='submit' class='btn btn-primary'>";
      echo "</div>";
      echo  "</form>";
      echo "</div>";

//Close the connection to the database
$conn->close(); 
  ?>
  </div>
<!-- Finish the page -->
</body>
</html>

<!-- This is not functional, fix it -->


