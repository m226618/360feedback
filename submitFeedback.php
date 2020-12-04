<!--
Author: Courtney Tse
Creation Date: October 20
Description: Page where midshipmen can submit feedback for their company mates.
-->
<?php
  session_start();
  if(empty($_SESSION["user"]) && !isset($_SESSION["user"]))
  header("Location: welcome.html");
 ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Submit Feedback</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <script>
    //show dropdown menu of specified class once a class is selected
    function selectClass() {
      var classNames = [document.getElementById("1/C"), document.getElementById("2/C"), document.getElementById("3/C"),
                        document.getElementById("4/C")];
      var selClass = document.getElementById("class").value;
      classNames[selClass].style.display = "inline";
      for(var i=0; i<4; i++) {
        if(i != selClass)
          classNames[i].style.display = "none";
      }
    }
    </script>
    <script>
    //check if a radiobutton or checkbox is checked
    function oneIsChecked(name) {
      var arr = [name+"1", name+"2", name+"3", name+"4", name+"5"];
      for(var i=0; i<arr.length; i++) {
        if(document.getElementById(arr[i]).checked)
          return true;
      }
      return false;
    }

    //make sure all parts of form have been completed, show alert if not
    function validate() {
      if(document.getElementById("i1").value.length == 0 || document.getElementById("i2").value.length == 0 ||
          document.getElementById("i3").value.length == 0 || document.getElementById("i4").value.length == 0 || document.getElementById("i5").value.length == 0) {
            alert("Please complete all parts of the feedback form before you submit!");
            return false;
      }
/*
      var selectInputs = [document.getElementsByName("a1"), document.getElementsByName("a2"), document.getElementsByName("b1"),
      document.getElementsByName("b2"), document.getElementsByName("b3"), document.getElementsByName("c1"),
      document.getElementsByName("c2"), document.getElementsByName("d1"), document.getElementsByName("d2"),
      document.getElementsByName("cat[]"), document.getElementsByName("trend")];
*/
      if(!oneIsChecked("a1") || !oneIsChecked("a2") || !oneIsChecked("b1") || !oneIsChecked("b2") || !oneIsChecked("b3") ||
    !oneIsChecked("c1") || !oneIsChecked("c2") || !oneIsChecked("d1") || !oneIsChecked("d2") ||
  !oneIsChecked("cat") || !oneIsChecked("trend")) {
        alert("Please complete all parts of the feedback form before you submit!");
        return false;
      }


      return true;
    }

  </script>
</head>

