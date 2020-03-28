<?php
  session_start();
  $conn = mysqli_connect("localhost","root","","webkriti");
  $id = $_GET['id'];


  $sql = "DELETE FROM posts WHERE id='$id'";
  mysqli_query($conn, $sql);

  header("Location: ../dashboard.php")


?>
