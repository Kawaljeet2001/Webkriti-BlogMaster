<?php
session_start();
$conn = mysqli_connect("localhost","root","","webkriti");
$u_uid = $_SESSION['uid'];
$sql = "SELECT * FROM blog_settings WHERE u_uid='$u_uid';";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
  $b_name = $row['b_name'];
  $d_name = $row['d_name'];
  $about_auth = $row['about_auth'];
  $f_link = $row['f_link'];
  $i_link = $row['i_link'];
  $t_link = $row['t_link'];

}
 ?>
