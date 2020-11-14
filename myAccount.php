<?php
  session_start();
 ?>
 <!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>My Account</title>
</head>
<body>
  <p>My Account</p>
  <?php
  //user profile page (Name, Company, Alpha, MIDS photo)
if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
	  {
		      echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
} else {
	echo "  <a href=\"getFeedback.php\"> View Feedback </a> <br>
		  <a href=\"submitFeedback.php\"> Submit Feedback </a> <br>
		    <a href=\"stats.php\"> Feedback Statistics </a> <br>
		      <!--admin only: special privileges to lock users out / change their passwords-->
			<a href=\"logout.php\">Logout </a> <br>";


}
?>


</body>
</html>
