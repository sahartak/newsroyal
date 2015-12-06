<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'facebook-sdk-v5/');
require_once 'facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook(array(
  'app_id' => '1645796052337060',
  'app_secret' => '4aa059eca21f6513886a2774025fd1a4',
  'default_graph_version' => 'v2.2',
  ));

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
echo $_SESSION['facebook_access_token'];
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}