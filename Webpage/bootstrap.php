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
    <script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","Ajax_bootstrap.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>


  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Past Paper Website</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="Add_Subject.php">Add Subject</a>
                <a class="nav-link" href="Add_Module.php">Add Module</a>
                <a class="nav-link" href="Add_Paper.php">Add Paper</a>
                <a class="nav-link" href="Add_Topic_1.php">Add Topic</a>
              </nav>
            </div>
          </div>

<!-- Dropdown -->
<form>
  <div class="form-group row">
  <div class="col-sm-2"></div>
  <label for="chooseyear" class="col-sm-1 col-form-label">Module</label>
  <div class="col-sm-7">
  <div class="col-sm-2"></div>
  <select class="form-control" name="users" onchange="showUser(this.value)" id="chooseyear">
  <option value="">Select a Module:</option>

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

  $sql = "SELECT DISTINCT Module FROM Papers";
  $result = $conn->query($sql);
//<option value=".$row["Year"].">".$row["Year"]."</option>
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<option value=".$row["Module"].">".$row["Module"]."</option>", "\n";
      }
  //} else {
      //echo "0 results";
  }

  $conn->close();
  ?>
</div>
</div>
</select>
</form>
<br>



<!-- Table -->
  <div id="txtHint"><b>Past Paper info will be listed here...</b></div>

        </div>
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
