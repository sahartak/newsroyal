<?php
echo 'ok <br>';
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', 'facebook-sdk-v5/');
require_once 'facebook-sdk-v5/autoload.php';

$fb = new Facebook\Facebook(array(
  'app_id' => '765618716875409',
  'app_secret' => '5e3c1a44bf709e2be25a3b3f4bb2ec9d',
  'default_graph_version' => 'v2.5',
  ));
  echo 'ok <br>';
$helper = $fb->getRedirectLoginHelper();
echo 'ok <br>';
$permissions = array('email', 'user_likes'); // optional
echo 'ok <br>';
$loginUrl = $helper->getLoginUrl('http://newsroyal.com/fb-api/login.php', $permissions);
echo 'ok <br>';
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';