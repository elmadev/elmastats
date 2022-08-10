<?php include("top.php"); ?>

<?php
  $targets = loadTargets();
  for ($x = 0;$x < 54;$x++) {
    echo(($x+1) . ": " . $targets[$x+1][0] . "<br/>");
  }
?>

<?php include("tpo.php"); ?>