<?php
  session_start();
  require_once('middata_functions.inc.php');
 ?>
 <!DOCTYPE html>

<!-- A bare bones web page to start IT350 assignments with -->

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Stats</title>
</head>

<body>

<?php
if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  {
      echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
        }
    else if(empty($_SESSION["admin"]) && !isset($_SESSION["admin"]))
    {
      echo "<h2> You need admin priviledge to view this page <h2>";
    }
	  else {
      echo "<p>Stats</p>";
      echo "<form>
        Company: <input type='number' id='company' min = '1' max = '30'>
        <br><br><input type='button' value='Search' onClick='search(this.value)'><br><br>";
  		echo "<a href=\"myAccount.php\"> Go home </a> <br>";
		}
?>
<p id="out"> </p>

<script>
  function search(){
    // Create a new XMLHttpRequest Object (the core of Ajax)
    var xhttp = new XMLHttpRequest();

    // Define what will happen when the information is received back from
    // the page that we called.  Remember that we will always be doing
    // Ajax calls asynchronously (meaning we don't just sit there and
    // wait for the response back from the server as that would kill
    // the user experience).  When a response is received from the website
    // And that response has a code of 200 (success) then we have received
    // the final response from the URL we called.
    xhttp.onreadystatechange = function() {

      // We have received all of the information back from the URL
      // And the page told us it was successful.
      if (this.readyState == 4 && this.status == 200) {

         // The results from the URL we called are returned in the
         // STRING xhttp.responseText. In most cases we will need to process that
         // string to make the information useful.  If the string
         // was a JSON encoded string, you should use JSON.parse()

         // In this example, we are placing the results into the HTML
         // tag identified by "demo"
         var rcvd = xhttp.responseText;
         document.getElementById("out").innerHTML = rcvd;
      }
    };

    // Inform the XMLHttpRequest object that we want to use the GET method
    // calling the URL generateContent.php (in the same folder as current code), and that we want the
    // connection to be performed asynchronously (the true), this will
    // ALWAYS be set to true, otherwise your users web page will be unresponsive.
    var str = String(document.getElementById("company").value);
    xhttp.open("GET", "getStats.php?co=" + str, true);

    // Send the request to the URL, and when the response is received, the
    // onreadystatechange function we defined above will be called.
    xhttp.send();
  }
</script>
</body>

</html>
