<?php
  /* FUNCTIONAL SETTINGS */
  $rootPath = $_SERVER["DOCUMENT_ROOT"];
  $dirpath = dirname(dirname(__FILE__));
  $protocol = "https://";
  $hostname = $protocol.$_SERVER["HTTP_HOST"];
  $siteURL = $hostname;
  $domainName = $_SERVER['HTTP_HOST'];
  global $domainName;
  $uri = $_SERVER['REQUEST_URI'];
  $url = $hostname.$uri;
  $parseURL= parse_url($url, PHP_URL_PATH);
  $shareURL = $protocol.$domainName.$parseURL;
  $uriPath = explode("/", trim($parseURL, "/"));
  $ran = rand(160,320);
  /* USER IDENTIFICATION SETTINGS */
  if ($domainName != "localhost") {
    $ip = NULL;
    $ip = $_SERVER['REMOTE_ADDR'] ?: $_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ?: $_SERVER['HTTP_CLIENT_IP'];
    $geoIP = "http://"."ip-api.com/json/{$ip}";
    $data = @json_decode(file_get_contents($geoIP));
    $userinfo = $data;
  }
  include($dirpath."/inc/"."settings".".php");

  if(($isHTTPS == TRUE)&&($_SERVER['HTTPS'] != "on")){
  // if($isHTTPS == TRUE){
    // if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
      $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: ' . $redirect);
      exit();
    // }
  }
?>
