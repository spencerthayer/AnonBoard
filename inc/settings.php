<?php
  /* FUNCTIONAL SETTINGS */
  $rootPath = $_SERVER["DOCUMENT_ROOT"];
  $dirpath = dirname(dirname(__FILE__));
  $protocol = "https://";
  $hostname = $protocol.$_SERVER["HTTP_HOST"];
  $siteURL = $hostname;
  $domainName = $_SERVER['HTTP_HOST'];
  $uri = $_SERVER['REQUEST_URI'];
  $url = $hostname.$uri;
  $parseURL= parse_url($url, PHP_URL_PATH);
  $shareURL = $protocol.$domainName.$parseURL;
  $uriPath = explode("/", trim($parseURL, "/"));
  $ran = rand(160,320);
  /* USER IDENTIFICATION SETTINGS */
  if ($domainName != "localhost") {
    $ip = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
    $geoIP = "http://"."ip-api.com/json/{$ip}";
    $data = @json_decode(file_get_contents($geoIP));
    $userinfo = $data;
  }
  /* VANITY SETTINGS */
  $maxPosts = 2560; //CHANGE THIS IF YOU WANT A LARGER FORUM
  $siteName = "/".$domainName."/";
  $proxyURI = "https://ssl-proxy.my-addr.org/myaddrproxy.php/https/";
?>
