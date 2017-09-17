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
                <a class="nav-link " href="Add_Subject.php">Add Subject</a>
                <a class="nav-link active" href="#">Add Module</a>
                <a class="nav-link" href="#">Add Paper</a>
                <a class="nav-link" href="Add_Topic_1.php">Add Topic</a>
              </nav>
            </div>
          </div>
          <?php
            include("database_info.php");
            $servername = servername;
            $username = username;
            $password = password;
            $dbname = dbname;
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
              die("" . $conn->connect_error);
          }
          echo "";

          //Insert data from form to C1 table
          mysqli_query($conn,"INSERT INTO Structure(Type,Name,Subject,Module,Topic)
          VALUES ('Subject','$_POST[subject_name]','1','0',0)");

          //echo "$_POST[subject_name]";

           $module_count = $_POST[module_count];
           $subject_name = $_POST[subject_name];
           $count = 0;
           echo "<form action='Module_Finish.php' method='post'>";
           while($count<$module_count){
             echo "Module Name$count:<br>","\n";
             echo "<input type='text' name='module_name_$count'>","\n";
             echo "<br><br>","\n";
             $count++;
           }
           echo "<input type='hidden' name='module_count' id='hiddenField' value='$module_count' />", "\n";
           echo "<input type='hidden' name='subject_name' id='hiddenField' value='$subject_name' />", "\n";
           echo "<input type='submit' value='Submit'>","\n";
           echo "</form>","\n";
            ?>

<!--
            Module Name:<br>
            <input type="text" name="firstname" value="">
            <br>
            Number of topics:<br>
            <input type="text" name="lastname" value="">
            <br><br>

            <input type="submit" value="Submit">
          </form>
        -->


        <div class="mastfoot">
          <div class="inner">
            <p>A Sam Robbins Production</p>
          </div>
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
