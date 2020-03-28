<?php
/*
  session_start();
  $conn = mysqli_connect("localhost","root","","webkriti");
  $id = $_GET['id'];

  if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
    $c_uid = substr($_SESSION['uid'],2);
  } else {
    $c_uid = $_SESSION['uid'];
  }
  $sql = "SELECT * FROM posts WHERE u_uid='$c_uid';";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $category = $row['category'];
    $content = $row['content'];
  }

  echo "<script>window.location.href='../dashboard.php';</script>"; */
if (isset($_POST['category'])) {
  session_start();
  $conn = mysqli_connect("localhost","root","","webkriti");

  $id = $_POST['id'];
  $title = $_POST['title'];
  if ($_POST['category'] == 'none') {
    $category = $_SESSION['category'];
  } else {
    $category = $_POST['category'];
  }
  $content = $_POST['content'];
  $u_uid2 = $_SESSION['uid'];
  if ($_FILES['file']['name'] != "") {
    $fname = $_FILES['file']['name'];
    $ftmpname = $_FILES['file']['tmp_name'];
    $fext1 = explode('.', $fname);
    $fext = strtolower(end($fext1));
    $fnamenew = 'post' . uniqid("",true) . "." . $fext;
    $fdest = '../assets/uploads/' . $fnamenew;
    move_uploaded_file($ftmpname, $fdest);

    $sql = "UPDATE posts SET title='$title',category='$category',content='$content', imgname='$fnamenew' WHERE id='$id';";
  } else {
    $sql = "UPDATE posts SET title='$title',category='$category',content='$content' WHERE id='$id';";
  }

  mysqli_query($conn, $sql);
  header("Location: ../dashboard.php");


} else {
  header("Location: ../dashboard.php?error");
}


?>
