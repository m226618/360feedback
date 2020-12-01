<?php
  session_start();
?>

<!DOCTYPE html>

<!-- A logout form for a webpage -->

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="styles.css" >
  <title>Logout</title>
</head>

<body>

<?php
  //check that the user has an assigned session username and password
  //and, if so, destroy their current session, logging them out

  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  {
    echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
  }
  else
  {
    unset($_SESSION["user"]);
    unset($_SESSION['first']);
    unset($_SESSION['last']);
    unset($_SESSION['alpha']);
    unset($_SESSION['co']);
    unset($_SESSION['maxYear']);
    unset($_SESSION['admin']);
    echo "<h2>You are now logged out</h2>";
    header("Location: welcome.html");
  }
 ?>

</body>

</html>
