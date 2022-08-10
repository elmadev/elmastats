<?php include("top.php"); ?>
<?php
  if ($users[$_GET["player"]]["nick"] != "") {

    //Load targets
    $targets = array(array());
    $lines = file("targets.txt");
    $x = 0;
    foreach ($lines as $line_num => $line) {
      for ($y = 0;$y < 7;$y++) {
        $targets[$x+1][$y+1] = divTime(substr($line, 0, 8));
        $line = substr($line, 8);
        if ($y < 6) $line = substr($line, strpos($line, "0"));
      }
      $x++;
    }

    //Get wrs
    $wrs = array();
    $s = file_get_contents("http://www.moposite.com/records_elma_wrs.php");
    $s = substr($s, strpos($s, "16px; font-family: Times new roman;\">Name</td>"));
    for ($x = 0;$x < 54;$x++) {
      //$s = substr($s, strpos($s, ">Thor"));
      $s = substr($s, strpos($s, " align=\"left\">")+strlen(" align=\"left\">"));
      $num = substr($s, 0, strpos($s, "."));
      $s = substr($s, strpos($s, " align=\"right\">")+strlen(" align=\"right\">"));
      $t = substr($s, 0, strpos($s, "</td>"));
      $s = substr($s, strpos($s, " align=\"left\">")+strlen(" align=\"left\">"));
      if (strpos($t, ":") > 0) {
        $min = substr($t, 0, strpos($t, ":"));
        $t = substr($t, strpos($t, ":")+1);
        $sec = substr($t, 0, strpos($t, ","));
        $msc = substr($t, strpos($t, ",")+1);
      } else {
        $min = 0;
        $sec = substr($t, 0, strpos($t, ","));
        $msc = substr($t, strpos($t, ",")+1);
      }
      $time = ($min*100*60)+($sec*100)+$msc;
      $wrs[$num] = $time;
    }

    $cItem = $users[$_GET["player"]];
    $utimes = stateTimes($cItem["nick"], $cItem["elmaname"]);
    if ($utimes == NULL) {
      echo("<span style=\"color: #FF0000\">This kuski man hasn't uploaded stats yet!</span><br/>");
    } else {
      $pr = getLev($utimes);
      echo("lev: " . $pr["lev"] . "<br/>");
      echo("exp: " . $pr["exp"] . "<br/>");
    }
  } else {
    echo("<span style=\"color: #FF0000\">Player \"" . $_GET["player"] . "\" doesn't exist!</span><br/>");
  }
?>
<?php include("tpo.php"); ?>