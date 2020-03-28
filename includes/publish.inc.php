<?php
session_start();
$conn = mysqli_connect('localhost','root','','webkriti');
if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
  $c_uid = substr($_SESSION['uid'],2);
} else {
  $c_uid = $_SESSION['uid'];
}

$p_id = $_GET['id'];
$sql = "UPDATE posts SET archive = 1 where id = $p_id";
mysqli_query($conn,$sql);
header("Location: ../dashboard.php");
