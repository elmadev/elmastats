<?php
  
    $img = imagecreatetruecolor($imgw, $imgh);
    
    //colors
    $c_alpha = imagecolorallocate($img, 255, 0, 255);
    $c_canv = imagecolorallocate($img, 50, 0, 0);
    $c_line = imagecolorallocate($img, 255, 0, 0);
    $c_line2 = imagecolorallocate($img, 100, 0, 0);
    $c_border = imagecolorallocate($img, 255, 0, 255);
    $c_text = imagecolorallocate($img, 204, 204, 204);
    if ($_GET["dark"] == 1) $c_text = imagecolorallocate($img, 0, 0, 0);
    $c_ticks = imagecolorallocate($img, 100, 100, 100);
    
    //background
    imagecolortransparent($img, $c_alpha);
    imagefilledrectangle($img, 0, 0, $imgw, $imgh, $c_border);
    imagefilledrectangle($img, $borl, $bort, $imgw-$borr, $imgh-$borb, $c_canv);
    
    //static text
    imagestring($img, 2, 28-(strlen(formatElmaTime(floor($maxtt/100)*100))*$charw)/2, $bort-7, formatElmaTime(floor($maxtt/100)*100), $c_text);
    imagestring($img, 2, 28-(strlen(formatElmaTime(floor($mintt/100)*100))*$charw)/2, $bort+$canh-7, formatElmaTime(floor($mintt/100)*100), $c_text);

    //tt ticks
    $tickreso = 10*100; //1 tick per x*100 sec
    for ($x = 0;$x < floor($maxtt/$tickreso)-floor($mintt/$tickreso);$x++) {
      $ticktt = (floor($maxtt/$tickreso)-$x)*$tickreso;
      $liney = $bort+$canh-($ticktt-$mintt)*$ttm;
      if ($liney > $bort && $liney < $bort+$canh) imageline($img, $borl, $liney, $borl-4, $liney, $c_ticks);
    }
    
    //draw club lines+texts
    $domi = floor($canh/20);
    $num = floor($maxtt/6000)-floor($mintt/6000);
    for ($x = 0;$x < $num;$x++) {
      $clubtt = (floor($maxtt/6000)-$x)*6000;
      $liney = $bort+$canh-($clubtt-$mintt)*$ttm;
      if ($liney > $bort && $liney < $bort+$canh) {
        imageline($img, $borl-4, $liney, $borl-6, $liney, $c_ticks);
        imageline($img, $borl, $liney, $imgw-$borr, $liney, $c_line2);
      }
      if (($liney > $bort+10 && $liney < $bort+$canh-10) && ($num <= $domi || $x%ceil($num/$domi) == 0))
        imagestring($img, 2, 28-(strlen(formatElmaTime(floor($clubtt/100)*100))*$charw)/2, $liney-7, formatElmaTime(floor($clubtt/100)*100), $c_text);
    }
      
    //bottom text and vertical lines aand ticks
    $domi = floor($canw/70);
    for ($x = 0;$x < $n;$x++) {
      imageline($img, $borl+($segw*$x), $imgh-$borb, $borl+($segw*$x), $imgh-$borb+4, $c_ticks);
      imageline($img, $borl+($segw*$x), $bort, $borl+($segw*$x), $bort+$canh, $c_line2);
      if ($n <= $domi || $x%ceil($n/$domi) == 0) {
        imagestring($img, 2, $borl+($segw*$x)-20, $imgh-$borb+8, date("d/m/y", ttime($tss[$x])), $c_text);
        imagestring($img, 2, $borl+($segw*$x)-(strlen(formatElmaTime($tts[$x]))*$charw)/2, $imgh-$borb+24, formatElmaTime($tts[$x]), $c_text);
      }
    }
    
    //canvas
    for ($x = 0;$x < $n-1;$x++) {
      imageline($img, $borl+round($x*$segw), $bort+$canh-($tts[$x]-$mintt)*$ttm, $borl+round(($x+1)*$segw), $bort+$canh-($tts[$x+1]-$mintt)*$ttm, $c_line);
    }
    header("Content-Type: image/png");
    imagepng($img);
    imagedestroy($img);
  }
?>