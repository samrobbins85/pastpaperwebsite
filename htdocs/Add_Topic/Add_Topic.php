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
            xmlhttp.open("GET","Ajax_Add_Topic.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>


  </head>

  <body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #fc4a1a;">
  <a class="navbar-brand" href="../index.php">Past Paper Website</a>
<a class="btn btn-primary d-lg-none" href="../Add_Paper/Add_Paper.php" role="button">Add Paper</a>


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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #fc4a1a;">
          Maintenance
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #fc4a1a;">
          <a class="dropdown-item" href="../Add_Subject/Add_Subject.php">Add Subject</a>
          <a class="dropdown-item" href="../Add_Module/Add_Module.php">Add Module</a>
          <a class="dropdown-item active" href="Add_Topic.php">Add Topic</a>
        </div>
      </li>
    </ul>
  </div>
  <a class="btn btn-primary d-none d-lg-block" href="../Add_Paper/Add_Paper.php" role="button">Add Paper</a>
</nav>

<div class="container-fluid">


<br>
<br>
<br>
<br>

<!-- Dropdown -->
<form>
  <div class="form-group row">
    <label for="chooseyear" class="col-sm-2 col-form-label">Subject</label>
    <div class="col-sm-9">
  <select class="form-control" name="users" onchange="showUser(this.value)" id="chooseyear">
  <option value="">Select a Subject:</option>


<?php
  //Server Details
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
  $count=0; 
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $name=$row['Name'];
        echo "<option value='$count'>$name</option>", "\n";
        $count++;
      }
}
  $conn->close();

  ?>

</div>
</div>
</select>
</form>
</div>
</div>
<br>



<!-- Table -->
  <div id="txtHint"><b>Select a subject for more options</b></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
