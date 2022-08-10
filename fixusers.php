<?php
  
  include("func.php");


  if ($_GET["pwd"] == "oke") {
    //Load users
    echo("reading users...<br/>");
    $users = array(array());
    $files = array();
    $handle = opendir("usersz/"); 
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        echo("reading file '" . $file . "'...<br/>");
        $users[$file] = loadUser($file);
      }
    }
    closedir($handle);
    
    function cmpu($a, $b) {
      $s = strcmp(strtolower($a["nick"]), strtolower($b["nick"]));
      return ($s == 0 ? 0 : ($s < 0 ? -1 : 1));
    }
    uksort($users, "cmpu");
      
    echo("<br/>");
    foreach ($users as $user) {
      if ($user["nick"] != "") {
        echo("<b>" . $user["nick"] . "</b><br/>");
        echo("elmaname:   " . $user["elmaname"] . "<br/>");
        echo("country:    " . $user["country"] . "<br/>");
        echo("team:       " . $user["team"] . "<br/>");
        echo("pwd:        " . $user["pwd"] . "<br/>");
        echo("registered: " . $user["registered"] . "<br/>");
        echo("email:      " . $user["email"] . "<br/>");
        echo("theme:      " . $user["theme"] . "<br/>");
        echo("timezone:   " . $user["timezone"] . "<br/>");
        echo("timeformat: " . $user["timeformat"] . "<br/>");
        echo("<br/><br/>");
      }
    }
      
    echo("overwriting users...<br/>");
    foreach ($users as $user) {
      if ($user["nick"] != "") {
        echo("writing to user " . $user["nick"] . "... ");
        $fh = fopen("usersz/" . $user["nick"], "w");
        fwrite($fh, $user["nick"] . "\n");
        fwrite($fh, $user["elmaname"] . "\n");
        fwrite($fh, $user["country"] . "\n");
        fwrite($fh, $user["team"] . "\n");
        fwrite($fh, $user["pwd"] . "\n");
        fwrite($fh, $user["registered"] . "\n");
        fwrite($fh, $user["email"] . "\n");
        if ($user["theme"] == "") $user["theme"] = "Default";
        fwrite($fh, $user["theme"] . "\n");
        if ($user["timezone"] == "") $user["timezone"] = "0";
        fwrite($fh, $user["timezone"] . "\n");
        if ($user["timeformat"] == "") $user["timeformat"] = "m:s:i";
        fwrite($fh, $user["timeformat"] . "\n");
        fclose($fh);
        echo("done!<br/>");
      }
    }
    
    echo("<br/>suces!!");
  } else {
    echo("wrong pwd");
  }
?>