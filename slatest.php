<?php
	function recInfo2($filename) {
    if (!file_exists($filename)) return -1;
    $f = fopen($filename, "r");
    list(, $no) = unpack("V", fread($f, 4));
    for ($i = 0; $i < 12; $i++) fread($f, 1);
    $crc = bin2hex(fread($f, 4));
    $lev = fread($f, 12);
    for ($i = 0; $i < 27 * $no + 4; $i++) fread($f, 1);
    list(, $no) = unpack("V", fread($f, 4));
    for ($i = 0; $i < $no; $i++) {
      list(, $d) = unpack("d", fread($f, 8));
      list(, $j) = unpack("V", fread($f, 4));
      list(, $k) = unpack("V", fread($f, 4));
      if ($k == 0) $time = $d;
      if ($d != $time) $time = -1;
    }
    fclose($f);
    //$outtime = $time*62500/273+0.0000001; //php suks
    $outtime = $time*2.289377289377289681482352534658275544643402099609375*100.0;
    $cInfo["crc"] = $crc;
    $cInfo["lev"] = $lev;
    $cInfo["time"] = floor($outtime);
    return $cInfo;
  }
  
	include("func.php");
	$info=recInfo2("recs/Sla/05Sla2053.rec");
	echo(formatRecTime($info["time"]));

?>