<?php include("top.php"); ?>
<?php
  $player = "Jon";
  if ($_GET["player"] != "") $player = $_GET["player"];
  echo("<b>Usarbar examples</b> (" . man($player, false, false) . ")<br/><br/>");
  echo("<div class=\"box\">");
  echo("<b>Standard</b><br/>");
  addub("ttst.php?u=" . $player, $player);
  addub("ttst.php?u=" . $player . "&bg=g", $player);
  addub("ttst.php?u=" . $player . "&bg=p", $player);
  addub("ttst.php?u=" . $player . "&bg=r", $player);
  addub("ttst.php?u=" . $player . "&bg=y", $player);
  addub("ttst.php?u=" . $player . "&bg=k", $player);
  echo("<br/><b>Simpel and customizabel</b><br/>");
  addub("tt.php?u=" . $player, $player);
  addub("tt.php?u=" . $player . "&amp;bg=000000&amp;c=FF0000&amp;pre=TT:%20[&amp;post=]", $player);
  echo("</div>");
?>
<?php include("tpo.php"); ?>