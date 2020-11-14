<!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>Submit</title>
</head>
<body>

  <?php
  require_once("middata_functions.inc.php");

  //record all variables
  $classNum = $_POST['classNum'];
  $fir = $_POST['1/C'];
  $sec = $_POST['2/C'];
  $thi = $_POST['3/C'];
  $fou = $_POST['4/C'];
  $rel = $_POST['relationship'];
  $fam = $_POST['familiarity'];
  $a1 = $_POST['a1'];
  $a2 = $_POST['a2'];
  $b1 = $_POST['b1'];
  $b2 = $_POST['b2'];
  $b3 = $_POST['b3'];
  $c1 = $_POST['c1'];
  $c2 = $_POST['c2'];
  $d1 = $_POST['d1'];
  $d2 = $_POST['d2'];
  $traits = $_POST['cat'];
  $strengths = $_POST['strengths'];
  $areasOfImp = $_POST['areasOfI'];
  $ways = $_POST['waysImprove'];
  $trend = $_POST['trend'];
  $trendReason = $_POST['trendReason'];

  $vars = [$fam, $a1, $a2, $b1, $b2, $b3, $c1, $c2, $d1, $d2, $strengths, $areasOfImp, $ways, $trend, $trendReason];
  $emptyVar = false;
  for($i=0; $i<15 && !$emptyVar; $i++) {
    if(empty($vars[$i])) {
      $emptyVar = true;
      //echo $i; testing - which input was incomplete
    }
  }

  //validate for mandatory fields
  if($emptyVar || count($traits) == 0 ) {
    echo "<p>Incomplete</p>";
  } else {
    //when everything is validated correctly, write all the feedback and embedded HTML to $feedback string, then
    //write $feedback to reviewee's array

    echo "<p> Your feedback has been submitted! </p>";

    $feedback = "";
    //addFeedback($_SESSION['alpha'], $feedback);
  }



  ?>


</body>
</html>
