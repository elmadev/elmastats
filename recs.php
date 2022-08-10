<?php include("top.php"); ?>
<?php
  $targets = loadTargets();

  $topnum = $_GET["top"];
  if ($topnum == 0) $topnum = 10;
  echo("<b>Top" . $topnum . "s of internal recs</b> (<a href=\"fredrik.php\">dl best recs</a>)<br/><br/><br/>");
  $utimes = array();
  $unicks = array();
  $c = 0;
  foreach ($users as $cItem) {
    $utimes[] = stateTimes($cItem["nick"], $cItem["elmaname"]);
    $unicks[] = $cItem["nick"];
    $c++;
  }

  echo("<div class=\"lefty\">");
  for ($x = 0;$x < 54;$x++) {
    $top = array();
    for ($y = 0;$y < $c;$y++) {
      $cItem["nick"] = $unicks[$y];
      $cItem["time"] = $utimes[$y][$x+1][1];
      if ($cItem["time"] == 0) $cItem["time"] = 60000;
      if ($cItem["time"] < 60000 && file_exists("recs/" . $cItem["nick"] . "/" . str_pad($x+1, 2, "0", STR_PAD_LEFT) . $cItem["nick"] . formatRecTime($cItem["time"]) . ".rec"))
        $top[] = $cItem;
    }
    usort($top, "cmp");
    
    echo("<table class=\"times\">\n");
    echo("<tr><th class=\"times\" width=\"20px\">" . ($x+1) . ".</th>");
    echo("<th class=\"times\" width=\"180px\">" . internal($x+1, false, true, false) . "</th>");
    echo("<th class=\"times\" width=\"81px\"></th></tr>\n");
    for ($y = 0;$y < $topnum;$y++) {
      if ($top[$y]["nick"] != "") {
        echo("<tr>");
        echo("<td class=\"times\" width=\"20px\">" . ($y+1) . ".</td>");
        echo("<td class=\"times\" width=\"180px\">" . man($top[$y]["nick"]) . "</td>");
        $str = "";
        if ($y > 0) $str = " title=\"+" . formatElmaTime($top[$y]["time"]-$top[0]["time"]) . " to " . $top[0]["nick"] . "'s time\"";
        echo("<td class=\"times\" width=\"81px\"" . $str . "><center>" . sttime($top[$y]["nick"], $x+1, $top[$y]["time"], true, false, target($top[$y]["time"], $x+1)) . "</center></td>");
        echo("</tr>\n");
      }
    }
    echo("</table>");
    
    echo("<br/>");
    if ($x == 26) echo("</div><div class=\"lefty\">");
  }
  echo("</div>");
?>
<?php include("tpo.php"); ?>