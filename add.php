<?php
require_once "core/init.php";
require_once "view/header.php";

if(!isset($_SESSION['user'])){
  header('Location: index.php');
}

$error = '';

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $tag = $_POST['tag'];

  if(!empty(trim($title)) && !empty(trim($content))){
    if(add_data($title, $content, $tag)){
      header('Location: index.php');
    }else{
      $error = 'Error happen when Add data';
    }
  }else{
    $error = 'Title and content cannot Empty!';
  }
}

?>

<form class="" action="" method="post">
  <label for="title">Title</label><br>
  <input type="text" name="title" value=""><br><br>

  <label for="content">Content</label><br>
  <textarea name="content" rows="8" cols="80"></textarea><br><br>

  <label for="tag">Tag</label><br>
  <input type="text" name="tag" value=""><br><br>

  <div id="error"><?=$error?></div>

  <input type="submit" name="submit" value="Submit">
</form>

<?php
require_once "view/footer.php";
?>