<body class="text-dark text-center">
  <div class="jumbotron">
		<div class="display-4">360 Feedback - Submit Feedback</div>
		<br>
		<ul class="nav nav-pills justify-content-center">
			<li class="nav-item">
				<a class="nav-link" href="myAccount.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="getFeedback.php">Get Feedback</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="submitFeedback.php">Submit Feedback</a>
			</li>
      <?php
			if(!(empty($_SESSION["admin"]) && !isset($_SESSION["admin"]))){
			?>
			<li class="nav-item">
				<a class="nav-link" href="stats.php">Feedback Statistics</a>
			</li>
      <?php
      }
      ?>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>

  <?php require_once("middata_functions.inc.php"); ?>
  <div class="container">
  <div class="jumbotron">
  <div class="row">

  <form method="post" action="submit.php">
    <div class="col">
    <label> Select the Class of the Mid you want to provide feedback for:
      <select name="classNum" id="class" onchange="selectClass()">
        <option value=0>1/C</option>
        <option value=1>2/C</option>
        <option value=2>3/C</option>
        <option value=3>4/C</option>
      </select>
    </label>
    </div>
    <br>

    <div class="col">
    <label> Select a Mid to provide feedback for:
      <select name="1/C" id="1/C">
        <?php
          $userAlpha = substr($_SESSION["user"], 1, 7);
          $mids = getMidsInCo(1);
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

    <select name="3/C" id="3/C">
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

    <select name="4/C" id="4/C">
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
    </label>
    </div>
    <br>
    <div class="col">
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
    </div>
    <br>
    <div class="col">
    <label>On a scale of 1-5, how well do you know this person?
      <input id="i1" type="number" name="familiarity" min="1" max="5">
    </label>
    </div>
    <br>
    <div class="col">
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
        <td class=scale><label><input type=radio name=a1 id=a11 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=a1 id=a12 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=a1 id=a13 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=a1 id=a14 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=a1 id=a15 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan=5><b>2. Developing Subordinates.</b> Commitment to train, educate and challenge subordinates, cultivating personal and professional development
          and esprit de corps. Sets a positive example for others to follow.
        </td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=a2 id=a21 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=a2 id=a22 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=a2 id=a23  value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=a2 id=a24 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=a2 id=a25 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <th colspan=5>B. Character. Behavior and actions consistent with Navy and Marine Corps core values of honor, courage, and commitment.</th>
      </tr>
      <tr>
        <td colspan=5><b>1. Honor.</b> Being truthful and forthright in all personal and professional matters and remaining fully accountable for
          decisions and actions. Demonstrating integrity by the consistent alignment of one's actions with the values, standards, and expectations of USNA.</td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=b1 id=b11 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=b1 id=b12 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=b1 id=b13 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=b1 id=b14 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=b1 id=b15 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan=5><b>2. Courage.</b> Possessing the moral, mental and physical strength to overcome challenges, demonstrate the highest standards
          of personal conduct, and make tough decisions under stress regardless of personal consequences.</td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=b2 id=b21 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=b2 id=b22 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=b2 id=b23 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=b2 id=b24 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=b2 id=b25 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan=5><b>3. Commitment.</b> Doing one's duty in all things at all times with fidelity. Selflessly devoting oneself to our institution and heritage.
          Aspiring to achieve excellence without arrogance.</td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=b3 id=b31 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=b3 id=b32 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=b3 id=b33 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=b3 id=b34 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=b3 id=b35 value=4> 5 Exceeds Standard</label></td>
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
        <td class=scale><label><input type=radio name=c1 id=c11 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=c1 id=c12 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=c1 id=c13 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=c1 id=c14 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=c1 id=c15 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan=5><b>2. Competence.</b> The ability to complete tasks effectively and efficiently. Demonstrates a sufficiency of knowledge
          that enables one to act in a variety of situations.</td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=c2 id=c21 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=c2 id=c22 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=c2 id=c23 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=c2 id=c24 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=c2 id=c25 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <th colspan=5>D. Team Driven. Values diversity of thought and contributes to team building and team results over personal achievement.</th>
      </tr>
      <tr>
        <td colspan=5><b>1. Values Diversity of Thought</b></td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=d1 id=d11 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=d1 id=d12 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=d1 id=d13 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=d1 id=d14 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=d1 id=d15 value=4> 5 Exceeds Standard</label></td>
      </tr>
      <tr>
        <td colspan=5><b>2. Contributes to Team Building and Team Results over Personal Achievement</b></td>
      </tr>
      <tr>
        <td class=scale><label><input type=radio name=d2 id=d21 value=0> 1 Below Standard</label></td>
        <td class=scale><label><input type=radio name=d2 id=d22 value=1> 2</label></td>
        <td class=scale><label><input type=radio name=d2 id=d23 value=2> 3 Meets Standard</label></td>
        <td class=scale><label><input type=radio name=d2 id=d24 value=3> 4</label></td>
        <td class=scale><label><input type=radio name=d2 id=d25 value=4> 5 Exceeds Standard</label></td>
      </tr>
    </table>
    </div>
  <br>
  <div class="col">
  <p>In what areas are you providing feedback? Select all that apply.</p>
    <label><input type="checkbox" name="cat[]" id=cat1 value="0"> Leadership</label><br>
    <label><input type="checkbox" name="cat[]" id=cat2 value="1"> Character</label><br>
    <label><input type="checkbox" name="cat[]" id=cat3 value="2"> Professionalism</label><br>
    <label><input type="checkbox" name="cat[]" id=cat4 value="3"> Team Driven</label><br>
    <label><input type="checkbox" name="cat[]" id=cat5 value="4"> Judgment and Tact</label><br>
  </div>

  <br>
  <div class="col">
  <label><p>What are their strengths? Please elaborate and include relevant examples. If you gave a score higher than a
    3 in any of the categories listed above, give your reasons here.</p>
    <textarea id="i2" name="strengths" class="openResponse"></textarea>
  </label>
  </div>
  <br>
  <div class="col">
  <label><p>What are their areas of improvement? Please elaborate and include relevant examples. If you gave a score lower than a
    3 in any of the categories listed above, give your reasons here.</p>
    <textarea id="i3" name="areasOfI" class="openResponse"></textarea>
  </label>
  </div>
  <br>
  <div class="col">
  <label><p>What can they do to improve in these areas?</p>
    <textarea id="i4" name="waysImprove" class="openResponse"></textarea>
  </label>
  </div>
  <br>
  <div class="col">
  <p>What is the trend of their overall performance?</p>
    <label><input type="radio" name="trend" id=trend1 value="0"> Maintaining Exemplary Performance</label><br>
    <label><input type="radio" name="trend" id=trend2 value="1"> Maintaining Good Performance</label><br>
    <label><input type="radio" name="trend" id=trend3 value="2"> Improving Performance</label><br>
    <label><input type="radio" name="trend" id=trend4 value="3"> Declining Performance</label><br>
    <label><input type="radio" name="trend" id=trend5 value="4"> Maintaining Poor Performance</label>
  </div>
  <br>
  <div class="col">
  <label><p>How have you observed this trend?</p>
    <textarea id="i5" name="trendReason" class="openResponse"></textarea>
  </label>
  </div>
  <br>

  <br>
  <div class="col">
  <input type="submit" class="btn btn-primary" value="Submit" onclick="return validate()">
  </div>
  </form>
  </div>
  </div>
  </div>
  <script>
    selectClass();
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
