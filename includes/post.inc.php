<?php

  session_start();
  $conn = mysqli_connect('localhost','root','','webkriti');
  $title = $_POST['title'];
  if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
    $u_uid = substr($_SESSION['uid'],2);
  } else {
    $u_uid = $_SESSION['uid'];
  }
  date_default_timezone_set("Asia/Kolkata");
  $category = $_POST['category'];
  $content = $_POST['content'];
  $date = date("Y-m-d")." ".date("H:i:s");
  $fname = $_FILES['file']['name'];
  $ftmpname = $_FILES['file']['tmp_name'];
  $fext1 = explode('.', $fname);
  $fext = strtolower(end($fext1));
  $u_uid2 = $_SESSION['uid'];
  $fnamenew = 'post' . uniqid("",true) . "." . $fext;
  $fdest = '../assets/uploads/' . $fnamenew;
  move_uploaded_file($ftmpname, $fdest);
  $sql = "INSERT INTO posts (u_uid,title,category,content, date, imgname , archive) VALUES ('$u_uid','$title','$category','$content','$date', '$fnamenew' , 1);";
  mysqli_query($conn, $sql);


echo $u_uid;
echo '<script>window.location.href="dashboard.php"</script>';

 ?>
