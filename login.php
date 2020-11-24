<?php
  // Using sessions to store user login information
  session_start();
  //check if user is already logged in
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  {
    // Define configuration options below, although normally you would do this
    // in a separate configuration file outside of the academy-credentials repo.

    // You will need to modify the values below to test locally, pointing
    // to a server which has already been set up, and from which you have
    // generated a token identifier / secret pair, this should be done by
    // going to the server website and running server/token.php

    define('AUTH_SERVER',     'https://intranet.usna.edu/CS/AUTH/');
    define('AUTH_MESSAGE',    'Please log into the Authentication Server');
    define('AUTH_TITLE',      '360 Feedback Login');
    define('AUTH_TOKEN_TIME', 100);
    define('AUTH_IDENTIFIER', 'b85a4058-965b-4461-b657-6aedce042208');
    define('AUTH_SECRET',     'cf8ad1eb-04c0-492a-922f-32837e7a8232');

    // Redirect to the login page (returning here if guest allowed,
    // or when returning from the remote authenticator).
    require_once('lib_auth_usna.php');

    require_once("middata_functions.inc.php");

    // If a real login was performed then the users information would now be
    // available in the $USER_CREDENTIALS variable.  The
    // resulting values within $USER_CREDENTIALS should look like:

    // $USER_CREDENTIALS = array('user'          => 'm123456',
    //                           'fullname'      => 'MIDN John Paul Jones',
    //                           'first'         => 'John',
    //                           'last'          => 'Jones',
    //                           'department'    => 'Computer Science',
    //                           'time'          => 1234567890);

    // To assist with your debugging, this example script will display
    // the information that was returned for your review.
    if(!empty($USER_CREDENTIALS))
    {
      $_SESSION['user'] = $USER_CREDENTIALS['user'];
      $_SESSION['first'] = $USER_CREDENTIALS['first'];
      $_SESSION['last'] = $USER_CREDENTIALS['last'];
      $_SESSION['alpha'] = substr($_SESSION["user"], 1, 7);
      $_SESSION['co'] = getCo($_SESSION['alpha']);
      $_SESSION['maxYear'] = getMaxYear();
      $fp = fopen("whitelist.txt", 'r');
      if($fopen)
      {
        echo "There was an error opening the whitelist file";
      }
      else
      {
        $line = fgets($fp);
        while( !feof($fp) )
        {
          $len = strlen($_SESSION['user']);
          if(substr($line, 0, $len) == $_SESSION['user'])
          {
            echo substr($line, 0, $len);
            $_SESSION['admin'] = "true";
            break;
          }
          $line = fgets($fp);
        }
      }

    }
    echo "<h1> Login successful <br> <p> Redirecting... </p> </h1>";
    header("Location: myAccount.php");


    // You will need to create some mechanism within your scripts that stores
    // the information regarding a successful log in, I suggest using sessions.
    // You will only want to run this library if the user is not currently
    // logged on.
  }
  else
  {
    echo "<h1> Login successful <br> <p> Redirecting... </p> </h1>";
    header("Location: myAccount.php");
  }



 ?>

 <!DOCTYPE html>

 <!-- login validation page -->

 <html lang="en">

 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" type="text/css" href="styles.css" >
   <title>Login</title>
 </head>

 </html>
