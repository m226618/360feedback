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

  </script>

  <h1>Your Feedback</h1>
</head>

<body>

<?php
  $feedback = getFeedback($_SESSION['alpha']);
  echo strstr($feedback, '<div');
?>

  <br>
 <a href="myAccount.php"> Go back to my account </a> <br>
 <a href="logout.php"> Logout </a>

</body>

</html>
<?php
}
?>
