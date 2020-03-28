<?php
  include 'includes/getpostsettings.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width , initial-scale = 1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <title><?php echo $b_name;?></title>
  </head>
  <body>
    <nav>
      <h1><?php echo $b_name; ?></h1>

      <div class="nav-items">
          <ul>
            <li>
              <a href="blogall.php">Home</a>
            </li>
            <li>
              <a href="contact.php">Contact</a>
            </li>
            <li>
              <a href="dashboard.php">Dashboard</a>
            </li>
          </ul>
      </div>
    </nav>

    <div class="main">
      <h5>Contact Number: </h5>
      <h5>Email: </h5>
      <h5>Address:</h5>

    </div>

  </body>
</html>
