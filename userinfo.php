<?php
  //Functions
  include("func.php");

  //Load users
  $users = array(array());
  $files = array();
  $handle = opendir("usersz/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") $users[$file] = loadUser($file);
  }
  closedir($handle);
  
  uksort($users, "cmpa");
  
  $themestats = array();
  
  foreach ($users as $user) {
    echo("<b>" . $user["nick"] . "</b><br/>");
    echo($user["theme"] . "<br/>");
    $themestats[$user["theme"]]++;
    echo("<br/>");
  }
  
  echo("<br/><br/><b>theme stats</b><br/>");
  foreach ($themestats as $theme => $themecount) {
    echo($theme . ": " . $themecount . " users<br/>");
  }
  
?>