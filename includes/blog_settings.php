<?php
  if (isset($_POST['s_button'])) {

    session_start();
    $conn = mysqli_connect("localhost","root","","webkriti");

    $b_name = $_POST['b_name'];
    $d_name = $_POST['d_name'];
    $about_auth = $_POST['about_auth'];
    $f_link = $_POST['f_link'];
    $i_link = $_POST['i_link'];
    $t_link = $_POST['t_link'];
    $u_uid = $_SESSION['uid'];
    // $sql = "UPDATE blog_settings SET (b_name, d_name, about_auth, f_link, i_link, t_link, u_uid) VALUES ('$b_name','$d_name','$about_auth','$f_link','$i_link','$t_link','$u_uid');";
    $sql = "UPDATE blog_settings SET b_name = '$b_name',d_name='$d_name',about_auth='$about_auth',f_link='$f_link',i_link='$i_link',t_link='$t_link' WHERE u_uid = '$u_uid';";
    mysqli_query($conn, $sql);
    header("Location: ../dashboard.php?success");

    // profile img
    $fname = $_FILES['file']['name'];
    $ftmpname = $_FILES['file']['tmp_name'];
    $fext1 = explode('.', $fname);
    $fext = strtolower(end($fext1));
    $sql2 = "SELECT * FROM users WHERE uid='$u_uid'";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $u_id1 = $row['id'];
            $sql3 = "INSERT INTO profileimg (u_id, status, ext) VALUES ('$u_id1',0, '$fext');";
            mysqli_query($conn, $sql3);
        }
        $fnamenew = 'profile' . $u_id1 . "." . $fext;
        $fdest = '../assets/uploads/' . $fnamenew;
        move_uploaded_file($ftmpname, $fdest);

        header("Location: ../dashboard.php");
    }
  } else {
    header("Location: ../dashboard.php?error");
  }


 ?>
