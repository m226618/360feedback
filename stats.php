<?php
  session_start();
  require_once('middata_functions.inc.php');
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  header("Location: welcome.html");
 ?>
 <!DOCTYPE html>

<!-- A bare bones web page to start IT350 assignments with -->

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Stats</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="text-dark text-center">
<div class="jumbotron">
		<div class="display-4">360 Feedback - Statistics</div>
		<br>
		<ul class="nav nav-pills justify-content-center">
			<li class="nav-item">
				<a class="nav-link" href="myAccount.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="getFeedback.php">Get Feedback</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="submitFeedback.php">Submit Feedback</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="stats.php">Feedback Statistics</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>


<?php
if(empty($_SESSION["admin"]) && !isset($_SESSION["admin"])){
?>
  <div class="row justify-content-center">
    <div class="col">
      <div class="jumbotron bg-white"><h2> You need admin priviledge to view this page <h2></div>
    </div>
  </div>
<?php
}
else {
?>
  <div class="row justify-content-center">
    <div class="col">
      <div class="jumbotron">
      <form>
        <label>Enter desired company: <input type='number' id='company' min = '1' max = '30'></label>
        <br><br>
        <input type='button' class="btn btn-primary" value='Search' onClick='search(this.value)'>
      </form>
      <br><br>
<?php
}
?>

      <div id="out"> </div>
    </div>
  </div>
</div>

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
