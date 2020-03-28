<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'webkriti');
$pwd = $_POST['pwd'];
$email = $_POST['uid'];

$sql = "SELECT * FROM users WHERE uid='$email' OR email='$email';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// Checking for empty fields
if (empty($email) || empty($pwd)) {
  echo '<script>
    $(".notifier").show();
  </script>';
  echo "All fields are mandatory.";
  exit();
} else if ($resultCheck < 1) {
    echo '<script>
      $(".notifier").show();
      </script>';
    echo "User not found.";
    exit();
} else {
    if ($row = mysqli_fetch_assoc(($result))) {
			//De-hashing the password

        $hashedPwdCheck = password_verify($pwd, $row['pwd']);

        if ($hashedPwdCheck == false) {
            echo '<script>
              $(".notifier").show();
            </script>';
            echo "Username and Password do not match.";
            exit();
        } elseif ($hashedPwdCheck == true) {
				//Logging the user in

            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uid'] = $row['uid'];

            echo '<script>
              $(".notifier").show();
            </script>';
            echo "Login successful";
            echo "<script>
              window.location.href = 'dashboard.php';
            </script>";
            exit();
        }
    }
}

?>
