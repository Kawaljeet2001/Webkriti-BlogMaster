<?php
  include 'includes/getpostsettings.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width , initial-scale = 1">
    <link rel="stylesheet" href="css/blogall.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
      let div = $(".about-author");
      div.text(div.text().substring(0,50));
    </script>
    <title><?php echo $b_name; ?></title>
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

    <div class="main-contain-all">
      <div class="info-menu">
        <div class="author-image">
          <?php include 'includes/getprofileimg.php';
          if (mysqli_num_rows($result) > 0) {
            if ($status == 0) {
              echo '<img src="assets/uploads/profile'.$i_id.'.'.$i_ext.'" alt="">';
            }
          }
          ?>

        </div>

        <h6 class="author-name"><?php echo $d_name; ?></h6>
        <hr>

        <div class="about-author">
          <?php echo substr($about_auth,0,320); ?>
        </div>
        <hr>

        <div class="social">
          <a href="<?php echo $f_link; ?>">
            <i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i>
          </a>
          <a href="<?php echo $i_link; ?>">
            <i class="fab fa-instagram fa-2x" aria-hidden="true"></i>
          </a>
          <a href="<?php echo $t_link; ?>">
            <i class="fab fa-twitter fa-2x" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <div class="all-posts-main">
        <?php include 'includes/geteachpost.inc.php'; ?>
        <!-- <div class="all-posts-div">

            <div class="image_holder">
                <img src="assets/blog_try.jpg" alt="">
            </div>

            <div class="contents-each-blog-show">
              <a href="#"><h3 class = "blog-each-title">Overlaid the users usualyy pass out the tests</h3></a>

              <div class="date-category">
                <h5>March 5 2020</h5>
                <hr>
                <h5>Education</h5>
              </div>

              <div class="post-content-short">
                <p>lorem ipsum lulu hai tu chan d tripathibhig e erge ge rtgr brt rbr g btb thb tbt vn  vymnc m nvt c m vty nvtym tvtnh r tcn lore Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>

              <a class = "read-more-button" href="#">Read More... </a>
            </div>
        </div> -->


      </div>

    </div>

  </body>
</html>
