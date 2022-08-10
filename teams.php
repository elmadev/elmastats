<?php include("top.php"); ?>
<?php
  $teams = array();
  foreach ($users as $user) {
    $teams[$user["team"]]++;
  }
  
  function cmpc($a, $b) {
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
  }
  uasort($teams, "cmpc");
    
  echo("<b>Teams (" . count($teams) . ")</b><br/><br/>");
  echo("<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">");
  foreach ($teams as $team => $teamc) {
    if ($team != "") {
      echo("<tr>");
      echo("<td width=\"150px\"><a href=\"team.php?team=" . fix($team) . "\">" . fix($team) . "</a></td>");
      echo("<td>" . $teamc . " kuski" . ($teamc == 1 ? "" : "s") . "</td>");
      echo("</tr>");
    }
  }
  echo("</table>");
?>
<?php include("tpo.php"); ?>