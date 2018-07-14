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
    <link href="../cover.css" rel="stylesheet">
    <!-- AJAX Code -->

<!-- Google Sign in code -->
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="732298015820-2eqjo93qeokjvn5m394ief8278ih8d53.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

  </head>


  <body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #fc4a1a;">
  <a class="navbar-brand" href="../index.php">Past Paper Website</a>
<a class="btn btn-primary d-lg-none" href="Add_Paper.php" role="button">Add Paper</a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../Worst_Topics/worst_topics.php">Areas to Improve</a>
      </li>

      <?php
      $id=$_COOKIE["username"];?>

      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: #fc4a1a;'>
          Maintenance
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink' style='background-color: #fc4a1a;'>
          <a class='dropdown-item' href='Add_Subject/Add_Subject.php'>Add Subject</a>
          <a class='dropdown-item' href='Add_Module/Add_Module.php'>Add Module</a>
          <a class='dropdown-item' href='Add_Topic/Add_Topic.php'>Add Topic</a>
          </div>
      </li>

    </ul>
  </div>
  <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
  <div class="col-1"></div>
  <a class="btn btn-primary d-none d-lg-block" href="Add_Paper.php" role="button">Add Paper</a>
</nav>

<!-- <div class="site-wrapper">
      <div class="site-wrapper-inner"> -->
<div class="container-fluid">
<br>
<br>
<br>

<?php
$year=$_POST[year];
$select_month=$_POST[select_month];
$select_module=$_POST[select_module];
$question_number=$_POST[question_number];
$subject=$_POST[subject];
echo "<form action='Add_Paper_3.php', method='post'>";
echo "<div class='form-row'>";
  //Question Number
echo "<div class='col-2'></div>";
  echo "<div class='form-group col-2'>";
    echo "<label for='question_number' class='col-form-label'>Question Number</label>";
    echo "<p id=question_number>1<p>";
  echo "</div>";
  //Question Topic
  echo "<div class='form-group col-3'>";
    echo "<label for='question_topic_1' class='col-form-label'>Question Topic</label>";
    echo "<select class='form-control' id='question_topic_1' name='question_topic_1'>";



//Server Details
//Getting the data from the database
  include("../database_info.php");
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
  echo "<div class='form-group col-sm-1'>";
    echo "<label for='my_mark_1' class='col-form-label'>My Mark</label>";
    echo "<input type='number' class='form-control' id='my_mark_1' name='my_mark_1'>";
  echo "</div>";
  //Total Mark
  echo "<div class='form-group col-sm-1'>";
    echo "<label for='out_of_1' class='col-form-label'>Out of</label>";
    echo "<input type='number' class='form-control' id='out_of_1' name='out_of_1'>";
  echo "</div>"; 
echo "</div>";
$count=2;

while($count<=$question_number){                                                       //Here's the while loop
  echo "<div class='form-row'>";
  //Question Number
  echo "<div class='col-2'></div>";
  echo "<div class='form-group col-2'>";
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


 
//Back to normal
    echo "</select>";
  echo "</div>";
  //My Mark
  echo "<div class='form-group col-sm-1'>";
    echo "<input type='number' class='form-control' id='my_mark_$count' name='my_mark_$count'>";
  echo "</div>";
  //Total Mark
  echo "<div class='form-group col-sm-1'>";
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
      </div>
    </div>

<script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);


        document.cookie = "username="+profile.getId();

      };
    </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
