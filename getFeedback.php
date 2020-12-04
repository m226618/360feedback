<!--
Author: Courtney Tse
Creation Date: October 20
Description: Page where midshipmen can view feedback that has been submitted for them by their company mates.
-->

<?php
  require_once('middata_functions.inc.php');
  session_start();
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  header("Location: welcome.html");
  //need to verify that user is logged in before displaying page

 ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>View Feedback</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <script>

  //check if feedback has been submitted for this user, render appropriate message if no feedback has been submitted yet
  function feedbackStatus() {
    var top = document.getElementById("top");
    var feedbackDivs = document.getElementsByClassName("feedback");
    if(feedbackDivs.length == 0) {
      top.innerHTML = "Feedback hasn't been submitted for you yet!";
      return false;
    }
    return true;
  }

  //create dropdown menu of names that the user can read feedback from
  function createSelector() {
    var feedbackDivs = document.getElementsByClassName("feedback");
    var selector = document.getElementById("selector");

    var str = "<select name=reviewee id=reviewee onload=viewFeedback() onchange=viewFeedback()>";
    for(var i=0; i<feedbackDivs.length; i++)
      str += "<option>" + feedbackDivs[i].id + "</option>";
    str += "</select>";

    selector.innerHTML = str;


  }
    //display feedback for the selected individual
    function viewFeedback() {
      var feedbackDivs = document.getElementsByClassName("feedback");
      var selector = document.getElementById("reviewee");
      for(var i=0; i<feedbackDivs.length; i++) {
        if(selector.value.localeCompare(feedbackDivs[i].id) == 0)
          feedbackDivs[i].style.display = "block";
        else
          feedbackDivs[i].style.display = "none";
      }

    }

  </script>


</head>

<body class="text-dark text-center">
  <div class="jumbotron">
		<div class="display-4">360 Feedback - View Feedback</div>
		<br>
		<ul class="nav nav-pills justify-content-center">
			<li class="nav-item">
				<a class="nav-link" href="myAccount.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="getFeedback.php">Get Feedback</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="submitFeedback.php">Submit Feedback</a>
      </li>
      <?php
			if(!(empty($_SESSION["admin"]) && !isset($_SESSION["admin"]))){
			?>
			<li class="nav-item">
				<a class="nav-link" href="stats.php">Feedback Statistics</a>
			</li>
			<?php
			}
			?>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
    <br>
    <h4>Feedback submitted for <?php echo $_SESSION['first'] . " " . $_SESSION['last']; ?></h4>
  </div>
  <div id="top">
  </div>
  <br><br>

<?php
  $feedback = getFeedback($_SESSION['alpha']);
  echo "<div id=\"selector\"></div>";
  echo strstr($feedback, '<div');
?>

 <script>
   //if feedback has been submitted, create dropdown menu.
   if(feedbackStatus()) {
     createSelector();
   }
   viewFeedback();

 </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
