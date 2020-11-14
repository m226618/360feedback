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
    require_once("middata_functions.inc.php");

	  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
	    {
	        echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
		  }
		    else
		      {
			      echo "<a href=\"myAccount.php\"> My Account </a> <br>

  <a href=\"logout.php\"> Logout </a>";
  ?>

  <form method="post" action="submit.php">

    <label> Select a Mid to provide feedback for:
      <select name="mid">
        <?php
          echo $_SESSION["user"];
          $userAlpha = substr($_SESSION["user"], 1, 7);
          $mids = getMidsInCo($userAlpha);
          for($i = 0; $i < count($mids); $i++) {
            //if(!empty($mids[$i])) {
              $alpha = substr($mids[$i], 0, 6);
              if($alpha != $userAlpha) {
                $name = substr($mids[$i], 7);
                echo "<option value=\"$alpha\">$name</option>";
              }
            //}
          }
        ?>
      </select>
    </label>


  </form>

      	<?php
          }
        ?>

</body>

</html>
