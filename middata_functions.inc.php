<?php

/*
  this file contains functions that can be used to manipulate the
  array database

  use the getCo(alpha) function to get the company of a mid given
  their alpha

  use the addFeedback(alpha, feedback) function to add feedback to a
  mid using their alpha and then the feedback as a String

  use the getFeedback(alpha) function to get the feedback of a mid
  using their alpha

  the convTextToSer() function takes the "midinfo.txt" file in the
  current directory and converts it to a serialized version that is
  used as the database

  the getMidsInCo(class) function returns all the midshipmen in the same
  company and a specified class year

*/

/*
  this function returns the max class year from the midinfo.txt file
*/
function getMaxYear()
{
  //open midinfo.txt as array and remove first line
  $allLines = file("midinfo.txt");
  $unrefData = array_slice($allLines,1);
  $maxYear = 0;

  //search through the file looking at alphas first two nums and seeing
  //if there is a new max
  for($i = 0; $i < count($unrefData)-1; $i++)
  {
    $curline = array(substr($unrefData[$i], 0, 6), substr($unrefData[$i], 8, -6), substr($unrefData[$i], -4));
    $out = substr($curline[0], 0, 2);
    if((int)substr($curline[0], 0, 2) > $maxYear)
    {
      $maxYear = (int)substr($curline[0], 0, 2);
    }
  }
  return $maxYear;
}

/*
  this function returns the minimum class year from the midinfo.txt file
*/
function getMinYear()
{
  //open midinfo.txt as array and remove first line
  $allLines = file("midinfo.txt");
  $unrefData = array_slice($allLines,1);
  $minYear = getMaxYear();

  //search through the file looking at alphas first two nums and seeing
  //if there is a new min
  for($i = 0; $i < count($unrefData)-1; $i++)
  {
    $curline = array(substr($unrefData[$i], 0, 6), substr($unrefData[$i], 8, -6), substr($unrefData[$i], -4));
    $out = substr($curline[0], 0, 2);
    if((int)substr($curline[0], 0, 2) < $minYear)
    {
      $minYear = (int)substr($curline[0], 0, 2);
    }
  }
  return $minYear;
}

/*
  Use this function to get the company of a mid using their alpha
*/
function getCo($alpha)
{
  //open serialized array file
  $serfile = fopen("midinfo.ser", 'r');
  if(!$serfile)
  {
    echo "<p>There was an error reading the serialized array</p>";
  }

  //get the serialized string out of the file
  $serialized = fgets($serfile);

  //unserialize the serialized string and get the 3D array
  $orig = unserialize($serialized);

  $foundUser = false;

  //here we loop through all companies, years, and inidividual mids looking
  //for a match to the given alpha
  for($c = 1; $c <= 30 && !$foundUser; $c++)
  {
    for($y = getMinYear(); $y <= getMaxYear() && !$foundUser; $y++)
    {
      for($num = 0; $num < 50 && !$foundUser; $num++)
      {
        //if we find the alpha, set co variable to current company index
        if($alpha == substr($orig[$c][$y][$num][0], 0, 6))
        {
          $co = $c;
          $foundUser = true;
        }
      }
    }
  }
  return $co;
}

/*
  use this function to add feedback to a mid using their alpha
*/
function addFeedback($alpha, $feedback)
{
  //open serialized array file
  $serfile = fopen("midinfo.ser", 'r');
  if(!$serfile)
  {
    echo "<p>There was an error reading the serialized array</p>";
  }

  //get the serialized string out of the file
  $serialized = fgets($serfile);

  //unserialize the serialized string and get the 3D array
  $orig = unserialize($serialized);

  //here we loop through all years, and inidividual mids looking
  //for a match to the given alpha
    for($y = getMinYear(); $y <= getMaxYear(); $y++)
    {
      for($num = 0; $num < 50; $num++)
      {
        //if we find the alpha, append the mid's array with given feedback
        if($alpha == substr($orig[$_SESSION['co']][$y][$num][0], 0, 6))
        {
          array_push($orig[$_SESSION['co']][$y][$num], $feedback);
        }
      }
    }

  //open serialized array file
  $ser = fopen("midinfo.ser", 'w');
  if(!$ser)
  {
    echo "<p>There was an error outputing the serialized array</p>";
  }

  //write the serialized array to the file
  fwrite($ser, serialize($orig));
}

