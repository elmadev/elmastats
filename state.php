<?php
  /*State.dat recoverer
  Parameters:
    u - username
    p - password hash
  */
  
  include("func.php");
  
  //Load users
  $users = array(array());
  $files = array();
  $handle = opendir("usersz/"); 
  while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") $users[$file] = loadUser($file);
  }
  closedir($handle);
  if ($users[$_GET["u"]]["nick"] != "") {
    if ($users[$_GET["u"]]["pwd"] == $_GET["p"]) {
      if (file_exists("statefilesz/" . $_GET["u"] . ".dat")) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . $_GET["u"] . ".dat\"");
        $file = file_get_contents("statefilesz/" . $_GET["u"] . ".dat");
        echo($file);
      }
    } else {
      header("Content-Type: text/plain");
      echo("wrong password, nab");
    }
  }
?>