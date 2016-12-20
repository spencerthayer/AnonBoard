<?php
  // TEXT FILE HEADER
  header("HTTP/1.1 200 OK");
  header("Content-Type: text/plain; charset=utf-8");
  // header("Content-Disposition: attachment; filename=\"".time().".txt\"");
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
  $ran = rand(1,5);
  // RANDOM STRONG CHARACTERS
  function generate_password( $length = 0 ) {
    $spaces = "          ";
    $chars = $spaces."!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }
  // GENERATE THE SOCIALIST MILLIONARIE ALGORITHM
  for ($x = 1; $x <= 366; $x++) {
    echo "[".$x."] ";
    for ($i = 1; $i <= 16; $i++) {
      shuffle($split);
      // $value = (array_slice($split, 0, 3));
      // $value = $split[array_rand($split, 1)];
      $value = $split[mt_rand(0, count($split) - 1)];
      echo $value."".generate_password($ran)."";
    }
    echo "\n\n";
  }
// ?>
