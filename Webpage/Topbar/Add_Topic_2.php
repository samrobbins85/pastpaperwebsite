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
                <a class="nav-link" href="#">Add Paper</a>
                <a class="nav-link active" href="Add_Topic_1.php">Add Topic</a>
              </nav>
            </div>
          </div>


<!-- Main portion of webpage -->
<?php
$topic_count = $_POST[topic_count];
$module = $_POST[select_module];
$subject = $_POST[subject];
// echo $topic_count;
// echo $module;
// echo $subject;
$count=0;
echo "<form action='Add_Topic_3.php' method='post'>";
while($count<$topic_count){
  echo "Topic Name $count:<br>","\n";
  echo "<input type='text' name='topic_name_$count'>","\n";
  echo "<br><br>","\n";
$count++;
}
echo "<input type='hidden' name='topic_count' id='hiddenField1' value='$topic_count' />", "\n";
echo "<input type='hidden' name='subject_name' id='hiddenField2' value='$subject' />", "\n";
echo "<input type='hidden' name='module_name' id='hiddenField3' value='$module' />", "\n";
echo "<input type='submit' value='Submit'>","\n";
echo "</form>","\n";
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
