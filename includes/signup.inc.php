<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'webkriti');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);

// Checking for empty fields
if (empty($email) || empty($uid) || empty($pwd)) {
  echo '<script>
    $(".notifier").show();
  </script>';
  echo "All fields are mandatory.";
  exit();
}

//Checking if username exists

$sql = "SELECT * FROM users WHERE uid='$uid' OR email='$email'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo '<script>
      $(".notifier").show();
    </script>';
    echo "Username/E-mail id already exists.";
    exit();
} else if ($pwd != $cpwd) {
  echo '<script>
    $(".notifier").show();
  </script>';
  echo "Passwords do not match.";
} else {
    //Hashing the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (uid,email,pwd) VALUES ('$uid','$email','$hashedPwd');";
    $sql2 = "INSERT INTO blog_settings (b_name, d_name, about_auth, f_link, i_link, t_link, u_uid) VALUES ('-','-','-','-','-','-','$uid');";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    echo "Signup successful";
    echo "<script>
      window.location.href = 'login.php';
    </script>";
}


?>
