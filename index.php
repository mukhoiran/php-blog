<?php
require_once "core/init.php";

$login = false;
if(isset($_SESSION['user'])){
  $login = true;
}

$articles = show();

if(isset($_GET['search'])){
  $articles = search_result($_GET['search']);
}

require_once "view/header.php";
?>

<form class="" action="" method="get">
  <input type="search" name="search" placeholder="Search title"><br><br>
</form>

<?php while($row = mysqli_fetch_assoc($articles)): ?>
  <div class="each_article">
    <h3> <a href="single.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
    <p><?=excerp($row['content'])?></p>
    <p class="time"><?=$row['time']?></p>
    <p class="tag">Tag : <?=$row['tag']?></p>

    <?php if($login): ?>
      <a href="edit.php?id=<?=$row['id']?>">Edit</a>
      <a href="delete.php?id=<?=$row['id']?>">Delete</a>
  <?php endif ?>

  </div>
<?php endwhile ?>

<?php
require_once "view/footer.php";
?>
