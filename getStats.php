<?php
  session_start();
  require_once('middata_functions.inc.php');
  $co = $_GET['co'];
  $array = getMidsInCompany($co);
  echo 
  "<table class=\"table table-hover\">
    <thead>
      <tr>
        <th>Name</th>
        <th>Alpha</th>
        <th>Feedback Submitted</th>
        <th>Feedback Recieved</th>
      </tr>
    </thead>
    <tbody>";
  for($i = 0; $i < count($array); $i++)
  {
    echo "<tr>";
    $arr = explode("*", $array[$i], 2);
    $out = $arr[0];
    $alpha = substr($out, 0, 6);
    $name = substr($out, 6, strlen($out)-7);
    $out1 = "<td>$name</td><td>$alpha</td><td>" . getFeedbackSubm($alpha, $co) . "</td><td>" . getFeedbackRcvd($alpha, $co) . "</td>";
    if($out != null)
    {
      echo $out1;
    }
    echo "</tr>";
  }
  echo "</tbody></table>";
 ?>
