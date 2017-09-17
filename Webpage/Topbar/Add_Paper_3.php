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
//Database details
  include("database_info.php");
  $servername = servername;
  $username = username;
  $password = password;
  $dbname = dbname;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Getting all the variables from the form
$question_count=$_POST[question_count];
$year=$_POST[year];
$month=$_POST[month];
$module=$_POST[module];
$subject=$_POST[subject];
$count=1;
while($count<=$question_count){
    $question_count_query="question_topic_$count";
    $my_mark_query="my_mark_$count";
    $out_of_query="out_of_$count";
    $question_topic=$_POST[$question_count_query];
    $my_mark=$_POST[$my_mark_query];
    $out_of=$_POST[$out_of_query];
    $sql= "INSERT INTO Papers(Subject,Module,Year,Month,Question_Number,Topic,My_Mark,Out_Of) VALUES ('$subject','$module',$year,'$month',$count,'$question_topic',$my_mark,$out_of)";
    $count++;
    $result = $conn->query($sql);
}
$conn->close();

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
