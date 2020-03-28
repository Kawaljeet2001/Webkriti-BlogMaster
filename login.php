<?php
// if (!isset($_SESSION['u_id'])) {
//   echo '<script>alert("Not logged in")</script>';
// } else {
//   echo '<script>alert("logged in")</script>';
// }

    require_once 'g-config.php';
    $loginURL = $gClient->createAuthUrl();


     $redirectURL = 'http://localhost/webkriti/fb-callback.php';
     $permissions = ['email'];
     $loginURLfb = $helper->getLoginUrl($redirectURL, $permissions);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <title>Login - Blogging Website</title>
    <script>
    function preventBack()
    {window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

    <div class="login_form">
      <form class="form_try" action="" method="post">
        <i class="fa fa-user-circle fa-9x" aria-hidden="true" ></i>

        <div class="api">
          <!-- <h2>Sign in Using</h2> -->
          <div class="api_icons">
            <a href="#">
              <button type="button" onclick="window.location= '<?php echo $loginURL;?>'" name="button">
                <i class="fab fa-google fa-2x" aria-hidden="true"></i>
                Log in using Google
              </button>
            </a>
            <a href="#">
              <button type="button" onclick="window.location= '<?php echo $loginURLfb;?>'" name="button">
                <i class="fab fa-facebook fa-2x" aria-hidden="true"></i>
                Log in using Facebook
              </button>
            </a>
          </div>
        </div>

        <div class="or">
          <hr>
          <h2>OR</h2>
          <hr>
        </div>

        <input class= "ff" placeholder="USERNAME" type="text" name="uid" id = "uid">

        <div class="password_div">
          <i class="fa fa-unlock-alt" id = "lock" aria-hidden="true"></i>

          <input class= "ff password_ff" placeholder="PASSWORD" type="password" name="pwd" id = "pwd">
        </div>

        <b class = "notifier">This field cannot be empty</b>

        <div class="radio">
          <a class = "forgot" href="#">Forgot Password?</a>
        </div>
        <button class = "login_button" type="submit" name="button">Login</button>

        <label class = "dont" for="">Don't have an account yet?</label>
        <a href="register.php">Create an Account</a>
      </form>
    </div>
    <script src = "scripts/login.js">

    </script>
  </body>
</html>
