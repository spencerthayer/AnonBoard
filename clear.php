<?php
  $rootPath = $_SERVER["DOCUMENT_ROOT"];
  $hostname = $_SERVER["HTTP_HOST"];
  $jsonDir = $rootPath."/boards/".$hostname."/";
  $now = new DateTime();
  $jsonFiles = scandir($jsonDir);
  foreach($jsonFiles as $file) {
    $fileContents = file_get_contents($jsonDir.$file);
    $data = @json_decode($fileContents, true);;
    $created = $data['created'];
    $updated = $data['updated'];
    if(!empty($data['expires'])){
      $expires = "-".$data['expires']." days";
    } else {
      $expires = NULL;
    }
    $image = $data['image'];
    $postPath = $jsonDir.$created.".json";
    $imgPath = $jsonDir."images/".$image;
    if (strtotime($expires) > $created) {
      if(!empty($created)){
        echo "<!-- DELETED ** ".$postPath." ** !-->\n";
        unlink($postPath);
      }
      if(!empty($image)){
        echo "<!-- DELETED ** ".$imgPath." ** !-->\n";
        unlink($imgPath);
      }
    }
  }
?>
