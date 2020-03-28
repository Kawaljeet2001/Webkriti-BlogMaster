<?php
  session_start();
  if (!isset($_SESSION['uid'])) {
   header("Location: login.php");
  } else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/dashboardcontents.css">
  </head>
  <body>
    <div class="menu_nav">
      <div class="logo_holder">
        <img src="assets/logo.png" alt="">
      </div>
      <div class="top-text-holder">
      <h3 id = "top_text">Posts/All Posts</h3>
            <?php if (isset($_SESSION['uid'])) { ?>
                <div class="useri">
                  <h5>Logged in as: </h5>
                  <h2 class = "name-of-user"><?php
                  if (substr($_SESSION['uid'], 0,1) == 'g' || substr($_SESSION['uid'], 0,1) == 'f'){
                    echo  substr($_SESSION['uid'], 2);
                  } else {
                    echo $_SESSION['uid'];
                  }

                  ?></h2>
                </div>
                <?php } ?>
      </div>
    </div>
    <div class="main">
      <div class="menu">
        <a class = "view" href="blogall.php">View Blog</a>
        <div class="button_holder">
          <a href="#" class = "div_button" id = "all_posts">
            <button type="button" name="button">
              <i class="fa fa-book fa-2x" aria-hidden="true"></i>
              <h4>All Posts</h4>
            </button>
          </a>
          <a href="#" class = "div_button" id = "create_post">
            <button type="button" name="button">
              <i class="fa fa-location-arrow fa-2x" aria-hidden="true"></i>
              <h4>Create Post</h4>
            </button>
          </a>
          <a href="#" class = "div_button" id = "blog_settings" >
            <button type="button" name="button">
              <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>
              <h4>Blog Settings</h4>
            </button>
          </a>
          <a href="#" class = "div_button" id = "contact_details" >
            <button type="button" name="button">
              <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
              <h4>Contact  </h4>
            </button>
          </a>
          <a href="#" class = "div_button" id = "archives" >
            <button type="button" name="button">
              <i class="fa fa-archive fa-2x" aria-hidden="true"></i>
              <h4>Archives</h4>
            </button>
          </a>
        </div>
        <hr>
        <a href="#">
          <form class="" action="includes/logout.inc.php" method="post">
            <button class = "logout_button"  type="submit" name="button">
               Logout
            </button>
          </form>
        </a>

        <div class="footer_menu">

          <a href="terms.php">Terms of Use</a>
          <a href="privacy.php">Privacy Policy</a>

        </div>
      </div>
      <div class="content">
        <div class="main_content" id = "create_post_div">
          <h2>Create a New Post</h2>
          <form id="post_form" action="includes/post.inc.php" enctype="multipart/form-data" method="post">
            <label for="">Title:</label>
            <input type="text" name="title" id="title" class="inp">
            <label for="">Category: </label>
            <select class="category-selector" name="category">
              <option value="Others">None</option>
              <option value="Educational">Educational</option>
              <option value="Technological">Technological</option>
              <option value="Food">Food</option>
              <option value="Travel">Travel & Tourism</option>
              <option value="Lifestyle">Lifestyle</option>
              <option value="Others">Others</option>
            </select>
            <!-- <input placeholder="Enter your category" id= "custom_category" type="text" name="" value=""> -->
            <label for="">Enter your content here:</label>
            <textarea name="content" rows="8" cols="80"></textarea>
            <label for="">Upload image:</label>
            <input  type="file" name="file">

            <button type="submit" name="button">Post</button>
            <b id="try">bdsbm</b>

          </form>
        </div>
        <div class="main_content" id = "all_posts_div">
          <h2>All Posts</h2>
          <?php include 'includes/getposts.inc.php'; ?>



            <!-- <div class="blue-bar"></div>
            <div class="">
              <h3 class="category_each">Category</h3>
              <h2>Blog-title-Complete</h2>
              <h3 class="author">Written By - </h3>
            </div>

            <div class="buttons">
              <button type="button" name="button">Edit Post</button>
              <a href="#"><i class="fa fa-trash " aria-hidden="true"></i></a>
            </div> -->






        </div>
        <div class="main_content" id = "blog_settings_div">
          <h2>Blog Settings</h2>
          <form class="blog_settings_form" action="includes/blog_settings.php" enctype="multipart/form-data" method="post">
            <div class="">
             <label for="">Blog Name: </label>
             <input type="text" name="b_name" value="">
           </div>
             <div class="">
              <label for="">Display Name: </label>
              <input type="text" name="d_name" value="">
            </div>
            <p>This is the name that will be displayed in your blog and does not necesserily need to be same as the username.</p>
            <label for="">Profile Image</label>
            <input type="file" name="file" value="">
            <label for="">About the Author</label>
            <textarea name="about_auth" rows="8" cols="80"></textarea>
            <p>Word-limit: 60 Words</p>



            <div class="social_holder">
              <div class="">
                <label for="">Link your Facebook Account:</label>
                <input placeholder="Enter url" type="text" name="f_link" value="">
              </div>
              <div class="">
                <label for="">Link your Instagram Account:</label>
                <input placeholder="Enter url" type="text" name="i_link" value="">
              </div>
              <div class="">
                <label for="">Link your Twitter Account:</label>
                <input placeholder="Enter url" type="text" name="t_link" value="">
              </div>
            </div>

            <button class ="save-button" type="submit" name="s_button">Save </button>
          </form>

        </div>
        <div class="main_content" id = "contact_details_div">
          <h2>Contact Details</h2>
          <p>This is the information that will be displayed in the contact page of your blog.</p>
          <div class="contact_form_holder">
            <form class="contact_form" action="index.html" method="post">
              <div class="">
                <label for="">Contact No. :</label>
                <input type="text" name="" value="">
              </div>
              <div class="">
                <label for="">Email-id :</label>
                <input type="text" name="" value="">
              </div>
                <label for="">Address: </label>
                <textarea name="name" rows="8" cols="80"></textarea>
                <button type="submit" name="button">Save</button>
              </div>

            </form>
          </div>
        <div class="main_content" id = "archives_div">
          <h2>Archives</h2>

            <?php
            $conn = mysqli_connect('localhost','root','','webkriti');
            if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
              $c_uid = substr($_SESSION['uid'],2);
            } else {
              $c_uid = $_SESSION['uid'];
            }
            $sql = "SELECT * FROM posts WHERE u_uid='$c_uid' and archive = 0;";
            $result = mysqli_query($conn , $sql);
            while($row = mysqli_fetch_assoc($result))
             {

               echo '
               <div class="all-post-each-container">
               <div class="blue-bar"></div>
               <div class="category_each-holder">
               <h3 class="category_each">'.$row['category'].'</h3>
               <h2>'.$row['title'].'</h2>
               <h3 class="author">Written By - '.$row['u_uid'].'</h3>
             </div>
             <div class = "date-holder-other">
               <h5 class = "date">Published on : '.$row['date'].'</h5>
               <div class="buttons">
               <form class="" action="edit.php" method="post">
                 <input type="hidden" name="id" value="'.$row['id'].'">
                 <input type="hidden" name="title" value="'.$row['title'].'">
                 <input type="hidden" name="category" value="'.$row['category'].'">
                 <input type="hidden" name="content" value="'.$row['content'].'">
                 <button class = "edit_button" type="submit" name="edit">
                   Edit Post
                 </button>
               </form>
                 <button type="button" name="button" onclick="window.location.href=\'includes/publish.inc.php?id='.$row['id'].'\'">Publish</button>
                 <a href="includes/delposts.inc.php?id='.$row['id'].'"><i class="fa fa-trash " aria-hidden="true"></i></a>
               </div>
             </div>
           </div>';
             }
            ?>


        </div>
      </div>
    </div>
    <script src = "scripts/dashboard.js">
    </script>
    <script src = "scripts/post.js">

    </script>
  </body>
</html>
<?php } ?>
