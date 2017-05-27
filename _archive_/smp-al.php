<?php /**/
  /**/
  //TEXT FILE HEADER
  header("HTTP/1.1 200 OK");
  header("Content-Type: text/plain; charset=utf-8");
  if(strstr($_SERVER['REQUEST_URI'], "download")) {
    header("Content-Disposition: attachment; filename=\"".$_SERVER['SERVER_NAME']."-".time().".txt\"");
  }/**/
  // URL SOURCE MANAGEMENT
  // echo "<head><link rel=\"stylesheet\" href=\"/css/main.css\"/></head>";
  $source = "https://theanarchistlibrary.org/random";
  $url = $source;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $a = curl_exec($ch);
  $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
  $filename = $url.".muse";
  // PARSE TEXT FILE
  $content = file_get_contents($filename);
  $split = preg_split("/\P{L}+/uxi",$content);
  // RANDOM STRONG CHARACTERS
  function rand_pass($min,$max){
    $spaces = " ";
    $lowerCase = "abcdefghijklmnopqrstuvwxyz";
    $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $digits = "1234567890";
    $special = "!@#$%^&*(){}[]<>|\/_-=+;:,.?'`~";
    $chars = $spaces.$lowerCase.$upperCase.$digits.$special;
    return substr(str_shuffle($chars),0,rand($min,$max));
    }

  // GENERATE THE SOCIALIST MILLIONAIRE ALGORITHM
  for ($x = 1; $x <= 366; $x++) {
    /** /
    echo "|";
    echo $x;
    echo " ";
    echo rand_pass(64,128);
    echo "|";
    echo "\n";
    /** /
    if ($switch = "html") {
      echo "<div class=\"coderow\">";
      echo "<div class=\"number\">".$x."</div>";
      echo "<input class=\"passphrase\" value=\"";
      echo rand_pass(64,128);
      echo "<\"/>";
      echo "</div>";
      // echo "\n";
      }
    /**/
  }
  // USE ANARCHIST LIBRARY AS A SOURCE
  /** /
  for ($x = 1; $x <= 366; $x++) {
    echo "<div class=\"coderow\"><div class=\"number\">".$x."</div>";
    for ($i = 0; $i <= 6; $i++) {
      shuffle($split);
      $value = $split[mt_rand(0, count($split) - 1)];
      if ($i == 0) echo "<textarea class=\"passphrase\">";
      echo $value."".rand_pass(1,6)."";
      if ($i == 6) echo "</textarea></div>";
    }
    if(strstr($_SERVER['REQUEST_URI'], "html")) {
      if ($x != 366) echo "\n<br/><br/>\n";
    } else {
      if ($x != 366) echo "\n\n";
    }
  }
  /**/
// http://php.net/mt_srand
// http://pastebin.com/V1PBCHB8
/**/ ?>
