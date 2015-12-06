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
$permissions = array('email', 'user_likes'); // optional
$loginUrl = $helper->getLoginUrl('http://sahart.ru/fb-api/login.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';