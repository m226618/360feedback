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

  //for every mid in the array:
  for($i = 0; $i < count($array); $i++)
  {
    echo "<tr>";
    //get their alpha code and name
    $arr = explode("*", $array[$i], 2);
    $out = $arr[0];
    $alpha = substr($out, 0, 6);

    $name = substr($out, 6, strlen($out)-7);
    $out1 = "<td>$name</td><td>$alpha</td><td>" . getFeedbackSubm($alpha, $co) . "</td><td>" . getFeedbackRcvd($alpha, $co) . "</td>";
    if($out != null)
    {
      //if not null, echo out the information
      echo $out1;
    }
    echo "</tr>\n";
  }
  echo "</tbody></table>";
 ?>
