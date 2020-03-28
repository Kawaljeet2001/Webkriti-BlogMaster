<?php
    $conn = mysqli_connect('localhost', 'root', '', 'webkriti');
    require_once 'g-config.php';
    if (isset($_SESSION['access_token'])) {
        $gClient->setAccessToken($_SESSION['access_token']);
    } else if (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    } else {
        header("Location: login.php");
        exit();
    }


    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    $email = 'g_'.$userData['email'];
    $uid = 'g_'.$userData['givenName'].'_'.$userData['familyName'];

    $sql = "SELECT * FROM users WHERE uid = '$uid' OR email='$email';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      $_SESSION['email'] = 'g_'.$userData['email'];
      $_SESSION['uid'] = 'g_'.$userData['givenName'].'_'.$userData['familyName'];
      header("Location: dashboard.php");
      exit();
    } else {

      $sql = "INSERT INTO users (uid, email) VALUES ('$uid','$email');";
      $sql2 = "INSERT INTO blog_settings (b_name, d_name, about_auth, f_link, i_link, t_link, u_uid) VALUES ('-','-','-','-','-','-','$uid');";
      mysqli_query($conn, $sql);
      mysqli_query($conn, $sql2);

      // echo "<pre>";
      $_SESSION['email'] = 'g_'.$userData['email'];
      $_SESSION['uid'] = 'g_'.$userData['givenName'].'_'.$userData['familyName'];
      header("Location: dashboard.php");
      exit();
    }
?>
