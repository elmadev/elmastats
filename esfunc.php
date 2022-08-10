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

  //Load intnames
  $intnames = array();
  $lines = file("intnames.txt");
  $i = 0;
  foreach ($lines as $line_num => $line) {
    $i++;
    $line = str_replace("\r\n", "\n", $line);
    $intnames[$i] = substr($line, 0, strlen($line)-1);
  }
      
  $c = 0;
  $players = array();
  $utimes = array();
  while ($_GET["player" + ($c+1)] != "") {
    $player = $_GET["player" + ($c+1)];
    if ($users[$player]["nick"] == "") {
      foreach ($users as $user) {
        if (strtolower($player) == strtolower($user["nick"])) $player = $user["nick"];
      }
    }
    if ($users[$player]["nick"] != "") {
      $players[] = $player;
      $utimes[] = stateTimes($player, $users[$player]["elmaname"]);
    } else {
      break;
    }
  }
  
  //TEMP
  $player = $_GET["player"];
  if ($users[$player]["nick"] == "") {
    foreach ($users as $user) {
      if (strtolower($player) == strtolower($user["nick"])) $player = $user["nick"];
    }
  }
  $utimes = stateTimes($player, $users[$player]["elmaname"]);
  
  
  
  //-TEMP
  /*switch ($_GET["mode"]) {
    case "time":
      if ($utimes[0] == NULL) {
        echo("this kuski man hasnt upped stats :0");
      } else {
        if ((int)$_GET["int"] > 0 && (int)$_GET["int"] < 55) {
          if ($utimes[(int)$_GET["int"]][1] == 0) {
            echo($player . " hasnt finished this int :D)");
          } else {
            echo($player . "s time in " . $intnames[(int)$_GET["int"]] . 
                 " is " . formatElmaTime($utimes[(int)$_GET["int"]][1]));
          }     
        } else {
          echo("xd");
        }
      }
      break;*/


  


  if ($users[$player]["nick"] != "") {
  
    $cItem = $users[$player];
    $utimes = stateTimes($cItem["nick"], $users[$player]["elmaname"]);
    if ($utimes == NULL) {
      echo("this kuski man hasnt upped stats :0");
    } else {
      if ($_GET["mode"] == "time") {
        if ((int)$_GET["int"] > 0 && (int)$_GET["int"] < 55) {
          //Load intnames
          $intnames = array();
          $lines = file("intnames.txt");
          $i = 0;
          foreach ($lines as $line_num => $line) {
            $i++;
            $line = str_replace("\r\n", "\n", $line);
            $intnames[$i] = substr($line, 0, strlen($line)-1);
          }
          if ($utimes[(int)$_GET["int"]][1] == 0) {
            echo($player . " hasnt finished this int :D)");
          } else {
            echo($player . "s time in " . $intnames[(int)$_GET["int"]] . 
                 " is " . formatElmaTime($utimes[(int)$_GET["int"]][1]));
          }     
        } else {
          echo("xd");
        }
      }
      if ($_GET["mode"] == "tt") {
        $tt = 0;
        for ($x = 0;$x < 54;$x++) $tt += ($utimes[$x+1][1] == 0 ? 60000 : $utimes[$x+1][1]);
        echo($player . "s TT is " . formatElmaTime($tt));
      }
    }
  } else {
    echo($player . " doesnt exist!");
  }
?>