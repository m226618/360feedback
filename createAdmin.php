<?php
  //
  session_start();
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
    header("Location: welcome.html");
 ?>
 <!DOCTYPE html>
<!--
Author: John Babiak
Creation Date: October 20
Description: This is the page that all admin account creation attempts are sent to. This page processes the data and sends an email to the super-admin, 
             The only user with the ability to add new admins.
-->
<html>
<head lang="en"><meta charset = "utf-8">
  <title>Create Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="text-dark text-center">
<div class="jumbotron text-center display-4">Admin Account Application Submitted</div>

  <?php
  //This section recieves the fields that the user inputted in adminSignup.html, and uses them to compose an email to the super-admin detailing 
  //The potential administrators request.
  $name = $_POST['name'];
  $email = $_POST['email'];
  $position = $_POST['position'];

  $message = "A new user is attempting to gain administrator privileges.\n\nTheir details are as follows\nName: $name\nEmail: $email\nPosition: $position\n\nThis is an automated message, please do not reply.";

  mail("m226618@usna.edu", "Attempted Admin Access", $message);


  ?>

  <div class="row text-center justify-content-center">
    <div class="col">
      <div class="jumbotron"><a href="welcome.html" class="btn btn-primary" role="button">Return</a></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
