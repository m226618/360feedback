<?php
  session_start();
  if($_SESSION['user'] != 'm226618')
    header("Location: welcome.html");
?>
<!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>Add Admin</title>
</head>
<body>
  <p>Add Administrator</p>

  <form method="POST" action="addAdmin.php">
    <label for="email">Email: </label>
    <input type="email" name="email" placeholder="Email Address" id="email">
    <br>
    <input type="submit" value="Submit">
  </form>

  <?php
    $fp = fopen("whitelist.txt", 'a');
    if(!$fp)
        echo "<p>Failed to open whitelist txt file!</p>\n";
    fwrite($fp, $_POST['email'] . "\n");
  ?>

  <a href="welcome.html"> Home </a> <br>

</body>
</html>
