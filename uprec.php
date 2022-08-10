<?php include("top.php"); ?>
here you can upload recs so other mans can download them by clicking on your times<br/>
<a href="recs/int_recs.bat.zip">here</a>'s a batch file for ziping all your recs by a pattern (??jon.rec for example,<br/>
edit the bat file in a text editor to change this) put both files in your rec folder<br/>
<br/>
<?php
  if (isset($_SESSION["nick"])) {
?>
<b>Upload recs</b><br/>
<form enctype="multipart/form-data" action="uprec.php" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
  <table border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td>Rec file/zip (*.rec, *.zip):&nbsp;</td>
      <td><input name="uploadedfile" type="file"/></td>
      <td><input type="submit" value="Upload"/></td>
    </tr>
  </table>
</form>
<?php
  if (sizeof($_POST) > 0) {
    $file = $_FILES["uploadedfile"]["name"];
    if (strlen($file) > 0) {
      echo("<br/>");
      if (endswith(basename($_FILES["uploadedfile"]["name"]), ".rec")) {
        if (filesize($_FILES["uploadedfile"]["tmp_name"]) > 0) {
          $cInfo = recInfo($_FILES["uploadedfile"]["tmp_name"]);
          if (strpos($cInfo["lev"], "QWQUU0") === 0) {
            $int = substr($cInfo["lev"], 6, 2);
            if ($int <= 54) {
              if (!is_dir("recs/" . $_SESSION["nick"])) {
                mkdir("recs/" . $_SESSION["nick"]);
                chmod("recs/" . $_SESSION["nick"], 0755);
              }
              $path = "recs/" . $_SESSION["nick"] . "/" . $int . $_SESSION["nick"] . formatRecTime($cInfo["time"]) . ".rec";
              if (move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], $path)) {
                echo("<span style=\"color: #00CC00\">Rec uploaded! Time: <a href=\"" . $path . "\">" . formatElmaTime($cInfo["time"]) . "</a></span><br/>");
              } else {
                echo("<span style=\"color: #FF0000\">Error uploading the file!</span><br/>");
              }
            } else {
              echo("<span style=\"color: #FF0000\">Can't up rec for this int!</span><br/>");
            }
          } else {
            echo("<span style=\"color: #FF0000\">Unknown lev!</span><br/>");
          }
        } else {
          echo("<span style=\"color: #FF0000\">File is empty!</span><br/>");
        }
      } else {
        if (endswith(basename($_FILES["uploadedfile"]["name"]), ".zip")) {
          $tn = "tmp" . rand(10000, 99999);
          mkdir($tn);
          chmod($tn, 0644);
          require_once("pclzip.lib.php");
          $archive = new PclZip($_FILES["uploadedfile"]["tmp_name"]);
          if (($v_result_list = $archive->extract(PCLZIP_OPT_PATH, $tn)) == 0) {
            echo("<span style=\"color: #FF0000\">Error extracting zip!</span><br/>");
          } else {
            $files = array();
            $handle = opendir($tn . "/");
            while (false !== ($file = readdir($handle))) {
              if (endsWith($file, ".rec")) $files[] = $file;
            }
            closedir($handle);
            $fcount = 0;
            foreach ($files as $cFile) {
              $fFile = $tn . "/" . $cFile;
              if (filesize($fFile) > 0) {
                $cInfo = recInfo($fFile);
                if (strpos($cInfo["lev"], "QWQUU0") === 0) {
                  $int = substr($cInfo["lev"], 6, 2);
                  if ($int <= 54) {
                    $path = "recs/" . $_SESSION["nick"] . "/" . $int . $_SESSION["nick"] . formatRecTime($cInfo["time"]) . ".rec";
                    if (!is_dir("recs/" . $_SESSION["nick"])) {
                      mkdir("recs/" . $_SESSION["nick"]);
                      chmod("recs/" . $_SESSION["nick"], 0644);
                    }
                    if (rename($fFile, $path)) {
                      echo("<span style=\"color: #00CC00\">" . $cFile . " uploaded! Time: <a href=\"" . $path . "\">" . formatElmaTime($cInfo["time"]) . "</a></span><br/>");
                      $fcount++;
                    } else {
                      echo("<span style=\"color: #FF0000\">" . $cFile . ": error moving the file!</span><br/>");
                    }
                  } else {
                    echo("<span style=\"color: #FF0000\">" . $cFile . ": can't up rec for this int!</span><br/>");
                  }
                } else {
                  echo("<span style=\"color: #FF0000\">" . $cFile . ": unknown lev!</span><br/>");
                }
              } else {
                echo("<span style=\"color: #FF0000\">" . $cFile . ": file is empty!</span><br/>");
              }
            }
          }
          if ($fcount == 0) echo("<span style=\"color: #FF0000\">No valid rec files found in zip!</span><br/>");
          xrmdir($tn);
        } else {
          echo("<span style=\"color: #FF0000\">Wrong filetype!</span><br/>");
        }
      }
    }
  }

?>
<?php
  } else {
?>
<span style="color: #FF0000">You aren't <a href="index.php">logged in</a>!</span><br/>
<?php
    if (strlen($status) > 0) {
      echo("<br/><span style=\"color: #FF0000\">" . $status . "</span><br/>");
    }
  }
?>
<?php include("tpo.php"); ?>