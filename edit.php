<?php
  if (isset($_POST['edit'])) {
  session_start();
  $conn = mysqli_connect("localhost","root","","webkriti");
  $id = $_POST['id'];
  $title= $_POST['title'];
  $category = $_POST['category'];
  $content = $_POST['content'];
  $_SESSION['category'] = $_POST['category'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width , inital-scale = 1">
    <link rel="stylesheet" href="css/dashboardcontents.css">
        <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
    <style>
      #create_post_div{
        display: flex;
        margin-top: 50px;
      }
    </style>
    <title></title>
  </head>
  <body>
    <div class="main_content" id = "create_post_div">
      <h2>Edit Post</h2>
      <form id="post_form" action="includes/editposts.inc.php" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label for="">Title:</label>
        <input type="text" name="title" id="title" class="inp" value="<?php echo $title; ?>">
        <label for="">Category: </label>
        <select class="category-selector" name="category" value="<?php echo $category; ?>">
          <option value="none">None</option>
          <option value="Educational">Educational</option>
          <option value="Technological">Technological</option>
          <option value="Food">Food</option>
          <option value="Travel">Travel & Tourism</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="Others">Others</option>
        </select>
        <!-- <input placeholder="Enter your category" id= "custom_category" type="text" name="" value=""> -->
        <label for="">Enter your content here:</label>
        <textarea name="content" rows="8" cols="80"><?php echo $content; ?></textarea>
        <label for="">Update image:</label>
        <input  type="file" name="file" value="">
        <!-- <b id="try">hjvhjasbvh</b> -->
        <button type="submit" name="button">Update</button>


      </form>
    </div>
  </body>
</html>

<?php } else {
  header("Location: dashboard.php");
}?>
