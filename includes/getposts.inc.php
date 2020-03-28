<?php

$conn = mysqli_connect('localhost','root','','webkriti');
if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
  $c_uid = substr($_SESSION['uid'],2);
} else {
  $c_uid = $_SESSION['uid'];
}
$sql = "SELECT * FROM posts WHERE u_uid='$c_uid' and archive = 1;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

  $title = $row['title'];
  $auth =  $row['u_uid'];
  $cat = $row['category'];
  $date = $row['date'];
  echo '
    <div class="all-post-each-container">
    <div class="blue-bar"></div>
    <div class="category_each-holder">
      <h3 class="category_each">'.$cat.'</h3>
      <h2>'.$title.'</h2>
      <h3 class="author">Written By - '.$auth.' </h3>
    </div>
    <div class = "date-holder-other">
      <h5 class = "date">Published on : '.$date.' </h5>
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

        <button type="button" name="button" onclick="window.location.href=\'includes/archive.inc.php?id='.$row['id'].'\'">Archive</button>
        <a href="includes/delposts.inc.php?id='.$row['id'].'"><i class="fa fa-trash " aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
 ';
 }
?>
