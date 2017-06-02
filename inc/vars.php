<?php
  /* FUNCTIONAL SETTINGS */
  $rootPath = $_SERVER["DOCUMENT_ROOT"];
  $dirpath = dirname(dirname(__FILE__));
  $protocol = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https" : "http") . "://";
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
    $ip = $_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ?: $_SERVER['REMOTE_ADDR'] ?: $_SERVER['HTTP_CLIENT_IP'];
    $geoIP = "http://"."ip-api.com/json/{$ip}";
    $data = @json_decode(file_get_contents($geoIP));
    $userinfo = $data;
  }
  include($dirpath."/inc/"."settings".".php");
?>
