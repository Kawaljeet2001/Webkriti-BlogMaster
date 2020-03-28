<?php


$conn = mysqli_connect('localhost','root','','webkriti');
if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
  $c_uid = substr($_SESSION['uid'],2);
} else {
  $c_uid = $_SESSION['uid'];
}
$sql = "SELECT * FROM posts WHERE u_uid='$c_uid' AND archive=1;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {

    echo '<div class="all-posts-div">
            <div class="image_holder">';
            if (mysqli_num_rows($result) > 0) {
              // if ($status == 0) {;
                echo '<img src="assets/uploads/'.$row['imgname'].'" alt="">';
              // }
            }
        echo '</div>
        <div class="contents-each-blog-show">
          <a href="#"><h3 class = "blog-each-title">'.$row['title'].'</h3></a>
          <div class="date-category">
            <h5>'.$row['date'].'</h5>
            <hr>
            <h5>'.$row['category'].'</h5>
          </div>
          <div class="post-content-short">
            <p>'.substr($row['content'],0,400).'...'.'</p>
          </div>
          <a class = "read-more-button" href="blogeach.php?id='.$row['id'].'">Read More... </a>
        </div>
    </div>';

}
 ?>
