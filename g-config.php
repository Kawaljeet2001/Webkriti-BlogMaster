<?php
  session_start();
  require_once "GoogleAPI/vendor/autoload.php";
  $gClient = new Google_Client();
  $gClient->setClientId("992443271025-j8ts7miuerdmrjnf79r5c3asrl34vs1e.apps.googleusercontent.com");
  $gClient->setClientSecret("eISAkOFrY7kEqS0RlSmtMpCp");
  $gClient->setApplicationName("Webkriti");
  $gClient->setRedirectUri("https://tendencious-july.000webhostapp.com/g-callback.php");
  $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

// Facebook
  require_once 'Facebook/autoload.php';
  $FB = new \Facebook\Facebook([
      'app_id' => '650769062346863',
      'app_secret' => 'db7ab0a0271372aed185325a9f9dcb79',
      'default_graph_version' => 'v2.10'
  ]);

  $helper = $FB->getRedirectLoginHelper();

?>
