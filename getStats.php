<!-- php script that grabs all the users in a company that is specified in a
    get request and then also gives info about the feedback they have
    submitted and recieved. Meant for use with AJAX -->

<!-- Author: John Babiak -->
<?php
  //start session and get functions from middata_functions
  session_start();
  require_once('middata_functions.inc.php');

  //get the supplied company info
  $co = $_GET['co'];

  //call function to get all mids in a company
  $array = getMidsInCompany($co);

  //for every mid in the array:
  for($i = 0; $i < count($array); $i++)
  {
    //get their alpha code and name
    $arr = explode("*", $array[$i], 2);
    $out = $arr[0];
    $alpha = substr($out, 0, 6);

    //add on the feedback information
    $out1 = $out . " Feedback submitted: " . getFeedbackSubm($alpha, $co) . " Feedback recieved: " . getFeedbackRcvd($alpha, $co);
    if($out != null)
    {
      //if not null, echo out the information 
      echo $out1 . "<br>";
    }
  }
 ?>
