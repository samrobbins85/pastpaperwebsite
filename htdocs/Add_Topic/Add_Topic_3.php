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
  </head>

  <body>
<!-- Main portion of webpage -->
<?php
//Database details
include("../database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Getting data
$topic_count=$_POST[topic_count];
$module_name=$_POST[module_name];
$subject_name=$_POST[subject_name];
//Inserting data
$count=0;
while($count<$topic_count){
  $print = "topic_name_$count";
  $sql= "INSERT INTO Structure(Type,Name,Subject,Module,Topic) VALUES ('Topic','$_POST[$print]','$_POST[subject_name]','$module_name','1')";
  $count++;
  $conn->query($sql);
  }
$conn->close();
header('Location: http://samrobbins.rf.gd');
?>

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
