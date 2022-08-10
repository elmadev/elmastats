<?php
ini_set('max_execution_time', 300000); 
set_time_limit(0);
include("top.php");
  
  $utimes = array();
  $unicks = array();
  $c = 0;
  foreach ($users as $cItem) {
    $utimes[] = stateTimes($cItem["nick"], $cItem["elmaname"]);
    $unicks[] = $cItem["nick"];
    $c++;
  }
  $cnum=0;
  for ($x = 10;$x < 54;$x++) {
    $top = array();
    for ($y = 0;$y < $c;$y++) {
      for($z=1;$z<=10;$z++){
        $cItem["nick"] = $unicks[$y];
        $cItem["time"] = $utimes[$y][$x+1][$z];
        if ($cItem["time"] == 0) $cItem["time"] = 60000;
        $file="recs/" . $cItem["nick"] . "/" . str_pad($x+1, 2, "0", STR_PAD_LEFT) . $cItem["nick"] . formatRecTime($cItem["time"]) . ".rec";
        if ($cItem["time"] < 60000 && file_exists($file)){
          $fileurl="http://stats.sshoyer.net/".$file;
          echo("#".$cnum." ".$cItem["nick"].": ".$fileurl."... ");
          $cnum++;
          
          $url="http://www.recsource.tv/api/replay/";
          $data=array('apikey'=>'hdnu4hb6zuk7a3gua5wagji2cf7nclutyio30z90ut85xoz8tvi9f1crhkft5am4sb7tbht5a1a8pagj6ztl06dhqtav3x0w87pjoipzj079bnthmm3nth4jaffdcf9l',
                      'url'=>$fileurl,
                      'kuski'=>$cItem["nick"],
                      'description'=>'good reclay by best player of all time',
                      'tags'=>'internal,international,elmavirtuoso,bestplayerofalltime');
          
          if($cItem["nick"]!="jonsykkel"){
            $data['description']="reclay uploaded from elmastats";
            $data['tags']="internal";
          }
          
          
          $options=array(
            'http'=>array(
              'header'=>"Content-type: application/x-www-form-urlencoded\r\n",
              'method'=>'POST',
              'content'=>http_build_query($data),
              'follow_location' => false
            )
          );
          $context=stream_context_create($options);
          $result=file_get_contents($url,false,$context);
          if($result===FALSE){
            echo("error");
          }else{
            echo("success");
          }
          echo("<br>");
        
        }
      }
    }
  }

  echo("DONED<br>");
  die;
  
?>