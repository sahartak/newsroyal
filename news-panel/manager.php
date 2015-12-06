<?php


error_reporting(E_ALL);

include('gal/Assets/Connector/FileManager.php');

// Please add your own authentication here
function UploadIsAuthenticated($get){
  if(!empty($get['session'])) return true;
  
  return false;
}

$browser = new FileManager(array(
  'directory' => '../upload/photos',
  'thumbnailPath' => 'gal/demos/Files/Thumbnails/',
  'assetBasePath' => 'gal/Assets',
  'chmod' => 0777
));

$browser->fireEvent(!empty($_GET['event']) ? $_GET['event'] : null);?>