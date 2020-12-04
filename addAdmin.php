<?php
  session_start();
  if($_SESSION['user'] != 'm234158')
    header("Location: welcome.html");
  //CHANGE BACK TO THIS BEFORE PUSH
  // if($_SESSION['user'] != 'm226618')
  //   header("Location: welcome.html");
?>
<!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>Add Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="text-dark text-center">
  <div class="jumbotron display-4">Add Administrator</div>
  <div class="jumbotron">
    <form method="POST" action="addAdmin.php">
      <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" placeholder="Email Address" id="email">
        <br>
        <input type="submit" class="btn btn-primary" value="Submit">
      </div>
    </form>
  </div>
  <?php
    $fp = fopen("whitelist.txt", 'a');
    if(!$fp){
    ?>
      <div class="jumbotron"><h4>Failed to open whitelist file!</h4></div>
    <?php
    }
    fwrite($fp, $_POST['email'] . "\n");
    $email = $_POST['email'];
    $message = "$email:\n\nYour administrator account has successfully been created.\n\nYou will now have access to feedback statistics and other admin-only features.";
    mail($email, "Admin Account Activated", $message);
  ?>

  <div class="row text-center justify-content-center">
    <div class="col">
      <div class="jumbotron bg-white"><a href="welcome.html" class="btn btn-link" role="button">Home</a></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
