<?php
  // $settings_file = ROOT."/settings.json";
  // define("ROOT",getcwd());
  $domainName = $_SERVER['HTTP_HOST'];
  $boardName = strtolower($domainName);
  // mkdir(ROOT."/boards/");
  // mkdir(ROOT."/boards/".$boardName);
  // mkdir(ROOT."/boards/".$boardName."/images/");
  $settings_file = ROOT."/boards/".$boardName."/settings.json";
  if(!file_exists($settings_file)){
    header('Location: /settings.php');
    exit;
  } else {
    $settings = json_decode(file_get_contents($settings_file),true);
    $isHTTPS = $settings["isHTTPS"];
    if($settings["siteName"]==""){
        $siteName = "/".$domainName."/";
      } else {
        $siteName = $settings["siteName"];
      }
    $maxPosts = $settings["maxPosts"];
    $maxAge = $settings["maxAge"];
    $proxyURI = $settings["proxyURI"];
    $adminPass = $settings["adminPass"];
  }
?>
