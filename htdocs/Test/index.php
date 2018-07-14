<!DOCTYPE html>
<html>
<head>
  <script>
     function Delete(str) {
        if (str == "") {
            document.getElementById("show").innerHTML = "";
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
                    document.getElementById("show").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","index2.php?second="+str,true);
            xmlhttp.send();
        }
    }
</script>


</head>
<body>

<button onclick="Delete('Test')">Click me</button>
<div id="show"><b>Select a Subject</b></div>

</body>
</html>
