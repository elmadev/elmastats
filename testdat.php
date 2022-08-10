<?php
  include_once("func.php");
  
  $fh = fopen("statefilesz/Boomer.dat", "rb");
  $byData = array();
  fread($fh, 4);
  $ebp8 = 0x17;
  $ebp10 = 0x2636;
  for ($z = 0;$z < 54;$z++) {
    for ($x = 0;$x < 688;$x++) {
      $byData[$x] = ord(fread($fh, 1));
      $byData[$x] = $byData[$x]^($ebp8 & 0xFF);      
      $ebp10 = toSignedWord($ebp10)+toSignedWord(($ebp8%0x0D3F)*0x0D3F);
      $ebp8 = toSignedWord($ebp10*0x1F+0x0D3F);
    }
    $t = $byData[0]+($byData[1] << 8)+($byData[2] << 16)+($byData[3] << 24);
    $x1 = 0;
    for ($x = 0;$x < $t;$x++) {
      $nick = "";
      for ($y = 0;$y < 15;$y++) {
        if ($byData[44+($x*15)+$y] == 0) break;
        $nick .= chr($byData[44+($x*15)+$y]);
      }
      echo($nick."<br/>");
      /*if ($elmaname == "" || strtolower($elmaname) == strtolower($nick)) {
        $times[$z+1][$x1+1] = $byData[($x+1)*4]+($byData[($x+1)*4+1] << 8)+($byData[($x+1)*4+2] << 16)+($byData[($x+1)*4+3] << 24);
        $x1++;
      }*/
    }
  }
  fclose($fh);
?>