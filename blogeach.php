<?php
  session_start();
  $conn = mysqli_connect("localhost","root","","webkriti");
  $id = $_GET['id'];
  $u_uid = $_SESSION['uid'];
  $sql = "SELECT * FROM posts WHERE id='$id';";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $category = $row['category'];
    $date = $row['date'];
    $content= $row['content'];
    $img = $row['imgname'];
  }
  $sql2 = "SELECT b_name FROM blog_settings WHERE u_uid = '$u_uid';";
  $result2 = mysqli_query($conn, $sql2);
  if ($row2 = mysqli_fetch_assoc($result2)) {
    $b_name = $row2['b_name'];
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width , initial-scale = 1">
    <link rel="stylesheet" href="css/blogeach.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Blog-title</title>
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

    <div class="main-blog">
      <h1 class = "title"><?php echo $title; ?></h1>
      <div class="date-category">
        <span><?php echo $date; ?></span>
        <hr>
        <span><?php echo $category; ?></span>
      </div>
      <div class="blog-image">
        <img src="assets/uploads/<?php echo $img; ?>" alt="">
      </div>
      <div class="content-blog">

        <p><?php echo $content; ?></p>

      </div>
    </div>

  </body>
</html>
