<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Past Paper Website</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <!-- AJAX Code -->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Past Paper Website</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link" href="bootstrap.php">Home</a>
                <a class="nav-link" href="Add_Subject.php">Add Subject</a>
                <a class="nav-link" href="Add_Module.php">Add Module</a>
                <a class="nav-link active" href="#">Add Paper</a>
                <a class="nav-link" href="Add_Topic_1.php">Add Topic</a>
              </nav>
            </div>
          </div>


<?php
$year=$_POST[year];
$select_month=$_POST[select_month];
$select_module=$_POST[select_module];
$question_number=$_POST[question_number];
$subject=$_POST[subject];

echo "<form action='Add_Paper_3.php', method='post'>";
echo "<div class='form-row'>";
  //Question Number
  echo "<div class='form-group col-3'>";
    echo "<label for='question_number' class='col-form-label'>Question Number</label>";
    echo "<p id=question_number>1<p>";
  echo "</div>";
  //Question Topic
  echo "<div class='form-group col-3'>";
    echo "<label for='question_topic_1' class='col-form-label'>Question Topic</label>";
    echo "<select class='form-control' id='question_topic_1' name='question_topic_1'>";



//Server Details
//Getting the data from the database
  include("database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
//Generating the Dropdown
  $sql = "SELECT DISTINCT Name FROM Structure WHERE Subject='$subject' AND Module='$select_module'";
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

//Back to normal
    echo "</select>";
  echo "</div>";
  //My Mark
  echo "<div class='form-group col-3'>";
    echo "<label for='my_mark_1' class='col-form-label'>My Mark</label>";
    echo "<input type='number' class='form-control' id='my_mark_1' name='my_mark_1'>";
  echo "</div>";
  //Total Mark
  echo "<div class='form-group col-3'>";
    echo "<label for='out_of_1' class='col-form-label'>Out of</label>";
    echo "<input type='number' class='form-control' id='out_of_1' name='out_of_1'>";
  echo "</div>"; 
echo "</div>";
$count=2;

while($count<=$question_number){                                                       //Here's the while loop
  echo "<div class='form-row'>";
  //Question Number
  echo "<div class='form-group col-3'>";
    echo "<p id=question_number>$count<p>";
  echo "</div>";
  //Question Topic
  echo "<div class='form-group col-3'>";
    echo "<select class='form-control' id='question_topic_$count' name='question_topic_$count'>";


$sql = "SELECT DISTINCT Name FROM Structure WHERE Subject='$subject' AND Module='$select_module'";
$result = $conn->query($sql);

//Server Details
//Getting the data from the database
//Generating the Dropdown
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $module=$row["Name"];
        echo "<option value='$module'>$module</option>";     
      }
      }
      else{
        echo "Nothing here";
      }     

//Close the connection to the database
 
//Back to normal
    echo "</select>";
  echo "</div>";
  //My Mark
  echo "<div class='form-group col-3'>";
    echo "<input type='number' class='form-control' id='my_mark_$count' name='my_mark_$count'>";
  echo "</div>";
  //Total Mark
  echo "<div class='form-group col-3'>";
    echo "<input type='number' class='form-control' id='out_of_$count' name='out_of_$count'>";
  echo "</div>"; 
echo "</div>";
$count++;

}
$conn->close();


echo "<input type='hidden' name='question_count' value='$question_number'/>";   
echo "<input type='hidden' name='year' value='$year'/>";    
echo "<input type='hidden' name='month' value='$select_month'/>";    
echo "<input type='hidden' name='module' value='$select_module'/>"; 
echo "<input type='hidden' name='subject' value='$subject'/>";    

echo "<input type='submit' class='btn btn-primary'>";
?>
        <div class="mastfoot">
          <div class="inner">
            <p>A Sam Robbins Production</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
