<!DOCTYPE html>
<html>

<body>
<!--
<form action="Add_Topic.php", method="post">
<select name='Module'>
-->
<form action="Add_Paper_2.php", method="post">
<div class="form-group row">
<label for="select_module" class="col-sm-2 col-form-label">Module</label>
<div class="col-sm-9">
<select class="form-control" id="select_module" name="select_module">

	




<?php
//Getting data from the form
$q = intval($_GET['q']);

//Server Details
//Getting the data from the database
  include("../database_info.php");
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
  $sql = "SELECT DISTINCT Name FROM Structure WHERE Subject='$Selection' AND Type='Module' ORDER BY Name";
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
      echo "<br>";
//Year Input
      echo "<div class='form-group row'>";
      echo "<label for='year' class='col-sm-2 col-form-label'>Year</label>";
      echo "<div class='col-sm-9'>";
      echo "<input type='text' class='form-control' id='year' name='year'>";
      echo "</div>";
      echo "</div>";
      echo "<br>";
//Month Input
      echo "<div class='form-group row'>";
      echo "<label for='select_month' class='col-sm-2 col-form-label'>Month</label>";
      echo "<div class='col-sm-9'>";
      echo "<select class='form-control' id='select_month' name='select_month'>";
      echo "<option value='Solomon'>Solomon</option>"; 
      echo "<option value='IYGB'>IYGB</option>"; 
      echo "<option value='January'>January</option>";  
      echo "<option value='January(R)'>January(R)</option>";  
      echo "<option value='January(IAL)'>January(IAL)</option>";  
      echo "<option value='June'>June</option>";  
      echo "<option value='June(R)'>June(R)</option>";  
      echo "<option value='June(IAL)'>June(IAL)</option>";  
      echo "<option value='June(Withdrawn)'>June(Withdrawn)</option>";  
      echo "</select>";
      echo "</div>";
      echo "</div>";
      echo "<br>";
//Number of questions input
      echo "<div class='form-group row'>";
      echo "<label for='question_number' class='col-sm-2 col-form-label'>Number of Questions</label>";
      echo "<div class='col-sm-9'>";
      echo "<input type='number' class='form-control' id='question_number' name='question_number'>";
      echo "</div>";
      echo "</div>";
      echo "<br>";


//Passing the Subject through the form
	  echo "<input type='hidden' name='subject' value='$Selection'/>";    
	  echo "<br>";

//Submit
	  echo "<div class='col-sm-2'>";
	  echo "</div>";
    echo "<div class='row justify-content-center'>";
	  echo "<div class='col-sm-9'>";
      echo "<input type='submit' class='btn btn-default'>";
      echo "</div>";
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


