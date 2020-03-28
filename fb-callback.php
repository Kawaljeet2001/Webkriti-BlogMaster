<?php
$conn = mysqli_connect('localhost', 'root', '', 'webkriti');
require_once 'g-config.php';
try {
    $accessToken = $helper->getAccessToken();
} catch (\Facebook\Exceptions\FacebookResponseException $e) {
    echo "Response Exception: " . $e->getMessage();
    exit();
} catch (\Facebook\Exceptions\FacebookSDKException $e) {
    echo "SDK Exception: " . $e->getMessage();
    exit();
}

if (!$accessToken) {
    header("Location: login.php");
    exit();
}

$oAuth2Client = $FB->getOAuth2Client();
if (!$accessToken->isLongLived()) {
    $accessToken = $oAuth2Client->getLongLivedAccessToken();
}

$response = $FB->get("/me?fields=id,first_name,last_name,email", $accessToken);
$userData = $response->getGraphNode()->asArray();
$email = 'f_' . $userData['email'];
$uid = 'f_' . $userData['first_name'] . '_' . $userData['last_name'];

$sql = "SELECT * FROM users WHERE uid = '$uid' OR email='$email';";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
  $_SESSION['uid'] = 'f_' . $userData['first_name'] . '_' . $userData['last_name'];
  $_SESSION['email'] = 'f_' . $userData['email'];
  header("Location: dashboard.php");
  exit();
} else {


  $sql = "INSERT INTO users (uid, email) VALUES ('$uid','$email');";
  $sql2 = "INSERT INTO blog_settings (b_name, d_name, about_auth, f_link, i_link, t_link, u_uid) VALUES ('-','-','-','-','-','-','$uid');";
  mysqli_query($conn, $sql);
  mysqli_query($conn, $sql2);

  // echo "<pre>";
  $_SESSION['uid'] = 'f_' . $userData['first_name'] . '_' . $userData['last_name'];
  $_SESSION['email'] = 'f_' . $userData['email'];

  header("Location: dashboard.php");
  exit();
}

?>
