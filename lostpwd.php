<?php include("top.php"); ?>
Recover your lost password via email<br/><br/>
<?php
  if (sizeof($_POST) == 0) {
?>
<form enctype="multipart/form-data" action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
  <table border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td>Nick:&nbsp;</td>
      <td><input type="text" name="nick" size="18"/></td>
      <td><input type="submit" value="Recover"/></td>
    </tr>
  </table>
</form>
<?php
  } else {
    if ($users[$_POST["nick"]]["nick"] != "") {
      $newpwd = "";
      for ($x = 0;$x < 8;$x++) $newpwd .= chr(rand(65, 65+25));

      $fh = fopen("usersz/" . $users[$_POST["nick"]]["nick"], "w");
      fwrite($fh, $users[$_POST["nick"]]["nick"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["elmaname"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["country"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["team"] . "\n");
      fwrite($fh, md5(md5($newpwd)) . "\n");
      fwrite($fh, $users[$_POST["nick"]]["registered"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["email"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["theme"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["timezone"] . "\n");
      fwrite($fh, $users[$_POST["nick"]]["timeformat"] . "\n");
      fclose($fh);
      
      $rec = $users[$_POST["nick"]]["email"];
      $sub = "Elmastats - lost password";
      $msg = '
      <html>
        <head>
          <title>Elmastats - lost password</title>
        </head>
        <body>
          Hi ' . $_POST["nick"] . ', your new password is <span style="color: #FF0000">' . $newpwd . '</span>
        </body>
      </html>';
      $hdr = "MIME-Version: 1.0\r\n";
      $hdr .= "Content-type: text/html; charset=iso-8859-1\r\n";
      if ($rec != "") {
        mail($rec, $sub, $msg, $hdr);
        echo("<span style=\"color: #00CC00\">Email sent to " . $rec . "!</span>");
      } else {
        echo("<span style=\"color: #00CC00\">This user has no email!</span>");
      }
    } else {
      echo("<span style=\"color: #00CC00\">No sach user!</span>");
    }
  }
?>
<?php include("tpo.php"); ?>