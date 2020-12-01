<?php
  session_start();
  require_once('middata_functions.inc.php');
  $co = $_GET['co'];
  $array = getMidsInCompany($co);
  for($i = 0; $i < count($array); $i++)
  {
    $arr = explode("*", $array[$i], 2);
    $out = $arr[0];
    $alpha = substr($out, 0, 6);
    $out1 = $out . " Feedback submitted: " . getFeedbackSubm($alpha, $co) . " Feedback recieved: " . getFeedbackRcvd($alpha, $co);
    if($out != null)
    {
      echo $out1 . "<br>";
    }
  }
 ?>
