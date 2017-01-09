<?php /**/
  // TEXT FILE HEADER
  header("HTTP/1.1 200 OK");
  header("Content-Type: text/plain; charset=utf-8");
  if(strstr($_SERVER['REQUEST_URI'], "download")) {
    header("Content-Disposition: attachment; filename=\"".$_SERVER['SERVER_NAME']."-".time().".txt\"");
  }
  // URL SOURCE MANAGEMENT
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
  function generate() {
    $length = rand(1,6);
    $spaces = "          ";
    $lowerCase = "abcdefghijklmnopqrstuvwxyz";
    $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $digits = "1234567890";
    $special = "!@#$%^&*(){}<>|\/_-=+;:,.?'`~";
    $latin = "";
    $chars = $spaces.$special.$spaces.$digits.$spaces.$latin;
    $randChar = substr( str_shuffle( $chars ), 0, $length );
    return $randChar;
  }
  // GENERATE THE SOCIALIST MILLIONAIRE ALGORITHM
  for ($x = 1; $x <= 366; $x++) {
    echo "[".$x."]";
    for ($i = 0; $i <= 9; $i++) {
      shuffle($split);
      $value = $split[mt_rand(0, count($split) - 1)];
      if ($i == 0) echo "[";
      echo $value."".generate()."";
      if ($i == 9) echo "]";
    }
    if(strstr($_SERVER['REQUEST_URI'], "html")) {
      if ($x != 366) echo "\n<br/><br/>\n";
    } else {
      if ($x != 366) echo "\n\n";
    }
  }
// http://php.net/mt_srand
// http://pastebin.com/V1PBCHB8
/**/ ?>
