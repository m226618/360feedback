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
  <style>
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 1000px;
    }

    .scale {
      width: 200px;
    }

    .openResponse {
      width: 500px;
      height: 50px;
    }
  </style>

  <script>

  function feedbackStatus() {
    var top = document.getElementById("top");
    var feedbackDivs = document.getElementsByClassName("feedback");
    if(feedbackDivs.length == 0)
    top.innerHTML = "Feedback hasn't been submitted for you yet!";
    return false;
  }

  function createSelector() {
    var feedbackDivs = document.getElementsByClassName("feedback");
    var selector = document.createElement("select");
    selector.id = 'selector';
    selector.onChange = "viewFeedback()";
    var divIDs = [];

    for (var i=0; i<feedbackDivs.length; i++) {
      divIDs.push(feedbackDivs[i].id);
    }
    for(var i=0; i<divIDs.length; i++) {
        var name = document.createElement("option");
        name.value = divIDs[i];
        name.text = divIDs[i];
        selector.appendChild(name);
    }

    var top = document.getElementById("top");
    top.appendChild(selector);

  }

    function viewFeedback() {
      var feedbackDivs = document.getElementsByClassName("feedback");
      var selector = document.getElementById("selector");
      for(var i=0; i<feedbackDivs.length; i++) {
        if(selector.value.localeCompare(feedbackDivs[i].id) == 0)
          feedbackDivs[i] = "block";
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
  echo "<div class=\"container\"><div class=\"row\">";
  echo strstr($feedback, '<div');
  echo "</div></div>";
?>

 <script>
   if(feedbackStatus()) {
     createSelector();
     viewFeedback();
   }

 </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>