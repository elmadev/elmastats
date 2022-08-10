<?php
  $s = file_get_contents("http://www.moposite.com/records_elma_wrs.php");
  $fh = fopen("./db/wrtable", "w");
  fwrite($fh, $s);
  fclose($fh);
  echo("done");
?>