/*
  use this function to get a mid's feedback using their alpha
*/
function getFeedback($alpha)
{
  //open serialized array file
  $serfile = fopen("midinfo.ser", 'r');
  if(!$serfile)
  {
    echo "<p>There was an error reading the serialized array</p>";
  }

  //get the serialized string out of the file
  $serialized = fgets($serfile);

  //unserialize the serialized string and get the 3D array
  $orig = unserialize($serialized);
  $feedback = [];

  //here we loop through all companies, years, and inidividual mids looking
  //for a match to the given alpha
  for($c = 1; $c <= 30; $c++)
  {
    for($y = getMinYear(); $y <= getMaxYear(); $y++)
    {
      for($num = 0; $num < 50; $num++)
      {
        //if we find the alpha, grab the mid array and cut off the first
        //index (which contains the mid's name) then set it as the return
        if($alpha == substr($orig[$c][$y][$num][0], 0, 6))
        {
          $feedback = array_slice($orig[$c][$y][$num], 1);
        }
      }
    }
  }
  return $feedback;
}

/*
  use this function to convert the "midinfo.txt" file into a serialized
  "midinfo.ser" file that is used to store all mid information in a sort
  of database
*/
function convTextToSer()
{
  //open midinfo.txt and remove first, non-data line
  $allLines = file("midinfo.txt");
  $unrefData = array_slice($allLines,1);
  $allMids = [];

  //go through midinfo and parse out alpha, name and company, then push
  //these onto the allMids array for later distillation
  for($i = 0; $i < count($unrefData)-1; $i++)
  {
    $curline = array(substr($unrefData[$i], 0, 6), substr($unrefData[$i], 8, -6), substr($unrefData[$i], -4));
    $out = substr($curline[0], 0, 2);
    array_push($allMids, $curline);
  }

  //set up the array that stores all midshipman information
  $allData = [31][getMaxYear()+1][50][0];

  //go through allData array setting proper array indicies for company, year,
  //and then setting a 0-39 number for each mid
  for($i = 0; $i < count($allMids); $i++)
  {
    $company = (int) $allMids[$i][2];
    $year = (int) substr($allMids[$i][0], 0, 2);
    $num = 0;
    for($j = 0; $j < 50; $j++)
    {
      //assign number by looking through array of mids in same year and co
      //until there is a null value
      if($allData[$company][$year][$j] != NULL)
      {
        $num++;
      }
    }

    //set the actual data for every index here
    $allData[$company][$year][$num][0] = $allMids[$i][0] . " " . $allMids[$i][1];
  }
  //opening serialized array file
  $ser = fopen("midinfo.ser", 'w');
  if(!$ser)
  {
    echo "<p>There was an error outputing the serialized array</p>";
  }

  //write the serialized array to the file
  fwrite($ser, serialize($allData));
}

/*
  use this function to get an array of the mids that are in the user's
  company and specified class
*/
function getMidsInCo($class)
{
  //open serialized array file
  $serfile = fopen("midinfo.ser", 'r');
  if(!$serfile)
  {
    echo "<p>There was an error reading the serialized array</p>";
  }

  //get the serialized string out of the file
  $serialized = fgets($serfile);

  //unserialize the serialized string and get the 3D array
  $orig = unserialize($serialized);
  $mids = [];

  $readAll = false;
  $y = getMaxYear()-4+$class;
    //add all mids in the specified class to the return array
      for($i = 0; $i < 50 && !$readAll; $i++)
      {
        if(!empty($orig[$_SESSION['co']][$y][$i][0])) {
          array_push($mids, substr($orig[$_SESSION['co']][$y][$i][0], 0));
        } else {
          $readAll = true;
        }
      }
  return $mids;
}

?>
