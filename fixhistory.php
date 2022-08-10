<?php
  include("func.php");
  
  //load users
  $users = array(array());
  $handle = opendir("usersz/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") $users[$file] = loadUser($file);
  }
  closedir($handle);
  
  foreach ($users as $user) {
    if (file_exists("statefileszh/" . $user["nick"]) && !file_exists("historyz/" . $user["nick"] . "_0")) {
      //add to history
      copy("statefileszh/" . $user["nick"], "historyz/" . $user["nick"] . "_0");
      $fh = fopen("historyz/" . $user["nick"] . "_0", "a");
      fwrite($fh, filemtime("statefileszh/" . $user["nick"]) . "\n");
      fclose($fh);
    }
  }
?>