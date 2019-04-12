<?php
require_once "core/init.php";
require_once "view/header.php";

$error = '';
$id = $_GET['id'];

if(isset($id)){
  $article = show_per_id($id);
   while($row = mysqli_fetch_assoc($article)){
     $title_first = $row['title'];
     $content_first = $row['content'];
     $tag_first = $row['tag'];
   }
}

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $content = $_POST['content'];
  $tag = $_POST['tag'];

  if(!empty(trim($title)) && !empty(trim($content))){
    if(edit_data($title, $content, $tag, $id)){
      header('Location: index.php');
    }else{
      $error = 'Error happen when update data';
    }
  }else{
    $error = 'Title and content cannot Empty!';
  }
}

?>

<form class="" action="" method="post">
  <label for="title">Title</label><br>
  <input type="text" name="title" value="<?=$title_first?>"><br><br>

  <label for="content">Content</label><br>
  <textarea name="content" rows="8" cols="80"><?=$content_first?></textarea><br><br>

  <label for="tag">Tag</label><br>
  <input type="text" name="tag" value="<?=$tag_first?>"><br><br>

  <div id="error"><?=$error?></div>

  <input type="submit" name="submit" value="Submit">
</form>

<?php
require_once "view/footer.php";
?>
