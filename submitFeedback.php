<?php
  session_start();
 ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Submit Feedback</title>
</head>

<body>

  <!--explanation / tips for writing good feedback

	  //feedback form (action="submit.php")-->

	  <?php
	  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
	    {
	        echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
		  }
		    else
		      {
			      echo "<a href=\"myAccount.php\"> My Account </a> <br>
  <a href=\"logout.php\"> Logout </a>";
	}
  ?>
</body>

</html>
