<?php
  session_start();
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

<?php
if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  {
      echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
        }
	  else { 
		echo "<a href=\"myAccount.php\"> My Account </a> <br>";
		}
?>
</body>

</html>
