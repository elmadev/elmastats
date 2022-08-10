<?php include("top.php"); ?>
<?php
  if ($users[$_GET["u"]]["nick"] != "") {
    /*$n = 0;
    while (file_exists("historyz/" . $_GET["u"] . "_" . $n)) $n++;
    $ctimes = array(array(array()));
    for ($x = 0;$x < $n;$x++) $ctimes[$x] = htimes("historyz/" . $_GET["u"] . "_" . $x);*/
    switch ($_GET["m"]) {
      case "tt":
        echo("<img src=\"graph.php?u=" . $_GET["u"] . "&amp;m=" . $_GET["m"] . "&amp;w=799&amp;h=352\"/>");
        break;
      case "int":
        echo("<img src=\"graph.php?u=" . $_GET["u"] . "&amp;m=" . $_GET["m"] . "&amp;i=" . $_GET["i"] . "&amp;w=799&amp;h=352\"/>");
        break;
      default:
        error("Invalid parameters!");
        break;
    }
  } else {
    error("Kuski doesn't exist!");
  }
?>
<?php include("tpo.php"); ?>