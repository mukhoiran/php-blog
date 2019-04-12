<?php
require_once "core/init.php";
require_once "view/header.php";

$articles = show();
?>

<?php while($row = mysqli_fetch_assoc($articles)): ?>
  <div class="each_article">
    <h3><?=$row['title']?></h3>
    <p><?=$row['content']?></p>
    <p class="time"><?=$row['time']?></p>
    <p class="tag">Tag : <?=$row['tag']?></p>
    <a href="edit.php?id=<?=$row['id']?>">Edit</a>
  </div>
<?php endwhile ?>

<?php
require_once "view/footer.php";
?>
