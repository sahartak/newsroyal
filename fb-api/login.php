<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'facebook-sdk-v5/');
require_once 'facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook(array(
  'app_id' => '765618716875409',
  'app_secret' => '5e3c1a44bf709e2be25a3b3f4bb2ec9d',
  'default_graph_version' => 'v2.5',
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