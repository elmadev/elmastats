<?php include("top.php"); ?>
<?php
  $fileIpAddresses = "statistiks/ips";
  $fileCounter = "statistiks/vis";
  $fileUbCounter = "statistiks/ubs";
  if (filesize($fileIpAddresses) == 0) {
    $ipVisits = 0;
  } else {
    $fh = fopen($fileIpAddresses, "r");
    $ipVisits = substr_count(fread($fh, filesize($fileIpAddresses)), ";") - 1;
    fclose($fh);
  }
  if (filesize($fileCounter) == 0) {
    $visitors = 0;
  } else {
    $fh = fopen($fileCounter, "r");
    $visitors = fread($fh, filesize($fileCounter));
    fclose($fh);
  }
  /*if (filesize($fileUbCounter) == 0) {
    $ubs = 0;
  } else {
    $fh = fopen($fileUbCounter, "r");
    $ubs = fread($fh, filesize($fileUbCounter));
    fclose($fh);
  }*/

  echo("<b>Site statistiks</b><br/>");
  echo("<table border=\"0\">");
  echo("<tr><td width=\"200px\">&nbsp;IPs visited:</td><td>" . $ipVisits . "</td></tr>");
  //echo("<tr><td>&nbsp;Total hits:</td><td>" . $visitors . "</td></tr>");
  //echo("<tr><td>&nbsp;Userbars loaded:</td><td>" . $ubs . "</td></tr>");
  echo("</table>");
  
  echo("<br/>");
  echo("<b>Other statistiks</b><br/>");
  echo("<table border=\"0\">");
  echo("<tr><td width=\"200px\">&nbsp;Registered users:</td><td>" . count($users) . "</td>");
  $states = 0;
  foreach ($users as $cItem) {
    $utime = stateTimes($cItem["nick"], $cItem["elmaname"]);
    if ($utime != NULL) $states++;
  }
  echo("</tr>");
  echo("<tr><td width=\"200px\">&nbsp;State files:</td><td>" . $states . "</td></tr>");
  echo("<tr><td width=\"200px\">&nbsp;Replay files:</td><td>" . fileCount("recs/", ".rec") . "</td></tr>");
  echo("</table>");
?>
<?php include("tpo.php"); ?>