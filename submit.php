<?php
  // Using sessions to store user login information
  session_start();
?>
<!DOCTYPE html>

<html>
<head lang="en"><meta charset = "utf-8">
  <title>Submit</title>
  <style>
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 1000px;
    }

    .scale {
      width: 200px;
    }

    .openResponse {
      width: 500px;
      height: 50px;
    }
  </style>
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

  //array to keep track of which options are selected in the radio and check input types (populated after validation)
  $checkedArr = [["disabled","disabled","disabled","disabled","disabled"]];
  //array of radio values then checkbox values
  $radCheckVals = [$a1, $a2, $b1, $b2, $b3, $c1, $c2, $d1, $d2, $trend, $traits];

  //Find the alpha of the reviewee, which will be the first parameter in getFeedback(revieweeAlpha, feedback)
  //array of the 4 possibly selected mids (one from each class/selector)
  $revieweeArr = [$fir, $sec, $thi, $fou];
  //alpha of reviewee is:
  $revieweeAlpha = $revieweeArr[$classNum];

  $vars = [$fam, $a1, $a2, $b1, $b2, $b3, $c1, $c2, $d1, $d2, $strengths, $areasOfImp, $ways, $trend, $trendReason];
  $emptyVar = false;
  for($i=0; $i<15 && !$emptyVar; $i++) {
    if($vars[$i] == NULL) {
      $emptyVar = true;
    }
  }

  //validate for mandatory fields
  if($emptyVar || count($traits) == 0 ) {
    echo "<p>Incomplete</p>";
  } else {
    //when everything is validated correctly, write all the feedback and embedded HTML to $feedback string, then
    //write $feedback to reviewee's array

    //populate radiobutton/checkbox array to check the selected options
    for($i=0; $i<10; $i++) {
      $arr = ["disabled","disabled","disabled","disabled","disabled"];
      array_push($checkedArr, $arr);
    }
    //place checked values in checkedArr for all 10 radio inputs
    for($i=0; $i<10; $i++) {
      $checkedArr[$i][$radCheckVals[$i]] = "checked";
    }
    //place checked values in checkedArr for the traits (checkbox input)
    for($i=0; $i < count($traits); $i++)
      $checkedArr[10][$traits[$i]] = "checked";

    //name of reviewer
    $name = $_SESSION['first']." ".$_SESSION['last'];

    if(substr($_SESSION["user"], 1, 3)==$_SESSION['maxYear'])
      $name = "Plebe"; //NEED TO TEST WITH A (FRIENDLY) PLEBE

    echo "<p> Your feedback has been submitted! </p> ";


    $feedback = "
    <div id=\"$name\">
      <fieldset>
        <legend>Feedback submitted by: $name</legend>
        <p>This person is my: $rel</p>\n
        <p>On a scale of 1-5, how well do you know this person? $fam</p>
        <table>
        <tr>
          <th colspan=5> A. Leadership. Demonstrated ability to effectively lead and develop subordinates by establishing and achieving goals that support the mission,
            providing clear and timely communication, and setting a positive example for others to follow.
          </th>
        </tr>
        <tr>
          <td colspan=5><b>1. Leading Subordinates.</b> Applies leadership principles to provide direction, motivate and influence subordinates to accomplish assigned tasks.
            Ensures effective communication, both in receiving and conveying information. Sustains morale while maximizing subordinates' performance.
          </td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[0][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[0][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[0][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[0][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[0][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <td colspan=5><b>2. Developing Subordinates.</b> Commitment to train, educate and challenge subordinates, cultivating personal and professional development
            and esprit de corps. Sets a positive example for others to follow.
          </td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[1][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[1][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[1][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[1][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[1][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <th colspan=5>B. Character. Behavior and actions consistent with Navy and Marine Corps core values of honor, courage, and commitment.</th>
        </tr>
        <tr>
          <td colspan=5><b>1. Honor.</b> Being truthful and forthright in all personal and professional matters and remaining fully accountable for
            decisions and actions. Demonstrating integrity by the consistent alignment of one's actions with the values, standards, and expectations of USNA.</td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[2][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[2][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[2][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[2][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[2][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <td colspan=5><b>2. Courage.</b> Possessing the moral, mental and physical strength to overcome challenges, demonstrate the highest standards
            of personal conduct, and make tough decisions under stress regardless of personal consequences.</td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[3][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[3][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[3][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[3][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[3][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <td colspan=5><b>3. Commitment.</b> Doing one's duty in all things at all times with fidelity. Selflessly devoting oneself to our institution and heritage.
            Aspiring to achieve excellence without arrogance.</td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[4][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[4][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[4][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[4][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[4][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <th colspan=5>C. Professionalism. Demonstrated initiative and competence to consistently produce quality results. Dedicated to the profession
            of arms, the traditions and customs of the Naval Service and the constitutional foundation of the US.</th>
        </tr>
        <tr>
          <td colspan=5><b>1. Profession of Arms.</b> Commitment to intellectual and professional growth. Increases the breadth and depth of
            warfighting and leadership aptitude. Integrates naval traditions and customs into daily practices and leadership decisions.</td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[5][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[5][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[5][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[5][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[5][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <td colspan=5><b>2. Competence.</b> The ability to complete tasks effectively and efficiently. Demonstrates a sufficiency of knowledge
            that enables one to act in a variety of situations.</td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[6][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[6][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[6][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[6][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[6][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <th colspan=5>D. Team Driven. Values diversity of thought and contributes to team building and team results over personal achievement.</th>
        </tr>
        <tr>
          <td colspan=5><b>1. Values Diversity of Thought</b></td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[7][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[7][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[7][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[7][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[7][4]} >5 Exceeds Standard</label></td>
        </tr>
        <tr>
          <td colspan=5><b>2. Contributes to Team Building and Team Results over Personal Achievement</b></td>
        </tr>
        <tr>
          <td class=scale><label><input type=radio value=1 {$checkedArr[8][0]} >1 Below Standard</label></td>
          <td class=scale><label><input type=radio value=2 {$checkedArr[8][1]} >2</label></td>
          <td class=scale><label><input type=radio value=3 {$checkedArr[8][2]} >3 Meets Standard</label></td>
          <td class=scale><label><input type=radio value=4 {$checkedArr[8][3]} >4</label></td>
          <td class=scale><label><input type=radio value=5 {$checkedArr[8][4]} >5 Exceeds Standard</label></td>
        </tr>
        </table>

        <p>In what areas are you providing feedback? Select all that apply.</p>
          <label><input type=checkbox value=0 {$checkedArr[10][0]} >Leadership</label><br>
          <label><input type=checkbox value=1 {$checkedArr[10][1]} >Character</label><br>
          <label><input type=checkbox value=2 {$checkedArr[10][2]} >Professionalism</label><br>
          <label><input type=checkbox value=3 {$checkedArr[10][3]} >Team Driven</label><br>
          <label><input type=checkbox value=4 {$checkedArr[10][4]} >Judgment and Tact</label><br>


        <br><br>

        <label><p>What are their strengths? Please elaborate and include relevant examples. If you gave a score higher than a
          3 in any of the categories listed above, give your reasons here.</p>
          <textarea name=strengths class=openResponse disabled>$strengths</textarea>
        </label>

        <br><br>

        <label><p>What are their areas of improvement? Please elaborate and include relevant examples. If you gave a score lower than a
          3 in any of the categories listed above, give your reasons here.</p>
          <textarea name=areasOfI class=openResponse disabled>$areasOfImp</textarea>
        </label>

        <br><br>

        <label><p>What can they do to improve in these areas?</p>
          <textarea name=waysImprove class=openResponse disabled>$ways</textarea>
        </label>

        <br><br>

        <p>What is the trend of their overall performance?</p>
          <label><input type=radio value=0 {$checkedArr[9][0]} >Maintaining Exemplary Performance</label><br>
          <label><input type=radio value=1 {$checkedArr[9][1]} >Maintaining Good Performance</label><br>
          <label><input type=radio value=2 {$checkedArr[9][2]} >Improving Performance</label><br>
          <label><input type=radio value=3 {$checkedArr[9][3]} >Declining Performance</label><br>
          <label><input type=radio value=4 {$checkedArr[9][4]} >Maintaining Poor Performance</label>

        <br><br>

        <p>How have you observed this trend?</p>
          <textarea name=trendReason class=openResponse disabled>$trendReason</textarea>


      </fieldset>
    </div>";

    addFeedback($revieweeAlpha, $feedback);
  }



  ?>
  
  <br>
 <a href="myAccount.php"> Go back to my account </a> <br>
 <a href="logout.php"> Logout </a>

</body>
</html>
