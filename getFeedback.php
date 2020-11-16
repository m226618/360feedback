<?php
  require_once('middata_functions.inc.php');
  session_start();
  //need to verify that user is logged in before displaying page
  if(empty($_SESSION['user']) && !isset($_SESSION['user']))
  {
    echo "You are not logged in";
  }
  else
  {
 ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>View Feedback</title>
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

  <h1>Your Feedback</h1>
</head>

<body>

  <label id="top">
    View feedback from the following Mid:
  </label>

  <br><br>

<?php
  $feedback = getFeedback($_SESSION['alpha']);
  echo strstr($feedback, '<div');
?>

  <br>
 <a href="myAccount.php"> Go back to my account </a> <br>
 <a href="logout.php"> Logout </a>

 <script>
   createSelector();
   viewFeedback();
 </script>

</body>

</html>
<?php
}
?>
