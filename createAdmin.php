<?php
  session_start();
 ?>
 <!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>Create Admin</title>
</head>
<body>
  <p>Create Admin</p>

  <?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $position = $_POST['position'];

  $message = "A new user is attempting to gain administrator privileges.\n\nTheir details are as follows\nName: $name\nEmail: $email\nPosition: $position\n\nThis is an automated message, please do not reply.";

  mail("m230270@usna.edu", "Attempted Admin Access", $message);
  //need to verify that user is admin
  
  //query for name, email, and position.
  
  //send email to courtney 

  //courtney will redirect them to a new file to set up session variables if admitted.



  ?>

  <a href="welcome.html"> Home </a> <br>

</body>
</html>
