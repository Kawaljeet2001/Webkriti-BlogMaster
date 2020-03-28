<?php
  $conn = mysqli_connect("localhost","root","","webkriti");
  $uid = $_SESSION['uid'];
  $sql2 = "SELECT * FROM users WHERE uid = '$uid';";
  $result2 = mysqli_query($conn,$sql2);
  while ($row = mysqli_fetch_assoc($result2)) {
    $id = $row['id'];
  }


  $sql = "SELECT * FROM profileimg WHERE u_id = '$id';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($rowimg = mysqli_fetch_assoc($result)) {
      $i_ext = $rowimg['ext'];
      $i_id = $rowimg['u_id'];
      $status = $rowimg['status'];
    }
  }


?>
