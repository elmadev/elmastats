<?php
  include("func.php");
  
  //load users
  $users = array(array());
  $handle = opendir("usersz/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") $users[$file] = loadUser($file);
  }
  closedir($handle);
  
  $topnum = 1;
  $utimes = array();
  $unicks = array();
  $c = 0;
  foreach ($users as $cItem) {
    $utimes[] = stateTimes($cItem["nick"], $cItem["elmaname"]);
    $unicks[] = $cItem["nick"];
    $c++;
  }

  $fnames = array();
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
    $fnames[$x] = "recs/" . $top[0]["nick"] . "/" . str_pad($x+1, 2, "0", STR_PAD_LEFT) . $top[0]["nick"] . formatRecTime($top[0]["time"]) . ".rec";
  }
  
  
  
  header("Content-Type: application/zip");
  header("Content-Disposition: attachment; filename=\"recs.zip\"");
  require_once("pclzip.lib.php");
  $tmp = rand(10000, 99999);
  $zipname = "tmp/" . "zip" . $tmp . ".zip";
  $zip = new PclZip($zipname);
  $v_list = $zip->create($fnames, PCLZIP_OPT_REMOVE_ALL_PATH);
  if ($v_list == 0) {
    die("Error : ".$zip->errorInfo(true));
  }
  
  echo(file_get_contents($zipname));
  unlink($zipname);
?>