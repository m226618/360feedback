<!-- script that takes midinfo.txt file and serializes it into a an array
    in midinfo.ser -->
<!-- Author: John Babiak and Coutney Tse -->
<?php
//get the text file as an array of each line
$allLines = file("midinfo.txt");
//remove the first line of info
$unrefData = array_slice($allLines,1);

//keep track of the overall array
//also set variable to be later set to max year
$allMids = [];
$maxYear = 0;

//go through all of the line entries, adding to array and getting max year
for($i = 0; $i < count($unrefData)-1; $i++)
{
  $curline = array(substr($unrefData[$i], 0, 6), substr($unrefData[$i], 8, -6), substr($unrefData[$i], -4));
  $out = substr($curline[0], 0, 2);
  if((int)substr($curline[0], 0, 2) > $maxYear)
  {
    $maxYear = (int)substr($curline[0], 0, 2);
  }
  //add another entry to the allMids array with the current line
  array_push($allMids, $curline);
}
//create array to be later serialied. 4D array that goes [company][year][mid][feedback]
$allData = [31][$maxYear+1][50][0];

//go through all mids, parse out info and add to data array
for($i = 0; $i < count($allMids); $i++)
{
  //get company, year and  num
  $company = (int) $allMids[$i][2];
  $year = (int) substr($allMids[$i][0], 0, 2);
  $num = 0;

  //keeping track of mid number
  for($j = 0; $j < 50; $j++)
  {
    if($allData[$company][$year][$j] != NULL)
    {
      $num++;
    }
  }
  //set the indicies of the array to the values found
  $allData[$company][$year][$num][0] = $allMids[$i][0] . " " . $allMids[$i][1] . "*";
  $allData[$company][$year][$num][1] = 0;
  $allData[$company][$year][$num][2] = 0;
}

//open serialized array file and output the serialized array 
$ser = fopen("midinfo.ser", 'w');
if(!$ser)
{
  echo "<p>There was an error outputing the serialized array</p>";
}
fwrite($ser, serialize($allData));

?>
