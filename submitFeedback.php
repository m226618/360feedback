<?php
  session_start();
 ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Submit Feedback</title>

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

  <script>

    function selectClass() {
      var classNames = [document.getElementById("1/C"), document.getElementById("2/C"), document.getElementById("3/C"),
                        document.getElementById("4/C")];
      var selClass = document.getElementById("class").value;
      classNames[selClass-1].style.display = "inline";
      for(var i=0; i<4; i++) {
        if(i != selClass-1)
          classNames[i].style.display = "none";
      }
    }


  </script>
</head>

<body>

  <!--explanation / tips for writing good feedback

	  //feedback form (action="submit.php")-->

    <?php
    require_once("middata_functions.inc.php");

    if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
      {
          echo "<h2>You are not logged in</h2><p>Go to the login page <a href='login.php'>here</a></p>";
      }
        else
          {
            echo "<a href=\"myAccount.php\"> My Account </a> <br>

    <a href=\"logout.php\"> Logout </a>";
    ?>

  <form method="post" action="submit.php">

    <label> Select the Class of the Mid you want to provide feedback for:
      <select name="classNum" id="class" onchange="selectClass()">
        <option value="1">1/C</option>
        <option value="2">2/C</option>
        <option value="3">3/C</option>
        <option value="4">4/C</option>
      </select>
    </label>

    <br><br>


    <label> Select a Mid to provide feedback for:
      <select name="1/C" id="1/C">
        <?php
          $userAlpha = substr($_SESSION["user"], 1, 7);
          $mids = getMidsInCo(2);
          for($i = 0; $i < count($mids); $i++) {
              $alpha = substr($mids[$i], 0, 6);
              if($alpha != $userAlpha) {
                $name = substr($mids[$i], 7);
                echo "<option value=\"$alpha\">$name</option>";
              }
          }
        ?>
      </select>

    <select name="2/C" id="2/C">
      <?php
        $userAlpha = substr($_SESSION["user"], 1, 7);
        $mids = getMidsInCo(3);
        for($i = 0; $i < count($mids); $i++) {
            $alpha = substr($mids[$i], 0, 6);
            if($alpha != $userAlpha) {
              $name = substr($mids[$i], 7);
              echo "<option value=\"$alpha\">$name</option>";
            }
        }
      ?>
    </select>

    <select name="3/C" id="3/C">
      <?php
        $userAlpha = substr($_SESSION["user"], 1, 7);
        $mids = getMidsInCo(4);
        for($i = 0; $i < count($mids); $i++) {
            $alpha = substr($mids[$i], 0, 6);
            if($alpha != $userAlpha) {
              $name = substr($mids[$i], 7);
              echo "<option value=\"$alpha\">$name</option>";
            }
        }
      ?>
    </select>

    <select name="4/C" id="4/C">
      <?php
        $userAlpha = substr($_SESSION["user"], 1, 7);
        $mids = getMidsInCo(5);
        for($i = 0; $i < count($mids); $i++) {
            $alpha = substr($mids[$i], 0, 6);
            if($alpha != $userAlpha) {
              $name = substr($mids[$i], 7);
              echo "<option value=\"$alpha\">$name</option>";
            }
        }
      ?>
    </select>
    </label>

    <br><br>

    <label>This person is my:
    <select name="relationship">
      <option>Plebe</option>
      <option>Youngster</option>
      <option>Fire Team Leader</option>
      <option>Squad Leader</option>
      <option>Underclassmen</option>
      <option>Upperclassmen</option>
      <option>Peer</option>
    </select>
    </label>

    <br><br>

    <label>On a scale of 1-5, how well do you know this person?
      <input type="number" name="familiarity" min="1" max="5">
    </label>

    <br><br>

    <table>
      <tr>
        <th colspan="5"> A. Leadership. Demonstrated ability to effectively lead and develop subordinates by establishing and achieving goals that support the mission,
          providing clear and timely communication, and setting a positive example for others to follow.
        </th>
      </tr>
      <tr>
        <td colspan="5"><b>1. Leading Subordinates.</b> Applies leadership principles to provide direction, motivate and influence subordinates to accomplish assigned tasks.
          Ensures effective communication, both in receiving and conveying information. Sustains morale while maximizing subordinates' performance.
        </td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="a1" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="a1" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="a1" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="a1" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="a1" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan="5"><b>2. Developing Subordinates.</b> Commitment to train, educate and challenge subordinates, cultivating personal and professional development
          and esprit de corps. Sets a positive example for others to follow.
        </td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="a2" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="a2" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="a2" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="a2" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="a2" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <th colspan="5">B. Character. Behavior and actions consistent with Navy and Marine Corps core values of honor, courage, and commitment.</th>
      </tr>
      <tr>
        <td colspan="5"><b>1. Honor.</b> Being truthful and forthright in all personal and professional matters and remaining fully accountable for
          decisions and actions. Demonstrating integrity by the consistent alignment of one's actions with the values, standards, and expectations of USNA.</td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="b1" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="b1" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="b1" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="b1" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="b1" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan="5"><b>2. Courage.</b> Possessing the moral, mental and physical strength to overcome challenges, demonstrate the highest standards
          of personal conduct, and make tough decisions under stress regardless of personal consequences.</td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="b2" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="b2" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="b2" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="b2" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="b2" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan="5"><b>3. Commitment.</b> Doing one's duty in all things at all times with fidelity. Selflessly devoting oneself to our institution and heritage.
          Aspiring to achieve excellence without arrogance.</td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="b3" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="b3" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="b3" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="b3" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="b3" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <th colspan="5">C. Professionalism. Demonstrated initiative and competence to consistently produce quality results. Dedicated to the profession
          of arms, the traditions and customs of the naval Service and the constitutional foundation of the US.</th>
      </tr>
      <tr>
        <td colspan="5"><b>1. Profession of Arms.</b> Commitment to intellectual and professional growth. Increases the breadth and depth of
          warfighting and leadership aptitude. Integrates naval traditions and customs into daily practices and leadership decisions.</td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="c1" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="c1" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="c1" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="c1" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="c1" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan="5"><b>2. Competence.</b> The ability to complete tasks effectively and efficiently. Demonstrates a sufficiency of knowledge
          that enables one to act in a variety of situations.</td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="c2" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="c2" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="c2" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="c2" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="c2" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <th colspan="5">D. Team Driven. Values diversity of thought and contributes to team building and team results over personal achievement.</th>
      </tr>
      <tr>
        <td colspan="5"><b>1. Values Diversity of Thought</b></td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="d1" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="d1" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="d1" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="d1" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="d1" value="5">5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan="5"><b>2. Contributes to Team Building and Team Results over Personal Achievement</b></td>
      </tr>
      <tr>
        <td class="scale"><label><input type="radio" name="d2" value="1">1 Below Standard</label></td>
        <td class="scale"><label><input type="radio" name="d2" value="2">2</label></td>
        <td class="scale"><label><input type="radio" name="d2" value="3">3 Meets Standard</label></td>
        <td class="scale"><label><input type="radio" name="d2" value="4">4</label></td>
        <td class="scale"><label><input type="radio" name="d2" value="5">5 Exceeds Standard</label></td>
      </tr>

    </table>

<br><br>

<p>What areas are you providing feedback? Select all that apply.</p>
  <label><input type="checkbox" name="cat[]" value="Leadership">Leadership</label><br>
  <label><input type="checkbox" name="cat[]" value="Character">Character</label><br>
  <label><input type="checkbox" name="cat[]" value="Professionalism">Professionalism</label><br>
  <label><input type="checkbox" name="cat[]" value="Team Driven">Team Driven</label><br>
  <label><input type="checkbox" name="cat[]" value="Judgment and Tact">Judgment and Tact</label><br>


<br><br>

<label><p>What are their strengths? Please elaborate and include relevant examples. If you gave a score higher than a
  3 in any of the categories listed above, give your reasons here.</p>
  <textarea name="strengths" class="openResponse"></textarea>
</label>

<br><br>

<label><p>What are their areas of improvement? Please elaborate and include relevant examples. If you gave a score lower than a
  3 in any of the categories listed above, give your reasons here.</p>
  <textarea name="areasOfI" class="openResponse"></textarea>
</label>

<br><br>

<label><p>What can they do to improve in these areas?</p>
  <textarea name="waysImprove" class="openResponse"></textarea>
</label>

<br><br>

<p>What is the trend of their overall performance?</p>
  <label><input type="radio" name="trend" value="5">Maintaining Exemplary Performance</label><br>
  <label><input type="radio" name="trend" value="4">Maintaining Good Performance</label><br>
  <label><input type="radio" name="trend" value="3">Improving Performance</label><br>
  <label><input type="radio" name="trend" value="2">Declining Performance</label><br>
  <label><input type="radio" name="trend" value="1">Maintaining Poor Performance</label><br>

<br><br>

<label><p>How have you observed this trend?</p>
  <textarea name="trendReason" class="openResponse"></textarea>
</label>

<br><br>

<br><br>

<input type="submit" value="Submit">

  </form>

      	<?php
          }
        ?>

<script>
  selectClass();
</script>



</body>

</html>
