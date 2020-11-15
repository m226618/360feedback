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
  <h1>Your Feedback</h1>
</head>

<body>

<table>
<?php
  $feedback = getFeedback($_SESSION['alpha']);
  echo $feedback;
?>
</table>
 <a href="myAccount.php"> Go back to my account </a> <br>
 <a href="logout.php"> Logout </a>

</body>

</html>
<?php
}
?>
