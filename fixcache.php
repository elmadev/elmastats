<?php include("top.php"); ?>
<?php
  $handle = opendir("statefileszh/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") {
      //echo("deleting '" . $file . "'<br/>");
      unlink("statefileszh/" . $file);
      stateTimes($file);
    }
  }
  closedir($handle);
  echo("rebuilt cache (probably)");
?>
<?php include("tpo.php"); ?>