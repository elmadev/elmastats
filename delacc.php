<?php include("top.php"); ?>
<?php
  if (isset($_POST["yes"])) {
    if ($_SESSION["nick"] != "") {
      $accname = $_SESSION["nick"];
      session_unset("nick");
      session_unset("pwd");
      session_destroy();
      if (file_exists("statefilesz/" . $accname . ".dat")) unlink("statefilesz/" . $accname . ".dat");
      if (file_exists("usersz/" . $accname)) unlink("usersz/" . $accname);
      if (is_dir("recs/" . $accname)) xrmdir("recs/" . $accname);
      echo("<span style=\"color: #00CC00\">Account \"" . $accname . "\" deleted!</span>");
    } else {
      echo("<span style=\"color: #FF0000\">You are nat logged in!</span>");
    }
  } else {
?>
Are you sure you wanna delete your acc?<br/><br/>
<table><tr>
<td><form name="delacc" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <input type="submit" name="yes" value="Yes">
</form></td>
<td><form name="nat" action="acc.php">
  <input type="submit" name="no" value="No">
</form></td>
</tr></table>
<?php } ?>
<?php include("tpo.php"); ?>