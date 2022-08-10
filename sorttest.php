<?php
  //Functions
  include("../func.php");
  include("func.php");

  //Load users
  $users = array(array());
  $files = array();
  $handle = opendir("usersz/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") $users[$file] = loadUser($file);
  }
  closedir($handle);
  
  function cmpa($a, $b) {
    $s = strcmp(strtolower($a["nick"]), strtolower($b["nick"]));
    if ($s == 0 && strlen($a) > 1 && strlen($b) > 1) return cmpa(substr($a, 1), substr($b, 1));
    return ($s == 0 ? 0 : ($s < 0 ? -1 : 1));
  }
  uksort($users, "cmpa");
  
  
  foreach ($users as $user) {
    echo($user["nick"] . "<br/>");
  }
  
?>