<?php include("top.php"); 
  $info = fetchtargetinfo();
  
  echo("<table class=\"times\">\n");
  echo("<th class=\"times\" width=\"250px\">Internal</th>");
  echo("<th class=\"times\" width=\"81px\"><center>World Record</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>Godlike</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>Legendary</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>World Class</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>Professional</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>Good</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>OK</center></th>\n");
  echo("<th class=\"times\" width=\"81px\"><center>Beginner</center></th>\n");

  for ($x = 0;$x < 54;$x++) {

    //Increment target total times
    $tt0 = $tt0 + $info[$x+1]["0"];
    $tt1 = $tt1 + $info[$x+1]["1"];
    $tt2 = $tt2 + $info[$x+1]["2"];
    $tt3 = $tt3 + $info[$x+1]["3"];
    $tt4 = $tt4 + $info[$x+1]["4"];
    $tt5 = $tt5 + $info[$x+1]["5"];
    $tt6 = $tt6 + $info[$x+1]["6"];
    $tt7 = $tt7 + $info[$x+1]["7"];

      //generate table
      echo("<tr><td class=\"times\">" . internal($x+1, true) . "</td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["0"], true, false, 0, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["1"], true, false, 1, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["2"], true, false, 2, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["3"], true, false, 3, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["4"], true, false, 4, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["5"], true, false, 5, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["6"], true, false, 6, false). "</center></td>");
      echo("<td class=\"times\"><center>" . sttime("targets", $x+1, $info[$x+1]["7"], true, false, 7, false). "</center></td>");
      echo("</tr>\n");
    }
    //Spacer row
    echo("<th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th><th class=\"times\"></th>");
  
    //Total times
    echo("<tr><td class=\"times\">" . "Total time: " . "</td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt0) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt1) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt2) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt3) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt4) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt5) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt6) . "</center></td>");
    echo("<td class=\"times\"><center>" . formatElmaTime($tt7) . "</center></td>");
  
  echo("</table></div>");
 include("tpo.php"); ?>
