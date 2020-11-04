<?php
$allLines = file("midinfo.txt");
$unrefData = array_slice($allLines,1);
$allMids = [];
$maxYear = 0;
for($i = 0; $i < count($unrefData)-1; $i++)
{
  $curline = array(substr($unrefData[$i], 0, 6), substr($unrefData[$i], 8, -6), substr($unrefData[$i], -4));
  $out = substr($curline[0], 0, 2);
  if((int)substr($curline[0], 0, 2) > $maxYear)
  {
    $maxYear = (int)substr($curline[0], 0, 2);
  }
  array_push($allMids, $curline);
}
$allData = [31][$maxYear+1][50][0];
for($i = 0; $i < count($allMids); $i++)
{
  $company = (int) $allMids[$i][2];
  $year = (int) substr($allMids[$i][0], 0, 2);
  $num = 0;
  for($j = 0; $j < 50; $j++)
  {
    if($allData[$company][$year][$j] != NULL)
    {
      $num++;
    }
  }
  $allData[$company][$year][$num][0] = $allMids[$i][0] . " " . $allMids[$i][1];
}
$ser = fopen("midinfo.ser", 'w');
if(!$ser)
{
  echo "<p>There was an error outputing the serialized array</p>";
}
fwrite($ser, serialize($allData));

?>
