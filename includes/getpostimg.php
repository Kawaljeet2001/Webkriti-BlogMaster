<?php
  $conn = mysqli_connect("localhost","root","","webkriti");
  if (substr($_SESSION['uid'],0,1) == 'g' or substr($_SESSION['uid'],0,1) == 'f') {
    $c_uid = substr($_SESSION['uid'],2);
  } else {
    $c_uid = $_SESSION['uid'];
  }
  $sql2 = "SELECT * FROM posts WHERE u_uid = '$c_uid';";
  $result2 = mysqli_query($conn,$sql2);
  while ($row = mysqli_fetch_assoc($result2)) {
    $id = $row['id'];
  }


  $sql = "SELECT * FROM blogimg WHERE p_id = '$id';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($rowimg = mysqli_fetch_assoc($result)) {
      $i_ext = $rowimg['ext'];
      $i_id = $rowimg['p_id'];
      $status = $rowimg['status'];
    }
  }


?>
