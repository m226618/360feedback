<?php
  session_start();
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  header("Location: welcome.html");
 ?>
 <!DOCTYPE html>

<!-- A bare bones web page to start IT350 assignments with -->

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Stats</title>
</head>

<body>

  <p>Stats</p>
</body>

</html>
