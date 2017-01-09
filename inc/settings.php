<?php
  $settings_file = ROOT."/settings.json";
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
