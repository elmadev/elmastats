<?php include("top.php"); ?>
register to upload stats<br/><br/>
<b>Register</b><br/><br/>
<form name="register" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <table border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td>Nick:&nbsp;</td>
      <td><input type="text" name="nick" size="22"/></td>
      <td>&nbsp;the name you want to appear on this site. max 15 chars.</td>
    </tr>
    <tr>
      <td>State.dat name:&nbsp;</td>
      <td><input type="text" name="elmaname" size="22"/></td>
      <td>&nbsp;the name in your top10s in elma (leave blank to use best times)</td>
    </tr>
    <tr>
      <td>Pwd:&nbsp;</td>
      <td><input type="password" name="pwd" size="22" onkeyup="checkpwd()"/></td>
      <td>&nbsp;choose a coal password (case sensitive)</td>
    </tr>
    <tr>
      <td>Repeat pwd:&nbsp;</td>
      <td><input type="password" name="pwd2" size="22" onkeyup="checkpwd()"/></td>
      <td><div id="password_result">&nbsp;</div></td>
    </tr>
    <tr>
      <td>Nationality:&nbsp;</td>
      <td><select name='country'><option value='NULL'>Select..</option><option value='AF'>Afghanistan</option><option value='AL'>Albania</option><option value='DZ'>Algeria</option><option value='AS'>American Samoa</option><option value='AD'>Andorra</option><option value='AO'>Angola</option><option value='AI'>Anguilla</option><option value='AQ'>Antarctica</option><option value='AG'>Antigua and Barbuda</option><option value='AR'>Argentina</option><option value='AM'>Armenia</option><option value='AW'>Aruba</option><option value='AU'>Australia</option><option value='AT'>Austria</option><option value='AZ'>Azerbaijan</option><option value='BS'>Bahamas</option><option value='BH'>Bahrain</option><option value='BD'>Bangladesh</option><option value='BB'>Barbados</option><option value='BY'>Belarus</option><option value='BE'>Belgium</option><option value='BZ'>Belize</option><option value='BJ'>Benin</option><option value='BM'>Bermuda</option><option value='BT'>Bhutan</option><option value='BO'>Bolivia</option><option value='BA'>Bosnia and Herzegovina</option><option value='BW'>Botswana</option><option value='BV'>Bouvet Island</option><option value='BR'>Brazil</option><option value='IO'>British Indian Ocean...</option><option value='BN'>Brunei Darussalam</option><option value='BG'>Bulgaria</option><option value='BF'>Burkina Faso</option><option value='BI'>Burundi</option><option value='KH'>Cambodia</option><option value='CM'>Cameroon</option><option value='CA'>Canada</option><option value='CV'>Cape Verde</option><option value='KY'>Cayman Islands</option><option value='CF'>Central African Republic</option><option value='TD'>Chad</option><option value='CL'>Chile</option><option value='CN'>China</option><option value='CX'>Christmas Island</option><option value='CC'>Cocos (Keeling) Islands</option><option value='CO'>Colombia</option><option value='KM'>Comoros</option><option value='CG'>Congo</option><option value='CD'>Congo, the Democrati...</option><option value='CK'>Cook Islands</option><option value='CR'>Costa Rica</option><option value='CI'>Cote D'Ivoire</option><option value='HR'>Croatia</option><option value='CU'>Cuba</option><option value='CY'>Cyprus</option><option value='CZ'>Czech Republic</option><option value='DK'>Denmark</option><option value='DJ'>Djibouti</option><option value='DM'>Dominica</option><option value='DO'>Dominican Republic</option><option value='EC'>Ecuador</option><option value='EG'>Egypt</option><option value='SV'>El Salvador</option><option value='GQ'>Equatorial Guinea</option><option value='ER'>Eritrea</option><option value='EE'>Estonia</option><option value='ET'>Ethiopia</option><option value='FK'>Falkland Islands (Ma...</option><option value='FO'>Faroe Islands</option><option value='FJ'>Fiji</option><option value='FI'>Finland</option><option value='FR'>France</option><option value='GF'>French Guiana</option><option value='PF'>French Polynesia</option><option value='TF'>French Southern Terr...</option><option value='GA'>Gabon</option><option value='GM'>Gambia</option><option value='GE'>Georgia</option><option value='DE'>Germany</option><option value='GH'>Ghana</option><option value='GI'>Gibraltar</option><option value='GR'>Greece</option><option value='GL'>Greenland</option><option value='GD'>Grenada</option><option value='GP'>Guadeloupe</option><option value='GU'>Guam</option><option value='GT'>Guatemala</option><option value='GN'>Guinea</option><option value='GW'>Guinea-Bissau</option><option value='GY'>Guyana</option><option value='HT'>Haiti</option><option value='HM'>Heard Island and Mcd...</option><option value='VA'>Holy See (Vatican Ci...</option><option value='HN'>Honduras</option><option value='HK'>Hong Kong</option><option value='HU'>Hungary</option><option value='IS'>Iceland</option><option value='IN'>India</option><option value='ID'>Indonesia</option><option value='IR'>Iran, Islamic Republic of</option><option value='IQ'>Iraq</option><option value='IE'>Ireland</option><option value='IL'>Israel</option><option value='IT'>Italy</option><option value='JM'>Jamaica</option><option value='JP'>Japan</option><option value='JO'>Jordan</option><option value='KZ'>Kazakhstan</option><option value='KE'>Kenya</option><option value='KI'>Kiribati</option><option value='KP'>Korea, Democratic Pe...</option><option value='KR'>Korea, Republic of</option><option value='KW'>Kuwait</option><option value='KG'>Kyrgyzstan</option><option value='LA'>Lao People's Democra...</option><option value='LV'>Latvia</option><option value='LB'>Lebanon</option><option value='LS'>Lesotho</option><option value='LR'>Liberia</option><option value='LY'>Libyan Arab Jamahiriya</option><option value='LI'>Liechtenstein</option><option value='LT'>Lithuania</option><option value='LU'>Luxembourg</option><option value='MO'>Macao</option><option value='MK'>Macedonia, the Forme...</option><option value='MG'>Madagascar</option><option value='MW'>Malawi</option><option value='MY'>Malaysia</option><option value='MV'>Maldives</option><option value='ML'>Mali</option><option value='MT'>Malta</option><option value='MH'>Marshall Islands</option><option value='MQ'>Martinique</option><option value='MR'>Mauritania</option><option value='MU'>Mauritius</option><option value='YT'>Mayotte</option><option value='MX'>Mexico</option><option value='FM'>Micronesia, Federate...</option><option value='MD'>Moldova, Republic of</option><option value='MC'>Monaco</option><option value='MN'>Mongolia</option><option value='MS'>Montserrat</option><option value='MA'>Morocco</option><option value='MZ'>Mozambique</option><option value='MM'>Myanmar</option><option value='NA'>Namibia</option><option value='NR'>Nauru</option><option value='NP'>Nepal</option><option value='NL'>Netherlands</option><option value='AN'>Netherlands Antilles</option><option value='NC'>New Caledonia</option><option value='NZ'>New Zealand</option><option value='NI'>Nicaragua</option><option value='NE'>Niger</option><option value='NG'>Nigeria</option><option value='NU'>Niue</option><option value='NF'>Norfolk Island</option><option value='MP'>Northern Mariana Islands</option><option value='NO'>Norway</option><option value='OM'>Oman</option><option value='PK'>Pakistan</option><option value='PW'>Palau</option><option value='PS'>Palestinian Territor...</option><option value='PA'>Panama</option><option value='PG'>Papua New Guinea</option><option value='PY'>Paraguay</option><option value='PE'>Peru</option><option value='PH'>Philippines</option><option value='PN'>Pitcairn</option><option value='PL'>Poland</option><option value='PT'>Portugal</option><option value='PR'>Puerto Rico</option><option value='QA'>Qatar</option><option value='RE'>Reunion</option><option value='RO'>Romania</option><option value='RU'>Russian Federation</option><option value='RW'>Rwanda</option><option value='SH'>Saint Helena</option><option value='KN'>Saint Kitts and Nevis</option><option value='LC'>Saint Lucia</option><option value='PM'>Saint Pierre and Miquelon</option><option value='VC'>Saint Vincent and th...</option><option value='WS'>Samoa</option><option value='SM'>San Marino</option><option value='ST'>Sao Tome and Principe</option><option value='SA'>Saudi Arabia</option><option value='SN'>Senegal</option><option value='CS'>Serbia and Montenegro</option><option value='SC'>Seychelles</option><option value='SL'>Sierra Leone</option><option value='SG'>Singapore</option><option value='SK'>Slovakia</option><option value='SI'>Slovenia</option><option value='SB'>Solomon Islands</option><option value='SO'>Somalia</option><option value='ZA'>South Africa</option><option value='GS'>South Georgia and th...</option><option value='ES'>Spain</option><option value='LK'>Sri Lanka</option><option value='SD'>Sudan</option><option value='SR'>Suriname</option><option value='SJ'>Svalbard and Jan Mayen</option><option value='SZ'>Swaziland</option><option value='SE'>Sweden</option><option value='CH'>Switzerland</option><option value='SY'>Syrian Arab Republic</option><option value='TW'>Taiwan, Province of China</option><option value='TJ'>Tajikistan</option><option value='TZ'>Tanzania, United Rep...</option><option value='TH'>Thailand</option><option value='TL'>Timor-Leste</option><option value='TG'>Togo</option><option value='TK'>Tokelau</option><option value='TO'>Tonga</option><option value='TT'>Trinidad and Tobago</option><option value='TN'>Tunisia</option><option value='TR'>Turkey</option><option value='TM'>Turkmenistan</option><option value='TC'>Turks and Caicos Islands</option><option value='TV'>Tuvalu</option><option value='UG'>Uganda</option><option value='UA'>Ukraine</option><option value='AE'>United Arab Emirates</option><option value='GB'>United Kingdom</option><option value='US'>United States</option><option value='UM'>United States Minor ...</option><option value='UY'>Uruguay</option><option value='UZ'>Uzbekistan</option><option value='VU'>Vanuatu</option><option value='VE'>Venezuela</option><option value='VN'>Viet Nam</option><option value='VG'>Virgin Islands, British</option><option value='VI'>Virgin Islands, U.s.</option><option value='WF'>Wallis and Futuna</option><option value='EH'>Western Sahara</option><option value='YE'>Yemen</option><option value='ZM'>Zambia</option><option value='ZW'>Zimbabwe</option></select></td>
      <td>&nbsp;where you come from</td>
    </tr>
    <tr>
      <td>Team:&nbsp;</td>
      <td><input type="text" name="team" size="22"/></td>
      <td></td>
    </tr>
    <tr>
      <td>Email address:&nbsp;</td>
      <td><input type="text" name="email" size="22"/></td>
      <td>&nbsp;used only for recovering pwd right now</td>
    </tr>
    <tr><th colspan="2">&nbsp;</th></tr>
    <tr>
      <td colspan="2"><center><input type="submit" value="Register"/></center></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
  result_id = "password_result";
  checkpwd = function() {
    if (!result_id) { return false; }
    if (!document.getElementById){ return false; }
    r = document.getElementById(result_id);
    if (!r){ return false; }
    if (document.register.pwd.value != "" && document.register.pwd2.value != "" && document.register.pwd.value == document.register.pwd2.value) {
      r.innerHTML = "&nbsp;<span style=\"color: #00CC00\">passwords match!<\/span>";
    } else {
      if (document.register.pwd.value == "") {
        r.innerHTML = "";
      } else {
        r.innerHTML = "&nbsp;<span style=\"color: #FF0000\">passwords don't match!<\/span>";
      }
    }
  }
