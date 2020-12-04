<!-- Redirects to the welcome page -->
<!-- Author: John Babiak -->
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>360 Feedback</title>
</head>

<body>
<h1> Redirecting to welcome page.. </h1>
<?php
  //here is where the redirect happens
  header("Location: welcome.html");
 ?>

 <!-- backup link if something goes wrong with redirect -->
 <p>If you are not redirected, click <a href="welcome.html">here</a> </p>

</body>

</html>
