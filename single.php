<?php
require_once "core/init.php";
require_once "view/header.php";

$id = $_GET['id'];

if(isset($id)){
  $article = show_per_id($id);
   while($row = mysqli_fetch_assoc($article)){
     $title_first = $row['title'];
     $content_first = $row['content'];
     $tag_first = $row['tag'];
   }
}

?>

<p id="title_single"><?=$title_first?></p>

<p id="content_single"><?=$content_first?></p>

<p id="tag_single"><?=$tag_first?></p>

<?php
require_once "view/footer.php";
?>