// -->
</script>
<?php
  if (sizeof($_POST) > 0) {
    echo("<br/>");
    $error = false;
    foreach ($users as $user) {
      if (strtolower($_POST["nick"]) == strtolower($user["nick"])) {
        echo("<span style=\"color: #FF0000\">User with this nick already exists</span><br/>");
        $error = true;
        break;
      }
    }
    if ($users[$_POST["nick"]]["nick"] != "") {
      echo("<span style=\"color: #FF0000\">User with this nick already exists</span><br/>");
      $error = true;
    }
    if (strtolower($_POST["nick"]) == "god" ) {
      //lol
      echo("<span style=\"color: #FF0000\">User with this nick already exists</span><br/>");
      $error = true;
    }
    if (strlen($_POST["nick"]) < 2) {
      echo("<span style=\"color: #FF0000\">Nick must be at least 2 chars</span><br/>");
      $error = true;
    } elseif (strlen($_POST["nick"]) > 10) {
      echo("<span style=\"color: #FF0000\">Nick cant be longer than 10 chars (faks up tabels)</span><br/>");
      $error = true;
    }
    if (illegalChars($_POST["nick"]) && $_POST["nick"] != "") {
      echo("<span style=\"color: #FF0000\">Nick contains illegal chars (" . illegalChars("", true) . ")</span><br/>");
      $error = true;
    }
    if ($_POST["country"] == "NULL") {
      echo("<span style=\"color: #FF0000\">Select a country</span><br/>");
      $error = true;
    }
    if ($_POST["pwd"] == "") {
      echo("<span style=\"color: #FF0000\">Password can't be nothing</span><br/>");
      $error = true;
    } elseif ($_POST["pwd"] != $_POST["pwd2"]) {
      echo("<span style=\"color: #FF0000\">Passwords don't match</span><br/>");
      $error = true;
    } elseif(strlen($_POST["pwd"]) < 3) {
      echo("<span style=\"color: #FF0000\">Password must be at least 3 chars</span><br/>");
      $error = true;
    } elseif(strlen($_POST["pwd"]) > 30) {
      echo("<span style=\"color: #FF0000\">Password can't be longer than 30 chars</span><br/>");
      $error = true;
    }
    if (strlen($_POST["team"]) > 12) {
      echo("<span style=\"color: #FF0000\">Team name can't be longer than 12 chars</span><br/>");
      $error = true;
    }
    if ($error == false) {
      $fh = fopen("usersz/" . $_POST["nick"], "w");
      fwrite($fh, $_POST["nick"] . "\n");                       //nick
      fwrite($fh, $_POST["elmaname"] . "\n");                   //state.dat name
      fwrite($fh, strtolower($_POST["country"]) . "\n");        //nationality
      fwrite($fh, $_POST["team"] . "\n");                       //team
      fwrite($fh, md5(md5($_POST["pwd"])) . "\n");                   //password
      fwrite($fh, time() . "\n");                               //register date
      fwrite($fh, $_POST["email"] . "\n");                      //email
      fwrite($fh, "Default\n");                                 //theme
      fwrite($fh, "0\n");                                       //timezone
      fwrite($fh, "m:s:i\n");                                   //timeformat
      fclose($fh);
      $_SESSION["nick"] = $_POST["nick"];
      chmod("usersz/" . $_POST["nick"], 0644);
      echo("<span style=\"color: #00CC00\">User created! Now up your state.dat <a href=\"index.php\">here</a>.</span><br/>");
    }
  }
?>
<?php include("tpo.php"); ?>