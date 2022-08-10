<?php include("top.php"); ?>
<b>suggestions</b><br/>
suggest new features, changes or report bugs here :D<br/>
if you have any other kinds of questions, <a href="mailto:jonharkulsykkel2@gmail.com">ez</a><br/>



<?php if (isset($_SESSION["nick"])) { ?>
<br/>
<b>add suggestion (ORKA work on site anymore, no point of using this anymore)</b><br/>
<form name="sg" enctype="multipart/form-data" action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
  <table border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td>suggestion:&nbsp;</td>
      <td><input type="text" name="text" size="22"/></td>
      <td><input type="submit" value="Add"/></td>
    </tr>
  </table>
</form>
<br/><br/>
<?php } else {
  echo(error("you have to be logged in to add suggestions") . "<br/><br/>");
} ?>

<?php
  function parseLine($cline) {
    $data = array();
    $data["nick"] = substr($cline, 0, strpos($cline, "|"));
    $cline = substr($cline, strpos($cline, "|")+1);
    $data["text"] = fix(substr($cline, 0, strpos($cline, "|")));
    $cline = substr($cline, strpos($cline, "|")+1);
    $data["time"] = substr($cline, 0, strpos($cline, "|"));
    $data["status"] = substr($cline, strpos($cline, "|")+1);
    return $data;
  }
  
  //add entry
  if (sizeof($_POST) > 0) {
    $dfg = true;
    $lines = file("sugestionz");
    for ($x = 0;$x < count($lines);$x++) {
      $data = parseLine(ld($lines[$x]));
      if ($_POST["text"] == $data["text"]) $dfg = false;
    }
    
    if ($dfg) {
      $fh = fopen("sugestionz", "a");
      fwrite($fh, $_SESSION["nick"] . "|" . stripslashes($_POST["text"]) . "|" . time() . "|" . 0 . "\n");
      fclose($fh);
    }
  }

  //print entries
  $stext = array();
  $stext[0] = "";
  $stext[1] = "<span style=\"color: #FF0000\">rejected</span>";
  $stext[2] = "<span style=\"color: #AA00FF\">might be done</span>";
  $stext[3] = "<span style=\"color: #0000FF\">confirmed</span>";
  $stext[4] = "<span style=\"color: #00CC00\">done</span>";
  $stext[5] = "<span style=\"color: #FF0000\">impassible</span>";
  $lines = file("sugestionz");
  echo("<table><tr><th width=\"81px\">Nick</th><th width=\"400px\">Suggestion</th><th width=\"150px\">Date added</th><th>Status</th></tr>");
  for ($x = 0;$x < count($lines);$x++) {
    $data = parseLine(ld($lines[count($lines)-1-$x]));
    echo("<tr>");
    echo("<td>" . $data["nick"] . "</td>");
    echo("<td>" . $data["text"] . "</td>");
    echo("<td>" . date("d/m/y - H:i:s", $data["time"]) . "</td>");
    echo("<td>" . $stext[$data["status"]] . "</td>");
    echo("</tr>");
  }
  echo("</table>");
?>



<?php include("tpo.php"); ?>