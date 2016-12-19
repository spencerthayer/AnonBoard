<?php
  $time = time();
  header("HTTP/1.1 200 OK");
  header("Content-Type: text/plain; charset=utf-8");
  // header("Content-Disposition: attachment; filename=\"".$time.".txt\"");
  $filename = "https://theanarchistlibrary.org/library/emile-pouget-direct-action.muse";
  $content = file_get_contents($filename);
  $split = preg_split("/\P{L}+/uxi",$content);
  $ran = rand(1,4);
  function generate_password( $length = 0 ) {
    $spaces = "                   ";
    $chars = $spaces."!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
  }
  for ($x = 1; $x <= 365; $x++) {
    echo "[".$x."] ";
    for ($i = 1; $i <= 18; $i++) {
      shuffle($split);
      // $value = (array_slice($split, 0, 3));
      // $value = $split[array_rand($split, 1)];
      $value = $split[mt_rand(0, count($split) - 1)];
      echo $value."".generate_password($ran)."";
    }
    echo "\n\n";
  }
?>
